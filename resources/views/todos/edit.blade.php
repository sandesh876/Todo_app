@extends('layouts.app')

@section('title')
    Edit Todo
@endsection

@section('content')
<h1 class="text-center">Edit Todos</h1>

<div class="row justify-content-center my-5">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">
                Edit todos
            </div>

            <div class="card-body">
                @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                @endif
                        <form action="/todos/{{$todo->id}}/update-todos" method="POST">

                    @csrf

                    <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Name" value= {{$todo->name}}>
                    </div> 
                    <div class="form-group">
                    <textarea name="description" id="description" placeholder="Description" cols="5" rows="5" class="form-control">{{$todo->description}}</textarea>    
                    </div> 
                    <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Update Todo</button>    
                    </div>  
                    </form> 
            </div>
        </div>
    </div>
</div>
@endsection