@extends('layout')
@section('content')

        <label for="" >Nom</label>
        <input type="text" name='nom_modif' value="{{ $modif->nom }}" class="form-control" disabled>
        <label for="">Prenom</label>
        <input type="text" name='prenom_modif' value="{{ $modif->prenom }}" class="form-control" disabled>
        <label for="">Age</label>
        <input type="text" name='age_modif' value="{{ $modif->age }}" class="form-control" disabled>
        <label for="">Adresse</label>
        <input type="text" name='adresse_modif' value="{{ $modif->adresse }}" class="form-control" disabled>
        <label for="">Sexe</label>
        <input type="text" name='sexe_modif' value="{{ $modif->sexe }}" class="form-control" disabled><br>
        <label for="">Profil</label>


        <img src="/{{ $modif->image }}" name="image_modif">


        <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Enregistrer</button>&nbsp;
                <button class="btn btn-secondary" type="button"><a style="text-decoration: none; color:white;" href="{{route('racine')}}">Retour</a></button>
        </div>
@endsection