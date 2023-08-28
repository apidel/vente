@extends('layout')

@section('contenu')

<div class="my-3 p-3 bg-body rounded shadow sm">
    <center><h3 class="border-bottom pb-2 mb-4">Modifier un article</h3></center>
    <center>
    <div class="mt-4">
       {{--}}afficher les erreurs pour champ requis{{--}}
    
    <form style="width:50%;" method="post" action="{{route('article.update')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="hidden" name="id" value="{{$article->id}}">
          <label for="titre" class="form-label" >Titre de l'article</label>
          <input type="text" class="form-control" id="titre" name="titre" value="{{$article->titre}}">
        </div>
        <div class="mb-3">
          <label for="prix" class="form-label" >Description de l'article</label>
          <textarea id="" cols="30" rows="5" name="description" >{{$article->description}}"</textarea>
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label" >Prix de l'article</label>
            <input type="number" class="form-control" id="prix" name="prix" value="{{$article->prix}}"">
        </div>
        {{-- <div class="mb-3">
            <label for="prix" class="form-label" >Vendeur</label>
            <select class="form-control" name="user_id">
                <option value=""></option>
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div> --}}
        <label for="photo" class="form-label" >Image de l'article</label>
        <input type="file" class="form-control" id="image" name="photo" value="{{$article->photo}}"><br>
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="{{route('article')}}" class="btn btn-danger">Annuler</a>
      </form>
    </div>
</center>
    
@endsection