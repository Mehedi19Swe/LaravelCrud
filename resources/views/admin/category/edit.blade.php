@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">



            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Edit category
                    </div>



                    <div class="card-body">

                        <form action="{{url('Category/Update/'.$categories->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="form-label">Update category</label>
                                <input type="text" name="category_name" class="form-control"

                                       id="exampleInputEmail1" aria-describedby="emailHelp"
                                       value="{{$categories->category_name}}">

                                @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
