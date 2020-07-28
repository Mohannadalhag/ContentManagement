@extends('layouts.master')

@section('content')
<div class="container">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tags</div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @foreach($tags as $tag)
                    <div class="card-body">
                        <div class="col-md-4">
                            <div class="card mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-dark text-white">
                                        {{$tag->name}}
                                </div>
                            </div>
                            <div class="card-body">    
                                <a href="{{'/tags/'.$tag->id}}" class="btn btn-primary"> Show More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    
    
</div>

@endsection
