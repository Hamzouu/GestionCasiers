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
        $student = new Student([
           'nom'    => $row[2],
           'prenom' => $row[3],
           'classe' => $row[4],
        ]);

        dump($student->get());
        die(); 

        $student->insert();

        return $student;
    }
}