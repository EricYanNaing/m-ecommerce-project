<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category= Category::latest()->paginate(4);
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required'
        ]);
        Category::create([
           'name' => $request->name,
           'slug' => Str::slug($request->name) .uniqid()
        ]);

        return redirect()->back()->with('success','Category Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::where('slug',$id)->first();
        if (!$category){
            return redirect()->back()->with('error','Category Not Found');
        }
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required'
        ]);
        $category = Category::where('slug',$id)->first();
        if (!$category){
            return redirect()->back()->with('error','Category Not Found');
        }
        Category::where('slug',$id)->update([
           'name' => $request->name,
        ]);
        return redirect()->back()->with('success','Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $category = Category::where('slug',$id);
        if (!$category){
            return redirect()->back()->with('error','Category Not Found');
        }
        $category->delete();
        return redirect()->back()->with('success','Category Deleted');
    }
}
