<?php
//Auteur : Vincenzo Di Fonte
//Classe : CIN4A
//ETML : École Technique des Métiers de Lausanne
//Description de la page :  Cette page est destinée à la création de routes nécessaires pour le bon fonctionnement de Laravel ainsi que des fonctions
//                          présentes dans les controllers
// 
use App\Http\Controllers\ControllerLocker;
use App\Http\Controllers\ControllerStudent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route de la page d'accueil de l'application
//Affiche la liste des casiers avec l'étudiant pour lequel le casier est attribué
Route::get('/', [ControllerLocker::class, 'homeView'])->name('home'); 


//Route renvoyant sur une page de formulaire permettant d'y ajouter un élève
Route::get('/addStudent', [ControllerStudent::class, 'addStudent'])->name('students.add'); 

//Route permettant de rediriger les données du formulaire d'ajout des élèves afin qu'elles puissent être stockées dans la bdd
Route::post('/addStudent', [ControllerStudent::class, 'storeStudent'])->name('students.store');

//Route permettant d'accéder à la vue "liste des étudiants"
Route::get('/all-students', [ControllerStudent::class, 'showAllStudents'])->name('students.show');

//Route permettant d'accéder à la vue "liste des casiers"
Route::get('/all-lockers', [ControllerLocker::class, 'showAllLockers'])->name('lockers.show');

//Route permettant l'utilisation de la fonction create dans ControllerLocker
Route::get('/locker/create', [ControllerLocker::class, 'create']);

// Route permettant d'utiliser la fonction createNewLocker afin de créer un nouveau casier
Route::post('/locker/create', [ControllerLocker::class, 'createNewLocker']);

//Route::get('/create-locker', [ControllerLocker::class, 'get_all_students']);

//Route permettant de supprimer un casier
//Route::get('/locker/delete/id', [ControllerLocker::class, 'delete']);

// UPDATE

//Route permettant d'aller sur le formulaire de modification d'un étudiant
Route::get('/edit-student/{id}', [ControllerStudent::class, 'showUpdateStudentForm'])->name('student.FormUpdate');
Route::get('/edit-locker/{id}', [ControllerLocker::class, 'showUpdateLockerForm'])->name('locker.FormUpdate');

//Route permettant de mettre à jour un étudiant
Route::put('/update-student/{id}', [ControllerStudent::class, 'updateStudent'])->name('student.update');
Route::put('/update-locker/{id}', [ControllerLocker::class, 'updateLocker'])->name('locker.update');

//DELETE

//Route permettant de supprimer un étudiant
Route::get('/delete-student/{id}', [ControllerStudent::class, 'deleteStudent'])->name('student.delete');

//Route permettant de supprimer un casier
Route::get('/delete-locker/{id}', [ControllerLocker::class, 'deleteLocker'])->name('locker.delete');

//SEARCH

// Route pour la recherche sur l'application, n'est pas encore fonctionnelle
Route::get('/search-locker', [ControllerLocker::class, 'searchLocker'])->name('locker.search');


