{{--
Auteur : Vincenzo Di Fonte
Classe : CIN4A
ETML : École Technique des Métiers de Lausanne
Description de la page :  Cette page est la vue html de la page de modification d'un étudiant
--}}


@extends('layouts.app')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
    <h1>Modification des Infos des élèves</h1>

    <form method="POST" action="{{ url('update-student/'.$student->id) }}">
    <!-- csrf permet de sécuriser le formulaire -->
    @csrf
    @method('PUT')
    
    <label for="nom">Nom de l'élève : </label>
    <input type="text" name="nom" value="{{$student['nom']}}"><br><br>
    <label for="prenom">Prénom de l'élève : </label>
    <input type="text" name="prenom" value="{{$student['prenom']}}"><br><br>
    <label for="classe">Classe l'élève : </label>
    <input type="text" name="classe" value="{{$student['classe']}}"><br><br>

    <button type="submit">Modifier l'élève</button>

@endsection