<?php
//Auteur : Vincenzo Di Fonte
//Classe : CIN4A
//ETML : École Technique des Métiers de Lausanne
//Description de la page :  Table de migration pour le modèle lockers. Cette page est destinée à la création des champs de la table locker
// 
use App\Models\Student;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLockersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lockers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom_casier')->unique;
            $table->string('etage_casier');
            $table->string('site_casier')->nullable();
            $table->mediumText('infos_casier')->nullable();
            $table->timestamps();
            $table->foreignId(column:'student_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lockers');
    }
}
