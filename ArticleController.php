<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class ArticleController extends Controller
{
    public function index()
    {
        // //remmplacer all par paginate si vous ne voulez pas tous les 
        // éléments sur une même page
        // puis aller dans providers->AppServiceProvider et écrivez sur 
        // la partie boot "Paginator::useBootstrap();"
        $articles = Article::paginate(15);
        return view('article', compact('articles'));
    }

    public function ajouter(){
    $users = User::all();
    return view('ajoutarticle', compact('users'));
    }

    public function save(Request $request){
        
        $validate = $request->validate([
            'titre'=>'required',
            'description'=>'required',
            'prix'=>'required',
            'photo'=>'required|image|mimes:jpg,jpeg,png,gif,svg',
        ]);
        $image =$request->file('photo');
        //destination de mes images
        //$destinationimage = '/assets/images';
        // //créer un profil pour l'image pour avoir un nom unique d'image au cas où
        // plusieurs personnes posteraient une image avec un nom existant
        $profileImage = $image->hashName();
        //déplacer l'image vers le repertoire de destination
        // $image->move($destinationimage, $profileImage);
        $image->store('public/images');
        //mettre à jour l'image
        $validate['photo'] = $profileImage;
        $validate['user_id'] = Auth::user()->id;
        $articles = Article::create($validate);
        // $articles = new article();
        // $articles->titre = $request->titre;
        // $articles->description = $request->description;
        // $articles->prix = $request->prix;
        // $articles->user_id = $request->user_id;
        // $articles->image = $request->image->hashName();
        // $articles->save();
        return redirect('article');
    }
    
    public function update(Request $request){
        try {
            $article = Article::find($request->id);
            return view('updatarticle', ['article'=>$article]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
