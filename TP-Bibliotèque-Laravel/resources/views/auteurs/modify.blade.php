@extends('app')
@section('title','New')
@section('content')
    <h2 class="text-secondary">Edit Old Auteur</h2>
    <form action="{{route('auteurs.store')}}" method="post">
        @csrf
        <input type="text" name="nom" class="form-control w-25" required placeholder="Nom" value="{{$auteur->nom}}"><br>
        <input type="text" name="prenom" class="form-control w-25" required placeholder="Prenom" value="{{$auteur->prenom}}"><br>
        <button class="btn btn-success">Change</button>
    </form>
@endsection