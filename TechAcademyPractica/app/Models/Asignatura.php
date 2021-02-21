<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;
    protected $fillable=['nombre', 'horas'];

    public function alumnos(){
        return $this->belongsToMany('App\Models\Alumno')
         ->withPivot('nota')
         ->withTimestamps();
    }

    public function alumnosOut(){
        $misalumnos = $this->alumnos()->pluck('alumnos.id');
        $alumnosSin = Alumno::whereNotIn('id', $misalumnos)->orderBy('apellidos');
        return $alumnosSin;

    }

    public function scopeNombre($query, $v){
        if(!isset($v)){
            return $query->where('nombre', 'like', '%');
        }
        Switch($v){
            case "%":
                return $query->where('nombre', 'like', '%');
            case "1" :
                return $query->where('nombre', 'like', 'a%')
                ->orWhere('nombre', 'like', 'b%')
                ->orWhere('nombre', 'like', 'c%')
                ->orWhere('nombre', 'like', 'd%')
                ->orWhere('nombre', 'like', 'e%')
                ->orWhere('nombre', 'like', 'f%');
            case "2" :
                return $query->where('nombre', 'like', 'g%')
                ->orWhere('nombre', 'like', 'h%')
                ->orWhere('nombre', 'like', 'i%')
                ->orWhere('nombre', 'like', 'j%')
                ->orWhere('nombre', 'like', 'k%')
                ->orWhere('nombre', 'like', 'l%');
            case "3" :
                return $query->where('nombre', 'like', 'm%')
                    ->orWhere('nombre', 'like', 'n%')
                    ->orWhere('nombre', 'like', 'o%')
                    ->orWhere('nombre', 'like', 'p%')
                    ->orWhere('nombre', 'like', 'q%')
                    ->orWhere('nombre', 'like', 'r%');
            case "4" :
                return $query->where('nombre', 'like', 's%')
                ->orWhere('nombre', 'like', 't%')
                ->orWhere('nombre', 'like', 'u%')
                ->orWhere('nombre', 'like', 'v%')
                ->orWhere('nombre', 'like', 'w%')
                ->orWhere('nombre', 'like', 'x%')
                ->orWhere('nombre', 'like', 'y%')
                ->orWhere('nombre', 'like', 'z%');
        }
    }
}
