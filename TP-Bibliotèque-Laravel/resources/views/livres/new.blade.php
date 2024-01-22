@extends('app')
@section('title','New')
@section('content')
    <form action="{{route('livres.store')}}" method="post">
        @csrf
        <input type="text" name="titre" class="form-control w-25" required placeholder="Titre"><br><br>
        <label for="auteur_id">Auteur: </label>
        <select name="auteur_id" class="form-control w-25">
            <option value="0" selected disabled>Auteur</option>
            @foreach($auteurs as $auteur)
                <option value="{{$auteur->id}}">{{$auteur->nom .' '.$auteur->prenom}}</option>
            @endforeach
        </select><br><br>
        <label for="publier">Date de Publication: </label>
        <input type="date" class="form-control w-25" name="publier" required><br><br>
        <input type="number" name="nombreDePages" class="form-control w-25" required placeholder="Nombre de Pages" min='10'><br><br>
        <button class="btn btn-success">Create</button>
    </form>
@endsection