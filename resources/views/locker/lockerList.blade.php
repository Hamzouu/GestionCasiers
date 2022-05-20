{{--
Auteur : Vincenzo Di Fonte
Classe : CIN4A
ETML : École Technique des Métiers de Lausanne
Description de la page :  Cette page est la vue html de la page contenant la liste des casiers, son but est d'afficher la liste de tous les casiers
                          avec la possibilité de modifier ces derniers ou les supprimer
--}}
@extends('layouts.app')

@section('content')
    <h1>Liste des Casiers </h1>
        {{--Si il y a au moins un casier dans la base de données--}}
        @if ($allLockers->count() > 0)
            {{--Alors on affiche un tableau avec les informations du ou des casiers--}}
            <table class="table-bordered">
                    <tr>
                        <th scope="col">N° de casier</th>
                        <th scope="col">Étage</th>
                        <th scope="col">Site</th>
                        <th scope="col">Infos</th>
                    </tr>
                    {{--Pour chaque casier on affiche ses infos--}}
                    @foreach ($allLockers as $locker)
                    <tr>
                        <td>{{$locker->nom_casier}}</td>
                        <td>{{$locker->etage_casier}}</td>
                        <td>{{$locker->site_casier}}</td>
                        <td>{{$locker->infos_casier}}</td>
                    <td class="actionsLocker">
                        {{--Bouton permettant la modification d'un casier--}}
                        <a href="{{route('locker.FormUpdate', ['id' => $locker -> id])}}">Modifier les infos casier</a> 
                        <span> / </span>
                         {{--Bouton permettant la suppression d'un casier--}}
                        <a href="{{route('locker.delete', ['id' => $locker -> id])}}" onclick="return confirm('Êtes-vous cûr de vouloir supprimer le casier {{$locker->nom_casier}} ? ')">Supprimer le casier</a>
                    </td>
                    </tr>
                    @endforeach

            </table>
        @else
        <span>Aucun casier dans la base de données</span>
        @endif
        
        {{--Variables de session permettant d'afficher des messages de confirmation--}}
         @if (session('statutModification'))
        <div class="bg-success">
         {{ session('statutModification') }}
        </div>
        @endif

        @if (session('statutSuppression'))
        <div class="bg-success">
         {{ session('statutSuppression') }}
        </div>
        @endif
                

@endsection