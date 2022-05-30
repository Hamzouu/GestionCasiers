<?php

namespace App\Imports;

use App\Models\Locker;
use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel
{
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if($row[0] !== 'Etage') {

            $studentInfos = [
                'nom'    => $row[2],
                'prenom' => $row[3],
                'classe' => $row[4],
            ];
            
            $student = Student::create($studentInfos);
            
            $lockerInfos = [
                'nom_casier' => $row[1],
                'etage_casier' => $row[0],
                'site_casier' => 'Sébeillon',
                'student_id' => $student->id,
            ];
            
            $locker = Locker::create($lockerInfos);
            
            return $locker;
        }   
    }
}