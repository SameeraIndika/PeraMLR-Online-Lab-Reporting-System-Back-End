<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Labreport extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'patient_name',
        'patient_nic',
        'date',
        'test_id',
        'test_name',
        'test_result_id',
        'test_result_component',
        'test_result_diagnosis',
        'special_note',
        'signature_1',
        'signature_2',
        'signature_3',
    ];
}
