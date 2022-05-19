<?php
//Auteur : Vincenzo Di Fonte
//Classe : CIN4A
//ETML : École Technique des Métiers de Lausanne
//Description de la page :  Page du Modèle de la table Locker. Cette page est destinée à la création des relations ainsi qu'aux champs protégés
//                          
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Locker extends Model
{
    use HasFactory;

    //Protection des champs de la table Locker
    protected $fillable = [
        'nom_casier',
        'etage_casier',
        'infos_casier',
        'student_id'
    ];


    //Fonction Student
    //Permet la création d'une relation BelongsTo car un casier ne peut appartenir qu'a un seul étudiant
    function student()
    {
        return $this->belongsTo(Student::class);
    }
}
