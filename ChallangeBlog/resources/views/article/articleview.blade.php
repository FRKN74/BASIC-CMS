@extends('head');
@section('title','makale');

@include('navbar');

<body>
    
    @foreach ($article as $item)
        <div class="image">
            <img src="{{ $item->image }}" alt="Resim yok" width="100%" height="600px">
        </div>
        <div class="container text-center">
            <div class="article mt-5">
                <div class="title mt-5">
                    <h3>{{ $item->title }}</h3>
                </div>
                <p class="mt-3">
                    {{ $item->description }}
                </p>
                <hr>
                <div class="detail">
                    <h6 class="text-muted float-right">{{ $item->created_at->diffForHumans() }} oluşturuldu.</h6>
                </div>
            </div>
        </div>
    @endforeach
</body>
