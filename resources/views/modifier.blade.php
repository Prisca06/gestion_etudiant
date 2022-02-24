@extends('layout')
@section('content')

    <form action="{{ route('update.etudiant',$modif->id) }}" method="GET">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <label for="" >Nom</label>
                <input type="text" name='nom_modif' value="{{ $modif->nom }}" class="form-control">
                <label for="">Prenom</label>
                <input type="text" name='prenom_modif' value="{{ $modif->prenom }}" class="form-control">
                <label for="">Age</label>
                <input type="text" name='age_modif' value="{{ $modif->age }}" class="form-control">
                <label for="">Adresse</label>
                <input type="text" name='adresse_modif' value="{{ $modif->adresse }}" class="form-control">
                <label for="">Sexe</label>
                @if($modif->sexe == "Femme")
                <select name="sexe_modif" id="" class="form-control">
                    <option value="{{ $modif->sexe }}" checked>{{ $modif->sexe }}</option>
                    <option value="Homme">Homme</option>
                </select>
                @endif
                @if($modif->sexe == "Homme")
                <select name="sexe_modif" id="" class="form-control">
                    <option value="{{ $modif->sexe }}" checked>{{ $modif->sexe }}</option>
                    <option value="Femme">Femme</option>
                </select>
                @endif
                <br>
            
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Enregistrer</button>&nbsp;
                    <button class="btn btn-secondary" type="button"><a style="text-decoration: none; color:white;" href="{{route('racine')}}">Retour</a></button>
                </div>
            </div>
            <div class="col-md-3">
                <p class="text-center border-bottom border-light">Ecolage payé</p>
                @if($modif->janvier == "1")
                <p><input type="checkbox" name="janvier" id="" value="{{ $modif->janvier }}" >&nbsp;{{ $modif->janvier }}</p>
                <!-- @elseif($modif->janvier =="0")
                <p><input type="checkbox" name="janvier" id="" value="{{ $modif->janvier }}">&nbsp;{{ $modif->janvier }}</p>
                @endelseif -->
                @endif
                <p><input type="checkbox" name="fevrier" id="" value="{{ $modif->fevrier }}">&nbsp;{{ $modif->fevrier }}</p>
                <p><input type="checkbox" name="mars" id="" value="{{ $modif->mars }}">&nbsp;{{ $modif->mars }}</p>
                <p><input type="checkbox" name="avril" id="" value="{{ $modif->avril }}">&nbsp;{{ $modif->avril }}</p>
                <p><input type="checkbox" name="mai" id="" value="{{ $modif->mai }}">&nbsp;{{ $modif->mai }}</p>
            </div>

            <label for="">Profil</label>


        <img src="racine/{{ $modif->image }}" name="image_modif">

        </div>
            
 
    </form>

@endsection