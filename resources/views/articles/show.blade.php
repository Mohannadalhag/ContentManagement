@extends('Layouts.master')
@section('content')
    <div class="card mb-3" style="max-width: 18rem;">
        <div class="card-header bg-dark text-white">
            {{$article->title}}
        </div>
        <div class="card-body">
            <div class="card-title">
                <h4> {{$article->title}}</h4>
            </div>
            <div class="card-text">
                {{$article->content}}
            </div>
            <div class="card-text">
                Categories:
            </div>
            @foreach($categories as $category)
                <div class="card-text">
                    {{$category->name}}
                </div>
            @endforeach
            <div class="card-text">
                Tags:
            </div>
            @foreach($tags as $tag)
                <div class="card-text">
                    {{$tag->name}}
                </div>
            @endforeach
            <hr>
                @auth
                <a href="{{'/articles/'.$article->id.'/edit'}}" class="btn btn-primary"> Edit</a>
                <form action="{{route('articles.destroy',['id'=>$article->id])}}" method = "POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-Danger float left">Delete</button>
                </form>
                @endauth
            </hr>
            <img src="{{'/images/'.$image}}">
        </div>    
    </div>
@endsection