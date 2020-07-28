@extends('Layouts.master')
@section('content')
    <div class="card mb-3" style="max-width: 18rem;">
        <div class="card-header bg-dark text-white">
            {{$tag->name}}
        </div>
        <div class="card-body">
            <div class="card-title">
                <h4> {{$tag->name}}</h4>
            </div>
            <div class="card-text">
                {{$tag->name}}
            </div>
            <hr>
                <a href="{{'/tags/'.$tag->id.'/edit'}}" class="btn btn-primary"> Edit</a>
                <form action="{{route('tags.destroy',['id'=>$tag->id])}}" method = "POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-Danger float left">Delete</button>
                </form>
        </div>    
    </div>
@endsection