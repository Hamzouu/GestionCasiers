<?php
//Auteur : Vincenzo Di Fonte
//Classe : CIN4A
//ETML : École Technique des Métiers de Lausanne
//Description de la page :  Page du Modèle de la table Student. Cette page est destinée à la création des relations ainsi qu'aux champs protégés
//  
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    //Protection des champs de la table Student
    protected $fillable = [
        'nom',
        'prenom',
        'classe',
        'id'
    ];

    //Fonction locker
    //Permet la création d'une relation hasMany car un étudiant peut avoir plusieurs casiers
    public function locker()
    {
        return $this->hasMany(Locker::class);
    }
}
