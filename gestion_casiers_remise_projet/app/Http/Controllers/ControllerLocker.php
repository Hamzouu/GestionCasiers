<?php
//Auteur : Vincenzo Di Fonte
//Classe : CIN4A
//ETML : École Technique des Métiers de Lausanne
//Description de la page :  Page du Controller du modèle Locker. Cette page est destinée à la création des fonctions
//                          pour la gestion des casiers.

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locker;
use App\Models\Student;

class ControllerLocker extends Controller
{
    //Fonction permettant de renvoyer la totalité des casiers présents dans la base de données
    //dans la vue d'accueil "home"
    public function homeView()
    {
        //Placement de tous les casiers dans la variable $lockers
        $lockers = Locker::all();

        return view('locker/home', [
            'lockers' => $lockers,
        ]);
    }
    
    private function generate_number()
    {

        return bin2hex(random_bytes(10));
    }

    //Fonction permettant de renvoyer tout les étudiants dans une variable dans la vue de création des casiers
    //Cette fonction a été créée afin de permettre l'attribution d'un casier à un étudiant dès la création du casier
    public function create()
    {
        $students = Student::all();

        return view('locker/create-locker', [
            'students' => $students
            ]);
    }

    // Fonction permettant de valider les champs du formulaire de création de casiers ainsi que la création dudit casier
    public function createNewLocker(Request $request)
    {
        //Validation des champs du formulaire
        $request->validate([
            'nom_casier' => ['required'],
            'etage_casier' => ['required'],
            'site_casier' => ['required'],
            'infos_casier' => ['required'],
            'student_id' => ['required'],
        ]);

        //Attribution des informations passées dans le formulaire dans les champs de la base de données
        $nom_casier = request('nom_casier');
        $student_id  = request('student_id');
        $etage_casier = request('etage_casier');
        $site_casier = request('site_casier');
        $infos_casier = request('infos_casier');
           
        //Création du casier
        $lockers = Locker::create([
            'nom_casier'=>$nom_casier,
            'student_id'=>$student_id,
            'etage_casier'=>$etage_casier,
            'site_casier'=>$site_casier,
            'infos_casier'=>$infos_casier,
        ]);
  
        return redirect('/')->with('statutCreation', 'Le casier a bien été créé !');
        

    }

    //Fonction permettant de renvoyer la liste de tous les casiers dans la variable $allLockers
    //Le but de la fonction est d'afficher la totalité des casiers dans la vue "liste des casiers"
    public function showAllLockers()
    {
        //Tout les casiers sont stockés dans la variable $allLockers
         $allLockers = Locker::all();

        // on retourne la vue "lockerList" ainsi que la variable allLockers et son contenu
         return view('locker/lockerList', compact('allLockers'));
    }  

   /*public function get_all_students()
    {
       $students = Student::all();
       
       return view('locker/create', [
        'students' => $students
        ]);    
        dd($students);
    }*/

    //Fonction permettant de récupérer l'étudiant à modifier et afficher le formulaire de modification avec les informations actuelles du casier
    public function showUpdateLockerForm($id)
    {
        $locker = Locker::findOrFail($id);
        $students = Student::all();

        return view('locker/updateLockerForm', ['locker' => $locker], ['students' => $students] );
    }

    //Fonction permettant de mettre à jour les champs d'un casier en fonction des modifications entrées dans le formulaire
    public function updateLocker(Request $request, $id)
    {
        $locker = Locker::find($id);

        //On effectue la correspondance des champs du formulaire avec ceux présents dans la base de données
        $locker->nom_casier=$request->input('nom_casier');
        $locker->etage_casier=$request->input('etage_casier');
        $locker->site_casier=$request->input('site_casier');
        $locker->infos_casier=$request->input('infos_casier');
        $locker->student_id=$request->input('student_id');
        
        //On effectue la modification
        $locker->update();
        return redirect()->route('lockers.show')->with('statutModification', 'Le casier a été modifié avec succès !');

    }

    //Fonction permettant de supprimer  un casier
    public function deleteLocker($id)
    {
        //L'id du casier que l'on souhaite supprimer est placé dans la variable $locker
        $locker=Locker::find($id);
        //Suppression de l'étudiant
        $locker->delete();
        return redirect()->route('lockers.show')->with('statutSuppression', 'Le casier a été supprimé avec succès !');
    }
////////////////////////////


    //Fonction Permettant d'effectuer une recherche sur l'application
    //Ne fonctionne pas à l'heure actuelle
    /* public function searchLocker()
    {
  
        $searchLocker = Request::get('search');
        $lockers = Locker::where('nom','like','%'.$search.'%')->orderBy('id')->paginate(6);
        return view('',['lockers' => $lockers]);
      
    } */
}
