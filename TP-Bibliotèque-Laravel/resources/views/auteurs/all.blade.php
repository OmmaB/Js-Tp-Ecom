@extends('app')
@section('title','All Auteurs')
@section('content')
    <table class="table table-hover">
        <thead>
            <tr>  
                <th> Nom </th>
                <th> Prenom </th>
                <th> Show </th>
                <th> Edit </th>
                <th> Update </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($auteurs as $auteur)
                <tr>
                    <td>{{$auteur->nom}}</td>
                    <td>{{$auteur->prenom}}</td>
                    <td>
                        <a href="{{route('auteurs.show',$auteur->id)}}" target="_blank" class="btn btn-primary">Show</a>
                    </td>
                    <td>
                        <a href="{{route('auteurs.edit',$auteur->id)}}" class="btn btn-warning">Edit</a><br><br>
                    </td>
                    <td> 
                        <form action="{{route('auteurs.destroy',$auteur->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table><br>
    <div>
        <a href="{{route('auteurs.create')}}" class="btn btn-secondary">Add New Auteur</a>
    </div><br><br>
@endsection