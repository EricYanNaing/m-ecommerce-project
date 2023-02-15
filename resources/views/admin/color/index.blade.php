@extends('admin.layout.master')
@section('content')
    <div class="">
        <a href="{{route('color.create')}}" class="btn btn-success">Create  Color</a>
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
        @foreach($color as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td>
                    <a href="{{route('color.edit',$c->slug)}}" class="btn btn-primary">Edit</a>
                    <form action="{{route('color.destroy',$c->slug)}}" class="d-inline" method="POST" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$color->links()}}
@endsection
