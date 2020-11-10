<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//importo controller di base
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Article;
use App\User;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();

        $articles = Article::where("user_id", $user_id)->get();

        return view("admin.index", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();


      //validation
      $request->validate([
        "title" => "required",
        "content" => "required",
        "slug" => "required|unique:articles",
        // "image" => "image"
      ]);

      $newArticle = new Article;

      $newArticle->user_id = Auth::id();
      $newArticle->title = $data["title"];
      $newArticle->content = $data["content"];
      $newArticle->slug = $data["slug"];

      //salvataggio
      $newArticle->save();

      //redirect verso la show
      return redirect()->route("admin.articles.show", $newArticle);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view("admin.show", compact("article"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
