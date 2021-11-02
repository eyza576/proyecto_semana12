<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Paciente
 * @package App\Models
 * @version October 30, 2021, 6:57 pm UTC
 *
 * @property string $apellido_nombre
 * @property string $dni
 * @property integer $celular
 */
class Paciente extends Model
{
   // use SoftDeletes;

    public $table = 'paciente';
    protected $primaryKey= 'idpaciente';
    public $timestamps =false;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'apellido_nombre',
        'dni',
        'celular'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idpaciente' => 'integer',
        'apellido_nombre' => 'string',
        'dni' => 'string',
        'celular' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'apellido_nombre' => 'nullable|string|max:45',
        'dni' => 'nullable|string|max:45',
        'celular' => 'nullable|integer'
    ];
}
