<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listArticle = Article::query()->where('active', 1)->paginate(5);
        return view("article/index", [
            'articles' => $listArticle,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("article/form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'article' => 'required',
        ]);

        if (!$data) {
            FacadesSession::flash('message', 'Artikel gagal di tambahkan !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('articles.index');
        }
        Article::create([
            'title' => $request->title,
            'article' => $request->article,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        FacadesSession::flash('message', 'Artikel berhasil di tambahkan !');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::query()->where('id', $id)->firstOrFail();
        return view("article/show", [
            'article' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::query()->where('id', $id)->first();
        return view("article/form", ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'article' => 'required',
        ]);

        if (!$data) {
            FacadesSession::flash('message', 'Artikel gagal diupdate !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('articles.index');
        }

        Article::query()->where('id', $id)->update([
            'title' => $request->title,
            'article' => $request->article,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        FacadesSession::flash('message', 'Artikel berhasil diupdate !');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Article::find($id)->delete();
        
        Article::query()->where('id', $id)->update([
            'active' => 0,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        FacadesSession::flash('message', 'Artikel berhasil dihapus !');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('articles.index');
    }
}
