@extends('head')
@section('title','Güncelle')
<body>
    @include('navbar')

    <div class="container text-center">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>


    <div class="card mt-5 ml-5 mr-5 text-center">
        <h5 class="card-header">Makale güncelle</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            @foreach ($article as $item )
                <form action="{{ route('updatePost',$item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                
                    <div class="input-group mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $item->title }}"/>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Ad soyad" value="{{ $item->name }}"/>
                    </div>
                    <div class="input-group mb-3">
                        <img src="{{ $item->image }}" width="100px" height="100px" alt="Resim yok" srcset=""> <br> <br> <hr>
                        <input type="file" name="image" class="form-control"/>
                    </div>
                    <div class="input-group mb-3">
                        <textarea name="description" id="" rows="15" class="form-control" placeholder="Makale yazısı">{{ $item->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Güncelle</button>
                </form>
            @endforeach
        </div>
    </div>
</body>
</html>