<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
//Request
use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
//Models
use App\Models\Article;

class BackController extends Controller
{
    public function create()
    {
        $article = Article::all();
        Carbon::setlocale('tr');
        return view('back.create',compact('article'));
    }
    public function articles()
    {
        $article = Article::whereStatus(1)->paginate(10);
        Carbon::setlocale('tr');
        return view('article.article',compact('article'));
    }
    public function articleView($id)
    {
        $article = Article::whereId($id)->get();
        Carbon::setlocale('tr');
        return view('article.articleview',compact('article'));
    }
    public function store(StoreRequest $request)
    {
        $article = new Article; 
        $article->title = $request->title;
        $article->name = $request->name;
        $article->slug = Str::slug($request->title);
        $article->description = $request->description;

        if ($request->hasFile('image')) {
            
            $imageName= Str::slug($request->title).".".$request->image->getClientOriginalExtension(); //gelen dosyanın adını belirledik (yükleyen kişide ne ile kayıtlı ise öyle alır)
            $request ->image->move(public_path('uploads'),$imageName);
            $article->image='uploads/'.$imageName;
        }

        $article->save();

        toastr()->success('Makale oluşturuldu.');
        return redirect()->route('articles');
    }
    public function show($id)
    {
        $article = Article::whereId($id)->get();
        return view('back.update',compact('article'));
    }
    public function edit(UpdateRequest $request,$id)
    {
        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->name = $request->name;
        $article->slug = Str::slug($request->title);
        $article->description = $request->description;

        if ($request->hasFile('image')) {
            
            $imageName= Str::slug($request->title).".".$request->image->getClientOriginalExtension(); //gelen dosyanın adını belirledik (yükleyen kişide ne ile kayıtlı ise öyle alır)
            $request ->image->move(public_path('uploads'),$imageName);


            $article->image='uploads/'.$imageName;
        }

        $article->update();

        toastr()->info('Başarılı bir şekilde güncellendi.');
        return redirect()->route('create');
    }

    public function destroy($id)
    {
        $article= Article::Where('id',$id)->delete();
        toastr()->warning('Kayıt silindi.');
        return redirect()->route('create');
    }

    public function switch(Request $request)
    {
        $article = Article::findOrFail($request->id);
        $article->status = $request->statu=="true" ? 1 : 0;
        $article->save();
    }

}
