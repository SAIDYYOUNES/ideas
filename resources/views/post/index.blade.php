@extends('layouts.app')
@section('content')
    <div class="mt-3">
        @if (session()->has('message'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('message') }}
            </div>
        @endif





        @foreach ($posts as $post)
            <section>

                <div class="container my-5 py-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-12 col-lg-10 col-xl-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-start align-items-center">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                src=https://st3.depositphotos.com/4111759/13425/v/600/depositphotos_134255710-stock-illustration-avatar-vector-male-profile-gray.jpg"
                                                alt="avatar" width="60" height="60" />
                                            <div>
                                                <h6 class="fw-bold text-primary mb-1">{{ $post->user->name }}</h6>
                                                <a href="/posts/{{ $post->slug }}">
                                                    <p class="text-muted small mb-0">
                                                        {{ $post->created_at }}

                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                        @if (Auth::user() && Auth::user()->id == $post->user_id)
                                            <div class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false" v-pre>

                                                </a>

                                                <div class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="/posts/{{ $post->slug }}/edit">
                                                        edit
                                                    </a>
                                                    <form action="posts/{{ $post->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item" type="submit">
                                                            delete
                                                        </button>
                                                    </form>


                                                </div>
                                            </div>
                                        @endif



                                    </div>
                                    <h4 class="text-center"><strong>{{ $post->slug }}</strong></h4>
                                    <p class="mt-3 mb-4 pb-2">
                                        {{ $post->description }}
                                    </p>
                                    <a href="/posts/category/{{ $post->category }}" style="background: darkgray"
                                        class="badge badge-secondary mb-3">#{{ $post->category }}</a>
                                    {{-- <span class="badge badge-pill badge-secondary">Secondary</span> --}}

                                    <div class="small d-flex justify-content-start">
                                        @if (!$post->likes()->where('user_id', Auth::user()->id)->exists())
                                            <form action="/posts/{{ $post->id }}/like" method="POST">
                                                @csrf


                                                <button type="submit" class="btn btn-light d-flex align-items-center me-3">
                                                    <i class="far fa-thumbs-up me-2"></i>
                                                    <p class="mb-0">Like({{ count($post->likes) }})</p>
                                                </button>
                                            </form>
                                        @else
                                            <form action="/postlike/{{ $post->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')



                                                <button type="submit"
                                                    class=" btn btn-primary d-flex align-items-center me-3">
                                                    <i class="far fa-thumbs-up me-2"></i>
                                                    <p class="mb-0">Like({{ count($post->likes) }})</p>
                                                </button>
                                            </form>
                                        @endif
                                        <a href="/posts/{{ $post->slug }}" class="d-flex align-items-center me-3">
                                            <i class="far fa-comment-dots me-2"></i>
                                            <p class="mb-0">Comment({{ count($post->comments) }})</p>

                                        </a>
                                        {{-- <p class="mb-0">{{ $post->comments->first() }}</p> --}}
                                        {{-- @php
                                            // var_dump($post->comments->first());
                                        @endphp --}}
                                    </div>
                                </div>
                                @if ($post->comments->first())
                                    <div class="d-flex flex-row bg-light m-2 p-3"> <img
                                            src="https://st3.depositphotos.com/4111759/13425/v/600/depositphotos_134255710-stock-illustration-avatar-vector-male-profile-gray.jpg"
                                            width="40" height="40" class="rounded-circle mr-3">
                                        <div class="ms-2 w-100">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex flex-row align-items-center"> <span class="mr-2">
                                                        {{ $post->comments->first()->user->name }}

                                                    </span>
                                                    <small class="c-badge"></small>
                                                </div>
                                                <small>{{ $post->comments->first()->created_at }}</small>
                                            </div>
                                            <p class="text-justify comment-text mb-0">
                                                {{ $post->comments->first()->text }}</p>


                                        </div>
                                    </div>
                                @endif
                                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                                    <div class="d-flex flex-start w-100">
                                        <img class="rounded-circle shadow-1-strong me-3"
                                            src="https://st3.depositphotos.com/4111759/13425/v/600/depositphotos_134255710-stock-illustration-avatar-vector-male-profile-gray.jpg"
                                            alt="avatar" width="40" height="40" />
                                        <div class="form-outline w-100">
                                            <form action="/commentaire" method="POST">
                                                @csrf
                                                <textarea class="form-control" name="text" id="textAreaExample" rows="2" style="background: #fff;"></textarea>
                                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                                <input type="hidden" name="slug" value="{{ $post->slug }}">


                                        </div>
                                    </div>
                                    <div class="float-end mt-2 pt-1">
                                        <button type="submit" class="btn btn-primary btn-sm">Post comment</button>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    </div>
@endsection
