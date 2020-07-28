@extends('layouts.master')

@section('content')
<div class="container">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Categories</div>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @foreach($categories as $category)
                    <div class="card-body">
                        <div class="col-md-4">
                            <div class="card mb-3" style="max-width: 18rem;">
                                <div class="card-header bg-dark text-white">
                                        {{$category->name}}
                                </div>
                            </div>
                            <div class="card-body">    
                                <a href="{{'/categories/'.$category->id}}" class="btn btn-primary"> Show More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
    
    
</div>

@endsection
