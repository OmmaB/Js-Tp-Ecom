@extends('app')
@section('title','All Emprunts')
@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Ref</th>
                <th>Livre</th>
                <th>Date Debut</th>
                <th>Date Retour</th>
                <th> Show </th>
                <th> Edit </th>
                <th> Update </th>
            </tr>
        </thead>
        <tbody>
            @foreach($emprunts as $emprunt)
                <tr>
                    <td>{{$emprunt->id}}</td>
                    <td>{{$emprunt->livre->titre}}</td>
                    <td>{{$emprunt->date_Emprunt}}</td>
                    <td>{{$emprunt->date_retour}}</td>
                    <td>
                        <a href="/" target="_blank" class="btn btn-primary">Show</a>
                    </td>
                    <td>
                        <a href="/" class="btn btn-warning">Edit</a><br><br>
                    </td>
                    <td> 
                        <form action="/" method="post">
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
        <a href="{{route('emprunts.create')}}" class="btn btn-secondary">Add New Emprunt</a>
    </div><br><br>
@endsection