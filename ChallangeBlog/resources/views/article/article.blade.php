@extends('head')
@section('title','Makaleler')
<body>
    @include('navbar')
    <h1 class="text-center">Makaleler</h1>
    <hr>
        <div class="paginate justify-content-center align-content-center d-flex">
            <div class="size" >
                {{ $article->links('pagination::bootstrap-4') }}
            </div>
        </div>
    <hr>
    @foreach ($article as $item)
    <div class="card mb-3 mt-5 ml-5 mr-5 justify-content-center align-content-center d-flex position-relative">
        <img class="card-img-top  " width="100%" height="500px" src="{{ $item->image }}" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">{{ $item->title }}</h5>
            <p class="card-text">{{\Illuminate\Support\Str::limit($item->description, 50)}}  <a href="{{ route('articleView',$item->id) }}">Devanımı oku</a>   </p>
            <p class="card-text"><small class="text-muted">{{ $item->created_at->diffForHumans() }}</small></p>
        </div>
    </div>
    @endforeach
    
    <div class="paginate justify-content-center align-content-center d-flex">
        <div class="size" >
            {{ $article->links('pagination::bootstrap-4') }}
        </div>
    </div>
</body>
@jquery
@toastr_js
@toastr_render
</html>