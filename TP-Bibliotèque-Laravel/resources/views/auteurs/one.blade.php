@extends('app')
@section('title','One')
@section('content')
    <table class="table table-hover">
        <thead>
            <tr>  
                <th> Nom </th>
                <th> Prenom </th>
                <th> Edit </th>
                <th> Delete </th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{$auteur->nom}}</td>
                    <td>{{$auteur->prenom}}</td>
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
        </tbody>
    </table>
@endsection