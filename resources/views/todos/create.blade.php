@extends('layouts.app')

@section('title')
    Create Todo
@endsection

@section('content')
<h1 class="text-center">Create Todos</h1>

<div class="row justify-content-center my-5">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">
                Create new todo
            </div>

            <div class="card-body">
                @if ($errors->any())
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                @endif
                <form action="/store-todos" method="POST">

                    @csrf

                    <div class="form-group">
                    <input type="text" class="form-control" name="name" placeholder="Name">
                    </div> 
                    <div class="form-group">
                    <textarea name="description" id="description" placeholder="Description" cols="5" rows="5" class="form-control"></textarea>    
                    </div> 
                    <div class="form-group text-center">
                    <button type="submit" class="btn btn-success">Create Todo</button>    
                    </div>  
                    </form> 
            </div>
        </div>
    </div>
</div>
@endsection