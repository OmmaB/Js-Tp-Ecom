@extends('app')
@section('title','All Livres')
@section('content')
    <table class="table table-hover">
        <thead>
            <tr>  
                <th> Titre </th>
                <th> Auteur </th>
                <th> Année de Publication </th>
                <th> Nombre de Pages </th>
                <th> Show </th>
                <th> Edit </th>
                <th> Update </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livres as $livre)
                <tr>
                    <td>{{$livre->titre}}</td>
                    <td>{{$livre->auteur->nom . ' ' . $livre->auteur->prenom }}</td>
                    <td>{{$livre->publier}}</td>
                    <td>{{$livre->nombreDePages}}</td>
                    <td>
                        <a href="{{route('livres.show',$livre->id)}}" target="_blank" class="btn btn-primary">Show</a>
                    </td>
                    <td>
                        <a href="{{route('livres.edit',$livre->id)}}" class="btn btn-warning">Edit</a><br><br>
                    </td>
                    <td> 
                        <form action="{{route('livres.destroy',$livre->id)}}" method="post">
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
        <a href="{{route('livres.create')}}" class="btn btn-secondary">Add New Livre</a>
    </div><br><br>
    {{-- {{ $livres->links() }} --}}
@endsection