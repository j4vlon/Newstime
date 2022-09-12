@extends('layouts.header') @section('content')

<div class="content container">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="heading">
                <h1>
                    Новости мира
                    <small class="text-muted" style="font-size: 24px"
                        >Читайте на
                        <a href="" class="text-muted">NewsTime</a></small
                    >
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="news-blog">
    <div class="container">
        <div class="row">
            @foreach ($news as $item)

            <div class="col-xl-4 col-lg-4 col-md-4">
                <div class="card mb-30">
                    <img
                        src="{{ $item->file_url }}"
                        class="card-img-top"
                        alt="..."
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->title }}</h5>
                        <p class="card-text">{{ substr($item->description, 0, 100) }}</p>
                        <a href="{{ route('article', [$item->id]) }}" class="btn btn-primary"
                            >More</a
                        >
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
