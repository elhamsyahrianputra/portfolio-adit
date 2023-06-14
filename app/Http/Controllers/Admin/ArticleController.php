<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.article.index', [
            'articles' => Article::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.article.create', [
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'article_image' => 'image|file|required',
            'title' => 'unique:articles|required',
            'author' => 'required',
            'text' => 'required',
        ]);

        if ($request->file('article_image')) {
            $validatedData['article_image'] = $request->file('article_image')->store('article/article-image');
        }

        $validatedData['slug'] = Str::slug($validatedData['title']);

        Article::create($validatedData);


        return redirect('/admin/articles')->with('success', 'Data article has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('admin.article.show', [
            'article' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.article.edit', [
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validatedData = $request->validate([
            'article_image' => 'image|file',
            'author' => 'required',
            'text' => 'required',
        ]);

        if ($request->title != $article->title){
            $validatedData['title'] = 'required|unique:articles';
        }else{
            $validatedData['title'] = 'required';
        }

        if ($request->file('article_image')) {
            Storage::delete($request->old_image);
            $validatedData['article_image'] = $request->file('article_image')->store('article/article-image');
        }

        $validatedData['slug'] = Str::slug($validatedData['title']);

        Article::where('id', $article->id)->update($validatedData);

        return redirect('/admin/articles')->with('success', 'Data article has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        Article::destroy($article->id);
        Storage::delete($article->article_image);
		return redirect('/admin/articles')->with('success', 'Data article has been deleted');
    }
}
