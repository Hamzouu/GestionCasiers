{{--
Auteur : Vincenzo Di Fonte
Classe : CIN4A
ETML : École Technique des Métiers de Lausanne
Description de la page :  Cette page est le template app.blade.php qui contient la structure html de chaque page de l'application
                          ainsi que le menu de navigation
--}}

<!doctype html>
<html>

<head>

    <!-- fichier css -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container">
        {{--Barre de navigation--}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                 <li class="nav-item active">  <a class="navbar-brand" href="/"> Accueil</a></li>
                <li class="nav-item active"><a class="navbar-brand" href={{route('students.add')}}>Ajouter élève</a></li>
                <li class="nav-item active">  <a class="navbar-brand" href="/locker/create">Ajouter un casier</a></li>
                <li class="nav-item active">  <a class="navbar-brand" href="/all-students">Liste des élèves</a></li>
                <li class="nav-item active">  <a class="navbar-brand" href="/all-lockers">Liste des casiers</a></li>
  
            </ul>
            <h1 class="logoGestCas"> GESTION DE CASIERS</h1>
            <input type="text" class="form-control col-md-4 float-left" name="search" id="search" placeholder="Rechercher...">
        </nav>

        @yield('content')
    </div>
</body>

</html>