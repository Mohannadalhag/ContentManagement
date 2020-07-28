@extends('Layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-9 offset-md-2">
            <h3>Edit Tag form</h3>
        <form action = "{{'/tags/'.$tag->id}}" method = "POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name = "name" id ="name" class = "form-control" value = "{{$tag->name}}">
                </div>
                <div class="form-group">
                    <button type="submit" class = "btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection