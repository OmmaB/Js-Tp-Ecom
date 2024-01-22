@extends('app')
@section('title','One')
@section('content')
    <table class="table table-hover">
        <thead>
            <tr>  
                <th> Titre </th>
                <th> Auteur </th>
                <th> Année de Publication </th>
                <th> Nombre de Pages </th>
                <th class="text-center"> Edit </th>
                <th class="text-center"> Delete </th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{$livre->titre}}</td>
                    <td>{{$livre->auteur->nom . ' ' . $livre->auteur->prenom }}</td>
                    <td>{{$livre->publier}}</td>
                    <td>{{$livre->nombreDePages}}</td>
                    <td class="text-center">
                        <a href="{{route('livres.edit',$livre->id)}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('livres.destroy',$livre->id)}}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
        </tbody>
    </table>
@endsection