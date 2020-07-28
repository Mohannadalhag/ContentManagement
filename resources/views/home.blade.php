@extends('layouts.master')

@section('content')
<div class="container">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @foreach($articles as $article)
                    <div class="card-body">
                        <div class="col-md-4">
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
                                    <hr>
                                <a href="{{'/articles/'.$article->id}}" class="btn btn-primary"> Show More</a>
                                </div>    
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    
    
</div>

@endsection
