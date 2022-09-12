@extends('layouts.header') @section('content')
<div class="content container">
    <div class="row">
        <div class="col-md-12">
            <div class="heading">
                <h1>
                    Новости Исскуства
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="news-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-30">
                    <img src="{{ $post->file_url }}" class="card-img-top" alt="..."/>
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->description }}</p>
                        <p class="card-text">
                            <small class="text-muted"
                                >Добавлено в {{ $post->created_at }}</small
                            >
                            <span title="likes" id="saveLikeDislike" data-type="like" data-post="{{ $post->id }}">Like</span><span>{{ $post->likes() }}</span>
                            <span title="dislikes" id="saveLikeDislike" data-type="dislike" data-post="{{ $post->id }}">Dislike</span>  <span>{{ $post->dislikes() }}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="feedback-block">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="comment-block">
                    @foreach ($comments as $item)
                    <div class="card mb-30">
                        <div class="card-header">
                            <h5 class="card-title">{{ $item->title }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $item->message }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            <small class="text-muted"
                                >{{ $item->created_at }}</small
                            >
                        </div>
                    </div>
                    @endforeach
                </div>

                <form
                    action="{{ route('comment.save', [$post->id])	}}"
                    class="comment-form"
                    method="POST"
                >
                    @csrf @if(session()->has('success'))
                    <div class="alert alert-success fade show" role="alert">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <label for="message-theme" class="form-label"
                        >Message theme</label
                    >
                    <input
                        type="text"
                        class="form-control mb-3 {{ $errors->has('title') ? 'is-invalid' : '' }}"
                        placeholder="Message theme"
                        name="title"
                    />
                    @if ($errors->has('title'))
                    <div class="invalid-feedback mb-3">
                        {{ $errors->first('title') }}
                    </div>
                    @endif

                    <label for="message" class="form-label"
                        >Example textarea</label
                    >
                    <textarea
                        class="form-control mb-3 {{ $errors->has('message') ? 'is-invalid' : '' }}"
                        rows="3"
                        placeholder="Send message"
                        name="message"
                    ></textarea>
                    @if ($errors->has('message'))
                    <div class="invalid-feedback">
                        {{ $errors->first('message') }}
                    </div>
                    @endif
                    <input type="submit" class="btnSubmit" value="Отправить" />
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
