@extends('admin.layout.master')
@section('content')
    <div class="">
        <a href="{{route('category.create')}}" class="btn btn-success">Create  Category</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($category as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td>
                    <a href="{{route('category.edit',$c->slug)}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('category.destroy',$c->slug)}}" class="d-inline" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$category->links()}}
@endsection
