@extends('layouts.app')
@section('content')
    <div class="mt-3">
        <div class="container">
            <h1>Update post</h1>
            <h4>all fields required</h4>
            <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                {{-- <label for="">slug</label>
        <input type="text" name="slug" value="{{$post->slug}}">
        <label for="">desc</label>
    
        <input type="text" name="description" value="{{$post->description}}">
        <label for="">file</label>
    
        <input type="file" name="file" value="{{$post->file}}">
        <label for="">category</label>
    
        <input type="text" name="category" value="{{$post->category}}">
        <input type="submit"> --}}

                <div class="form-group ">
                    <label for="slug">Title(slug)</span> <small>(This field use in url
                            path.)</small></label>
                    <input type="text" class="form-control" name="slug" value="{{ $post->slug }}" />

                </div>
                {{-- <div class="form-group ">
            <label>Categories:</label><br>

            @foreach ($categories as $category)
                <label for="color_red">{{ $category->name }}</label>
                <input type="checkbox" name="categories[]" value="{{ $category->id }}" />
            @endforeach



        </div> --}}



                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="5" class="form-control" name="description">{{ $post->description }}</textarea>
                </div>


                <div class="form-group mb-2">
                    <label for="formFileMultiple" class="form-label"> post img : </label>
                    <img src="/img/{{$post->file}}" alt="" style="width: 100px; height: 100px;">
                    <input class="form-control" type="file" id="formFileMultiple" name="img"
                        value="{{ $post->file }}" />
                </div>
                <div class="form-group">
                    <label>liens du fichier associe</label>
                    <textarea  class="form-control" name="file">{{ $post->fichier}}</textarea>

                    {{-- <input class="form-control" name="file" value="{{ $post->fichier }}" /> --}}
                </div>

                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">
                        update
                    </button>

                </div>
            </form>

        </div>

    </div>
@endsection
