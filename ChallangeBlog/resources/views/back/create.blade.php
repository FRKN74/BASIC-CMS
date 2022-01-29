@extends('head')
@include('head')
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
        <h5 class="card-header">Makale oluştur</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            
                <form action="{{ route('createPost') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Title"/>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Ad soyad"/>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" name="image" class="form-control"/>
                    </div>
                    <div class="input-group mb-3">
                        <textarea name="description" id="editor" rows="5" class="form-control" placeholder="Makale yazısı"></textarea>
                    </div>

                    <button class="btn btn-outline-success">Oluştur</button>
                </form>
            
            
        </div>
    </div>
    <h1 class="text-center mt-5">Tüm Makaleler ({{ $article->count() }})</h1>
    <div class="content justify-content-center align-content-center d-flex">
        <table class="table table-dark mt-5 ml-5 mr-5">
            <thead>
                <tr>
                    <th scope="col">Başlık</th>
                    <th scope="col">Yazar adı</th>
                    <th scope="col">Fotoğraf</th>  
                    <th scope="col">Açıklama</th>
                    <th scope="col">( Aktif / Pasif )</th>
                    <th scope="col">Oluşturma T.</th>
                    <th scope="col">Güncelleme T.</th>
                    <th scope="col">Durum</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($article as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <img src="{{ $item->image }}" width="200px" height="200px" alt="" srcset="">
                        </td>
                        <td>{{\Illuminate\Support\Str::limit($item->description, 50)}}</td>
                        <td>
                            <input class="swicth" type="checkbox" article-id="{{ $item->id }}" data-toggle="toggle" 
                            data-on="Aktif" data-off="Pasif" 
                            data-onstyle="outline-success" data-offstyle="outline-danger"
                            @if($item->status == 1) checked @endif>
                        </td>
                        <td>{{ $item->created_at->diffForHumans() }}</td>
                        <td>{{ $item->updated_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('update',$item->id) }}" class="btn btn-warning"><i class="fa fa-pencil"></i></a>    
                            <a href="{{ route('articleView',$item->id) }}" class="btn btn-primary"><i class="fa fa-eye"></i></a>    
                            <a href="{{ route('delete',$item->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>    
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>

    <script>
        $(function() {
            $('.swicth').change(function() {
                id =($(this)[0].getAttribute('article-id'));
                statu = $(this).prop('checked');
                if (statu == true) {
                    $('#customSwitch1').text('Aktif')
                }else{
                    $('#customSwitch1').html('Pasif')
                }
                $.get("{{ route('switch') }}", { id:id, statu:statu } ,function(data, status){
                });
            })
        });
    </script>
        <!-- <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script> -->
</body>
@jquery
@toastr_js
@toastr_render
</html>