@extends('layout')
@section('content')

<form action="{{ route('ajout.etudiant') }}" method='GET'>
    @csrf

    <div class="row">
        <div class="col-md-4 shadow">
            <p class="text-center border-bottom border-light">A propos</p>
            <input type="text" class="form-control" name="nom" placeholder="Nom"><br>
            <input type="text" class="form-control" name="prenom" placeholder="Prenom"><br>
            <input type="text" class="form-control" name="adresse" placeholder="Adresse"><br>
            <input type="text" class="form-control" name="age" placeholder="Age"><br>
            <div>
                <label>Sexe :</label>
                <label><input type="radio" name="sexe" value='Homme'>Homme</label>
                <label><input type="radio" name="sexe" value='Femme'>Femme</label>
            </div>
        </div>
        <div class="col-md-4 shadow">
            <p class="text-center border-bottom border-light">Ecolage payé</p>
            <p><input type="checkbox" name="janvier" id="">&nbsp;Janvier</p>
            <p><input type="checkbox" name="fevrier" id="">&nbsp;Fevrier</p>
            <p><input type="checkbox" name="mars" id="">&nbsp;Mars</p>
            <p><input type="checkbox" name="avril" id="">&nbsp;Avril</p>
            <p><input type="checkbox" name="mai" id="">&nbsp;Mai</p>
        </div>
        <div class="col-md-4 shadow">
            <p class="text-center border-bottom border-light ">Profil</p>
            <label for="">Importer une photo</label>
            <input type="file" accept="image" onchange="loadFile(event)" name="image">
            <img style="border-radius: 50%;;" width="200px" height="200px" id="output"/>
                <script>
                    var loadFile = function(event){
                        var output = document.getElementById('output');
                        output.src = URL.createObjectURL(event.target.files[0]);
                        output.onload = function(){
                            URL.revokeObjectURL(output.src)
                        }
                    };
                </script>
        </div>
    </div><br>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success">Ajouter</button>&nbsp;
        <button class="btn btn-secondary" type="button"><a style="text-decoration: none; color:white;" href="{{route('racine')}}">Retour</a></button>
    </div>
</form>

@endsection