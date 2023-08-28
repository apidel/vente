@extends('layout')

@section('contenu')
    
<div class="my-3 p-3 bg-body rounded shadow sm">
    <center><h3 class="border-bottom pb-2 mb-4">Liste des articles</h3></center>
 <center><table class="table table-hover">
     <thead>
        <tr>
           <th scope="col">N°</th>
           <th scope="col">Titre</th>
           <th scope="col">Description</th>
           <th scope="col">Prix</th>
           <th scope="col">Propriétaire</th>
           <th scope="col">Action</th>
           <th scope="col">Détails</th>
         </tr>
       </thead>
       <tbody>
        @foreach ($articles as $article)
            
        {{-- $article->id ou $loop->inde+1 pour les numéros d'ordre --}}
         <tr>
           <th scope="row">{{$loop->index+1}}</th>
             <center><td>{{$article->titre}}</td></center>
             <center><td>{{$article->description}}</td></center>
             <center><td>{{$article->prix}}</td></center>
             <center><td>{{$article->user->name}}</td></center>
             <center><td>
             <a href="{{('article.update')}}" class="btn btn-warning">Modifier</a>
             <a href="" class="btn btn-danger">Supprimer</a>
           </td></center>
           <center><td>
             <a href="" class="btn btn-primary">Voir plus</a>
           </td></center>
         </tr>
         @endforeach
       </tbody>
   </table></center
   {{$articles->links()}}
 </div>
@endsection