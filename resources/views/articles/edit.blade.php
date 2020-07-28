@extends('Layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-9 offset-md-2">
            <h3>Edit Article form</h3>
        <form action = "{{'/articles/'.$id}}" enctype="multipart/form-data" method = "POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name = "title" id ="title" class = "form-control">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input type="text" name = "content" id ="content" class = "form-control">
            </div>



            <div class="form-group">
                <h2>Category</h2>
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modal2">Choose Categories</button>
              
                <!-- Modal -->
                <div class="modal fade" id="Modal2" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                @foreach($categories as $category)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value = "{{$category->id}}" class="custom-control-input" id ="{{'category'.$category->id}}" name ="data[categories][]">
                                        <label class="custom-control-label" for="{{'category'.$category->id}}">{{$category->name}}</label>
                                    </div>  
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <h2>Tag</h2>
                <!-- Trigger the modal with a button -->
                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#Modal1">Choose Tags</button>
              
                <!-- Modal -->
                <div class="modal fade" id="Modal1" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                @foreach($tags as $tag)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value = "{{$tag->id}}" class="custom-control-input" id ="{{'tag'.$tag->id}}" name ="data[tags][]">
                                        <label class="custom-control-label" for="{{'tag'.$tag->id}}">{{$tag->name}}</label>
                                    </div>  
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="form-group">
            <label for="published_at">Edit Image</label>
            <input type="file" name="image" id="image" class = "form-control">
        </div>



            <div class="form-group">
                <button type="submit" class = "btn btn-primary">Edit</button>
            </div>
            </form>
        </div>
    </div>
@endsection