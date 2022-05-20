{{--
Auteur : Vincenzo Di Fonte
Classe : CIN4A
ETML : École Technique des Métiers de Lausanne
Description de la page :  Cette page est la vue html de la page de création d'un casier
--}}

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un nouveau casier casier</h1>
    {{--Création du formulaire--}}
    <form action="/locker/create" method="post">
        {{ csrf_field() }}
        <div class="mb-3">

            <div>
                <label for="nom_casier" class="form-label">Numéro du casier :</label>
                <input type="text" class="form-control" id="number" name="nom_casier" placeholder="Numéro du casier" value="{{ old('nom_casier') }}">

                {{--Gestion des erreurs--}}
                @if($errors->has('nom_casier'))
                {{ $errors->first('nom_casier') }}
                @endif
            </div>
                <br>
            <div>
                <label for="etage_casier" class="form-label">Étage du casier :</label>

                <select name="etage_casier" id="etage_casier">
                {{--La valeur par défaut si aucun étage est choisi est la valeur 0--}}
                <option value="">--Veuillez choisir une option--</option>
                    <option value="1">1er étage</option>
                    <option value="2">2 ème étage</option>
                    <option value="3">3 ème étage</option>
                    <option value="4">4 ème étage</option>
                    <option value="5">5 ème étage</option>
                    <option value="6">6 ème étage</option>
                    <option value="7">7 ème étage</option>
                    <option value="8">8 ème étage</option>
                    <option value="9">9 ème étage</option>
                    <option value="10">10 ème étage</option>
                </select>
                @if($errors->has('etage_casier'))
                {{ $errors->first('etage_casier') }}
                @endif
            </div>
            <br>
            
            <div>
                <label for="site_casier" class="form-label">Site du casier :</label>
                <select name="site_casier" id="site_casier">
                <option value="">--Veuillez choisir une option--</option>
                    <option value="Sebeillon">Sébeillon</option>
                    <option value="Vennes">Vennes</option>
                </select>
                 @if($errors->has('site_casier'))
                {{ $errors->first('site_casier') }}
                @endif
            </div>
            <br>

            <label for="infos_casier">Infos :  </label>
            <textarea name="infos_casier" cols="30" rows="10"></textarea>
            @if($errors->has('infos_casier'))
            {{ $errors->first('infos_casier') }}
            @endif
            <br>
            <h4> Étudiant attribué au casier :</h4>
            <div>
                 <select name="student_id" id="student_id">
                <option value="">--Veuillez choisir l'étudiant attribué au casier--</option>
                {{--Si il y a des étudiants--}}
                @if (count($students))
                {{--Alors pour chaque étudiant--}}
                @foreach ($students as $student)
                    {{--On affiche sa valeur dans la liste déroulante--}}
                    <option value="{{$student->id}}"> {{$student->nom}} {{$student->prenom}}</option>
                @endforeach
                @endif
                </select>
                @if($errors->has('student_id'))
                {{ $errors->first('student_id') }}
                @endif
            </div>
            <br><br>
            <input type="submit" value="Enregistrer">
    </form>
</div>


@endsection