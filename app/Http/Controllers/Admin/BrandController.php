<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brand = Brand::latest()->paginate(3);
        return view('admin.brand.index',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' => 'required'
        ]);
        Brand::create([
           'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->back()->with('success','Brand Created');
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
        $brand = Brand::where('slug',$id)->first();
        if (!$brand){
            return redirect()->back()->with('error','Brand Not Found');
        }
        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $brand = Brand::where('slug',$id)->first();
        if (!$brand){
            return redirect()->back()->with('error','Brand Not Found');
        }
        Brand::where('slug',$id)->update([
           'name' => $request->name
        ]);
        return redirect()->back()->with('success','Brand Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::where('slug',$id)->first();
        if (!$brand){
            return redirect()->back()->with('error','Brand Not Found');
        }
        $brand->delete();
        return redirect()->back()->with('success','Brand Deleted');
    }
}
