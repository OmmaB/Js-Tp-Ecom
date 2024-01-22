@extends('app')
@section('title','New')
@section('content')
    <form  method="post">
        @csrf
        <select name="livre_id" required>
            <option selected disabled>Livre</option>
            @foreach($livres as $livre)
                <option value="{{$livre->id}}">{{$livre->titre}}</option>
            @endforeach
        </select><br><br>
        <input type="date" name="date_Emprunt" required placeholder="Date Debut"><br><br>
        <input type="date" name="date_retour" required placeholder="Date Retour"><br><br>
        <button class="btn btn-info">Create</button>
    </form>
@endsection