@extends('Layouts.master')
@section('content')
    <div class="card mb-3" style="max-width: 18rem;">
        <div class="card-header bg-dark text-white">
            {{$category->name}}
        </div>
        <div class="card-body">
            <div class="card-title">
                <h4> {{$category->name}}</h4>
            </div>
            <div class="card-text">
                {{$category->name}}
            </div>
            <hr>
                @auth
                <a href="{{'/categories/'.$category->id.'/edit'}}" class="btn btn-primary"> Edit</a>
                <form action="{{route('categories.destroy',['id'=>$category->id])}}" method = "POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-Danger float left">Delete</button>
                </form>
                @endauth
        </div>    
    </div>
@endsection