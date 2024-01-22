@extends('app')
@section('title','New')
@section('content')
    <form action="{{route('livres.update',$livre->id)}}" method="post">
        @csrf
        @method('put')
        <input type="text" name="titre" class="form-control w-25" required placeholder="Titre" value="{{$livre->titre}}"><br><br>
        <label for="auteur_id">Auteur: </label>
        <select name="auteur_id" class="form-control w-25">
            <option value="{{$livre->auteur->id}}" disabled selected>{{$livre->auteur->nom .' '.$livre->auteur->prenom}}</option>
            @foreach($auteurs as $auteur)
                <option value="{{$auteur->id}}">{{$auteur->nom .' '.$auteur->prenom}}</option>
            @endforeach
        </select><br><br>
        <label for="publier">Date de Publication: </label>
        <input type="date" class="form-control w-25" name="publier" required value="{{$livre->publier}}"><br><br>
        <input type="number" name="nombreDePages" class="form-control w-25" required placeholder="Nombre de Pages" min='10' value="{{$livre->nombreDePages}}"><br><br>
        <button class="btn btn-success">Change</button>
    </form>
@endsection