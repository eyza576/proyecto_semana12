<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Citas
 * @package App\Models
 * @version October 30, 2021, 6:24 pm UTC
 *
 * @property integer $idpaciente
 * @property string $fecha
 * @property integer $iddoctor
 */
class Citas extends Model
{
   // use SoftDeletes;

    public $table = 'citas';
    protected $primaryKey= 'idcitas';
    public $timestamps =false;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'idpaciente',
        'fecha',
        'iddoctor'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'idcitas' => 'integer',
        'idpaciente' => 'integer',
        'fecha' => 'date',
        'iddoctor' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'idpaciente' => 'nullable|integer',
        'fecha' => 'nullable',
        'iddoctor' => 'nullable|integer'
    ];

    
}
