@extends('layouts.app')
@section('content')
<div class="mt-3">
    <form action="/posts/{{$post->id}}" method="POST">
        @method('PUT')
        @csrf
    
        <label for="">slug</label>
        <input type="text" name="slug" value="{{$post->slug}}">
        <label for="">desc</label>
    
        <input type="text" name="description" value="{{$post->description}}">
        <label for="">file</label>
    
        <input type="file" name="file" value="{{$post->file}}">
        <label for="">category</label>
    
        <input type="text" name="category" value="{{$post->category}}">
        <input type="submit">
    </form>




</div>

@endsection