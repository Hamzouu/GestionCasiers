{{--
Auteur : Vincenzo Di Fonte
Classe : CIN4A
ETML : École Technique des Métiers de Lausanne
Description de la page :  Cette page est la vue html de la page contenant la liste des étudiants, son but est d'afficher la liste de tous les étudiants
                          avec la possibilité de modifier ces derniers ou les supprimer
--}}
@extends('layouts.app')

@section('content')
    <h1>Liste des Élèves </h1>
        {{--Si il y a au moins un étudiant dans la base de données--}}
        @if ($allStudents->count() > 0)
            {{--Alors on affiche un tableau avec les informations du ou des étudiants--}}
            <table class="table-bordered">
                <tr>
                    <th scope="col">Nom de l'élève</th>
                    <th scope="col">Prénom de l'élève</th>
                    <th scope="col">Classe de l'élève</th>
                </tr>
                {{--Pour chaque étudiant on affiche ses infos--}}
                @foreach ($allStudents as $student)
                <tr>
                    <td>{{$student->nom}}</td>
                    <td>{{$student->prenom}}</td>
                    <td>{{$student->classe}}</td>
                    <td class="actionsHome">
                    {{--Bouton permettant la modification d'un étudiant--}}
                    <a href="{{route('student.FormUpdate', ['id' => $student -> id])}}">Modifier l'élève</a> 
                    <span> / </span>
                    {{--Bouton permettant la suppression d'un étudiant--}}
                    <a href="{{route('student.delete', ['id' => $student -> id])}}" 
                    onclick="return confirm('Êtes-vous cûr de vouloir supprimer l\'utilisateur {{$student->nom}} {{$student->prenom}} ? ')">Supprimer l'élève</a>
                    </td>
                </tr>
                @endforeach
    </table>
        @else
            <span>Aucun élève dans la base de données</span>
        @endif
<br>
    <br>
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

        @if (session('statutCreation'))
        <div class="bg-success">
         {{ session('statutCreation') }}
        </div>
        @endif               
@endsection