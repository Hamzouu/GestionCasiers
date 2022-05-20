{{--
Auteur : Vincenzo Di Fonte
Classe : CIN4A
ETML : École Technique des Métiers de Lausanne
Description de la page :  Cette page est la vue html de la page d'accueil de l'application, son objectif est d'afficher la liste des casiers en montrant 
                          ceux qui sont attribués et ceux qui ne le sont pas.
--}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Vue d'ensemble des casiers attribués </h1>
        {{--Si il y a au moins 1 casier alors on affiche le tableau qui les contient--}}
            @if ($lockers->count() > 0)
                    <table class="table-bordered">
                            <tr>
                                <th scope="col">Numéro du casier</th>
                                <th scope="col">Nom de l'élève</th>
                                <th scope="col">Prénom de l'élève</th>
                                <th scope="col">Classe de l'élève</th>
                                <th scope="col">Statut d'attribution</th>
                                <th scope="col">TEST</th>
                            </tr>
                            {{--Pour chaque casier on affiche les informations suivantes...--}}
                            @foreach ($lockers as $locker)   
                            <tr>
                            </tr>
                            {{--Si le contenu d'un étudiant est null alors on affiche un tableau avec des cellules spécifiant que les infos sont vides--}}
                            @if(is_null($locker->student))
                                <td>{{$locker->nom_casier}}</td>
                                <td> </td>
                                <td> </td>
                                <td> </td> 
                                <td class="alert-danger">Non attribué</td> 
                            {{--Sinon on affiche les infos des étidiants dans le tableau--}}
                            @else
                                <td>{{$locker->nom_casier}}</td>
                                <td>{{$locker->student->nom}}</td>
                                <td>{{$locker->student->prenom}}</td>
                                <td>{{$locker->student->classe}}</td> 
                                <td class="alert-success">Attribué</td> 
                            @endif
                            <td> <a href="{{route('dashboard.FormUpdate', ['id' => $locker -> id])}}">Modifier les infos casier</a>
                            @endforeach

                                {{--Bouton permettant la modification d'un casier--}}
                               
                    </table>
            {{--Sinon on affiche un message spécifiant qu'il n'y a aucun casier pour le moment--}}
            @else
            <span>Il n'y a aucun casier attribué pour le moment</span>
            @endif
    </div>
        {{--Si la session "statutCreation" est activée on affiche le message de confirmation--}}
        @if (session('statutCreation'))
        <div class="bg-success">
         {{ session('statutCreation') }}
        </div>
        @endif
@endsection


