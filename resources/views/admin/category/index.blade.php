@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> All category
                    </div>



                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">User_id</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php($i=1)
                            @foreach($categories as $category)


                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td>{{$category->category_name}}</td>
                                <td>{{$category->user_id}}</td>

                                <td>
                                    <a href="{{url('Category/Edit/'.$category->id)}}" class="btn btn-primary">Edit</a>
{{--                                <a href="{{url('Category/destroy/'.$category->id)}}" class="btn btn-danger">Delete</a>--}}
                                </td>
                                <td>
                                    <form  action="{{ url('Category/Delete',$category->id)}}" method="post">
                                        @csrf
                                        <input type="submit" class="btn btn-danger"
                                               onclick="return confirm('Are you sure want to delete this?')" value="Delete">
                                    </form>
                                </td>

                            </tr>


                            @endforeach

                            </tbody>
                        </table>



                    </div>
                </div>
            </div>



        <div class="col-md-4">
            <div class="card">
                <div class="card-header"> Add category
                </div>



                <div class="card-body">

                    <form action="{{route('store.category')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1" class="form-label">Add category</label>
                            <input type="text" name="category_name" class="form-control"

                                   id="exampleInputEmail1" aria-describedby="emailHelp"
                            placeholder="Enter Category">

                            @error('category_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
