@extends('layouts.app')
@extends('layout')
@section('contents')
    <p>Loic masoso...</p>
@endsection
@section('content')
<div class="d-flex justify-content-center">
        <a href="{{ url('ajout') }}"><button class="btn btn-primary"> +&nbsp; Ajouter</button></a>
</div>
    
    <table class="table table-striped table-bordered">
        <thead class="text-center">
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Sexe</th>
            <th>Age</th>
            <th>Janvier</th>
            <th>Fevrier</th>
            <th>Mars</th>
            <th>Avril</th>
            <th>Mai</th>
            <th>Profil</th>
            <th colspan="3" class="text-center">Action</th>
        </thead>
        <tbody>
           @foreach($etudiants as $et)
           <tr>
                <td>{{ $et->nom }}</td>
                <td>{{ $et->prenom }}</td>
                <td>{{ $et->adresse }}</td>
                <td>{{ $et->sexe }}</td>
                <td>{{ $et->age }}</td>
                <td>{{ $et->janvier }}</td>
                <td>{{ $et->fevrier }}</td>
                <td>{{ $et->mars }}</td>
                <td>{{ $et->avril }}</td>
                <td>{{ $et->mai }}</td>
                <td>{{ $et->image }}</td>
                <td> 
                    <form action="{{ route('delete.etudiant', $et->id_etudiant) }}" method="GET">
                        <button type="submit" class="btn btn-danger">Supprimer</button> 
                    </form>
                </td>
                <td>
                    <form action="{{ route('modifier.etudiant', $et->id_etudiant) }}" method="GET">
                        <button class="btn btn-success" type="submit">Modifier</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('afficher.etudiant', $et->id_etudiant) }}" method="GET">
                        <button class="btn btn-info" type="submit">Afficher</button>
                    </form>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>


@endsection
