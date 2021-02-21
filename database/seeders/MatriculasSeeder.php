<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\{Alumno, Asignatura};

class MatriculasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $codAl=Alumno::orderBy('id')->pluck('id')->toArray();
        $codAsig=Asignatura::orderBy('id')->pluck('id')->toArray();
        for($i=0; $i<count($codAl); $i++){
            $esteAlumno=Alumno::find($codAl[$i]);
            $cantidadAsig=rand(0, count($codAsig));

            shuffle($codAsig);
            for($j=0; $j<$cantidadAsig; $j++){
                $nota=rand(0, 10);
                $esteAlumno->asignaturas()->attach($codAsig[$j], ['nota'=>$nota]);
            }
        }
    }
}
