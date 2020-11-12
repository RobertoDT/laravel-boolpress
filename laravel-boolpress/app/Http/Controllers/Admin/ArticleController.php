<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//importo controller di base
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;
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
        "image" => "image"
      ]);

      $path = Storage::disk("public")->put("images", $data["image"]);

      $newArticle = new Article;

      $newArticle->user_id = Auth::id();
      $newArticle->title = $data["title"];
      $newArticle->content = $data["content"];
      $newArticle->slug = $data["slug"];
      $newArticle->image = $path;

      //salvataggio
      $newArticle->save();

      //invio di email
      Mail::to('mail@mail.it')->send(new SendNewMail($newArticle));

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
        //cerco sempre l'id dell'articolo che voglio modificare
        $article = Article::find($id);

        return view("admin.edit", compact("article"));
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
        $data = $request->all();

        //validazione
        $request->validate([
          "title" => "required",
          "content" => "required",
          "slug" => [
            "required",
            Rule::unique("articles")->ignore($id)
          ],
          "image" => "image"
        ]);

        $path = Storage::disk("public")->put("images", $data["image"]);
        //troviamo l'id dell'articolo da modificare
        $article = Article::find($id);

        //permettiamo la modifica dell'articolo
        $article->title = $data["title"];
        $article->content = $data["content"];
        $article->slug = $data["slug"];
        $article->image = $path;
        //ora facciamo l'update del nuovo articolo
        $article->update();

        //ritorniamo alla rotta show del singolo articolo modificato
        return redirect()->route("admin.articles.index", $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //cercare l'id dell'articolo
        $article = Article::find($id);

        //cancello l'articolo
        $article->delete();

        //ritorno alla rotta index
        return redirect()->route("admin.articles.index", $article);
    }
}
