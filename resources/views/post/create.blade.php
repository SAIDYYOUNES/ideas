@extends('layouts.app')
@section('content')
    <div class="mt-3">
        <div class="container">
            <h1>Create post</h1>
            <h4>all fields required</h4>
            <form action="/posts" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf


                <div class="form-group ">
                    <label for="slug">Title(slug)</span> <small>(This field use in url
                            path.)</small></label>
                    <input type="text" class="form-control" name="slug" />

                </div>
                <div class="form-group ">
                    <label>Categories:</label><br>

                    @foreach ($categories as $category)
                        <label for="color_red">{{ $category->name }}</label>
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}" />
                    @endforeach



                </div>



                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="5" class="form-control" name="description"></textarea>
                </div>


                <div class="form-group mb-2">
                    <label for="formFileMultiple" class="form-label"> post img : </label>
                    <input class="form-control" type="file" id="formFileMultiple" name="img" />
                </div>
                <div class="form-group">
                    <label >liens du fichier associe</label>
                    <input class="form-control" name="file"/>
                </div>

                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>

                </div>
            </form>
        </div>

    </div>
@endsection
