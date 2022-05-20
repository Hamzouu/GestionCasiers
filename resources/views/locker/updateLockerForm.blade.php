{{--
Auteur : Vincenzo Di Fonte
Classe : CIN4A
ETML : École Technique des Métiers de Lausanne
Description de la page :  Cette page est la vue html de la page de modification d'un casier
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
    <h1>Modification des Infos des casiers</h1>

    <form method="POST" action="{{ url('update-locker/'.$locker->id) }}">
    <!-- csrf permet de sécuriser le formulaire -->
    @csrf
    @method('PUT')
    
    <label for="nom_casier">N° du casier : </label>
    <input type="text" name="nom_casier" value="{{$locker['nom_casier']}}"><br><br>
    <label for="etage_casier">Étage du casier : </label>
    <input type="text" name="etage_casier" value="{{$locker['etage_casier']}}"><br><br>
    <label for="site_casier">Site : </label>
    <input type="text" name="site_casier" value="{{$locker['site_casier']}}"><br><br>
    <label for="infos_casier">Informations : </label>
    <input type="text" name="infos_casier" value="{{$locker['infos_casier']}}"><br><br>
    <button type="submit">Modifier le casier</button>


@endsection