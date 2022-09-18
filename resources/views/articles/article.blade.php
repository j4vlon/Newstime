@extends('layouts.header') @section('content')

<!-- Main -->
<div class="container">
    <div id="main">
        <!-- Post -->
        <article class="post">
            <header>
                <div class="title">
                    <h2><a href="#">{{ $post->title }}</a></h2>
                    <p>Lorem ipsum dolor amet nullam consequat etiam feugiat</p>
                </div>
                <div class="meta">
                    <time class="published" datetime="2015-11-01"
                        >{{ $post->created_at }}</time
                    >
                    <a href="#" class="author"
                        ><span class="name">Jane Doe</span><img src="" alt=""
                    /></a>
                </div>
            </header>
            <span class="image featured"
                ><img src="{{ $post->file_url }}" alt=""
            /></span>
            <p class="post-description">{{ $post->description }}</p>
            <footer>
                <ul class="stats">
                    <li><a href="#">General</a></li>
                    <li><a href="#" class="icon solid fa-heart">28</a></li>
                    <li><a href="#" class="icon solid fa-comment">128</a></li>
                </ul>
            </footer>
        </article>
    </div>

    {{--
    <div class="news-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-30">
                        <img
                            src="{{ $post->file_url }}"
                            class="card-img-top"
                            alt="..."
                        />
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text"></p>
                            <p class="card-text">
                                <small class="text-muted">Добавлено в </small>
                                <span
                                    title="likes"
                                    id="LikeDislike"
                                    data-type="like"
                                    data-post="{{ $post->id }}"
                                    >Like</span
                                ><span>{{ $post->likes() }}</span>
                                <span
                                    title="dislikes"
                                    id="LikeDislike"
                                    data-type="dislike"
                                    data-type="dislike"
                                    data-post="{{ $post->id }}"
                                    >Dislike</span
                                >
                                <span>{{ $post->dislikes() }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    --}}
    <div class="feedback-block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="comment-block">
                        @foreach ($comments as $item)
                        <div class="card mb-30">
                            <div class="card-header">
                                <h5 class="card-title" id="username">{{ $item->username }}</h5>
                            </div>
                            <div class="card-body">
                                <p class="card-text" id="comment-message">{{ $item->message }}</p>
                            </div>
                            <div class="card-footer text-muted">
                                <small class="text-muted" id="comment-date"
                                    >{{ $item->created_at }}</small
                                >
                            </div>
                        </div>
                        <hr>
                        @endforeach
                    </div>

                    <form
                        action="{{ route('comment.save', [$post->id])	}}"
                        class="comment-form"
                        method="POST"
                        id="CommentForm"
                    >
                        @csrf @if(session()->has('success'))
                        
                        <div class="alert alert-success fade show" role="alert">
                            {{ session()->get('success') }}
                        </div>
                        @endif
                        
                        <input type="hidden" value="{{ $post->id }}" name="post_id">
                       
                        @auth
                            <input type="hidden" value="{{ Auth::user()->login }}" name="username">
                        <label for="message" class="form-label"
                            >Message</label
                        >
                        <textarea
                            class="form-control mb-3 {{ $errors->has('message') ? 'is-invalid' : '' }}"
                            rows="3"
                            placeholder="{{ Auth::user()->login }} оставьте комментарий ..."
                            name="message"
                        ></textarea>
                         <input
                            type="button"
                            class="btnSubmit"
                            value="Отправить"
                            onclick="submitForm()"
                        />
                     @else 
                        <label for="message" class="form-label"
                            >Message</label
                        >
                        <textarea
                            class="form-control mb-3 {{ $errors->has('message') ? 'is-invalid' : '' }}"
                            rows="3"
                            placeholder="Зарегистрируйтесь чтобы оставить комментарий ..."
                            name="message" disabled
                        ></textarea>
                        <input
                            type="button"
                            class="btnSubmit"
                            value="Отправить"
                            disabled
                        />
                        @endauth
                        @if ($errors->has('message'))
                        <div class="invalid-feedback">
                            {{ $errors->first('message') }}
                        </div>
                        @endif
                        
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <section id="footer" style="text-align: center">
        <ul class="icons">
            <li>
                <a href="#" class="icon brands fa-twitter"
                    ><span class="label">Twitter</span></a
                >
            </li>
            <li>
                <a href="#" class="icon brands fa-facebook-f"
                    ><span class="label">Facebook</span></a
                >
            </li>
            <li>
                <a href="#" class="icon brands fa-instagram"
                    ><span class="label">Instagram</span></a
                >
            </li>
            <li>
                <a href="#" class="icon solid fa-rss"
                    ><span class="label">RSS</span></a
                >
            </li>
            <li>
                <a href="#" class="icon solid fa-envelope"
                    ><span class="label">Email</span></a
                >
            </li>
        </ul>
        <p class="copyright">
            &copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>.
            Images: <a href="http://unsplash.com">Unsplash</a>.
        </p>
    </section>
</div>
@endsection
