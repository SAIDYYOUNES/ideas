@extends('layouts.app')
@section('content')
    <div class="mt-3">
        <div class="container">
            <h1>Create post</h1>
            <h4>all fields required</h4>
            <form action="/posts" method="POST" autocomplete="off">
                @csrf

                {{-- <label for="">slug</label>
                <input type="text" name="slug">
                <label for="">desc</label>
    
                <input type="text" name="description">
                <label for="">file</label>
    
                <input type="file" name="file">
                <label for="">category</label>
    
                <input type="text" name="category">
                <input type="submit"> --}}

                <div class="form-group ">
                    <label for="slug">Title(slug)</span> <small>(This field use in url
                            path.)</small></label>
                    <input type="text" class="form-control" name="slug" />

                </div>
                <div class="form-group ">
                    <label for="slug">Category </span> <small>(This field use in url
                            path.)</small></label>
                    <select name="category" id="" class="form-control">
                        <option value="">category</option>
                        <option value="Art">Art</option>
                        <option value="Business">Business</option>
                        <option value="Education">Education</option>
                        <option value="Health">Health</option>
                        <option value="Health">Health</option>
                        <option value="Science">Science</option>
                        <option value="Personal">Personal</option>
                        <option value="Other">Other</option>
                    </select>



                </div>



                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea rows="5" class="form-control" name="description"></textarea>
                </div>


                <div class="form-group mb-2">
                    <label for="formFileMultiple" class="form-label"> file input </label>
                    <input class="form-control" type="file" id="formFileMultiple"name="file" />
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
