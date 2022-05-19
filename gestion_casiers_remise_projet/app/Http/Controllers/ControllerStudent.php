<?php
//Auteur : Vincenzo Di Fonte
//Classe : CIN4A
//ETML : École Technique des Métiers de Lausanne
//Description de la page :  Page du Controller du modèle Student. Cette page est destinée à la création des fonctions
//                          pour la gestion des élèves.

namespace App\Http\Controllers;

use App\Models\Locker;
use App\Models\Student;
use Illuminate\Http\Request;

class ControllerStudent extends Controller
{

        // Fonction permettant de retourner la vue contenant le formulaire d'ajout des élèves
        public function addStudent()
        {
            return view('/student/studentForm');
        }
    
        // Fontion qui permet de stocker les données du formulaire d'ajout d'un élève
        public function storeStudent(Request $request)
        {    
            //Stockage des informations du formulaire d'ajout d'élève
            Student::create([
                'nom'=>$request->nom,
                'prenom' =>$request->prenom,
                'classe' =>$request->classe
            ]);

            return redirect()->route('students.show')->with('statutCreation', 'L\'élève a été créé avec succès !');
        }

        //Fonction permettant de renvoyer la liste de tous les étudiants dans la variable $allStudents
        //Le but de la fonction est d'afficher la totalité des étudiants dans la vue "liste des élèves"
        public function showAllStudents()
        {
            //Tout les étudiants sont stockés dans la variable $allStudents
             $allStudents = Student::all();

             return view('student/studentList', compact('allStudents'));
        }

        //Fonction permettant de récupérer l'étudiant à modifier et afficher le formulaire de modidication avec les informations actuelles de l'étudiant
        public function showUpdateStudentForm($id)
        {
            $student = Student::findOrFail($id);
    
            return view('student/updateStudentForm', ['student' => $student]);
        }

        // Fonction permettant de mettre à jour les informations d'un étudiant
        public function updateStudent(Request $request, $id)
        {
            //On effectue la correspondance des champs du formulaire avec ceux présents dans la base de données
            $student = Student::find($id);
            $student->nom=$request->input('nom');
            $student->prenom=$request->input('prenom');
            $student->classe=$request->input('classe');
                
            //On effectue la modification
            $student->update();

            return redirect()->route('students.show')->with('statutModification', 'L\'élève a été modifié avec succès !');

        }
    
        //Fonction permettant de supprimer  un étudiant
        public function deleteStudent($id)
        {
            $student=Student::find($id);
            $locker=Locker::find($id);
            // Suppression de l'étudiant
            $student->delete();

            return redirect()->route('students.show')->with('statutSuppression', 'L\'élève a été supprimé avec succès !');
        }


}
