<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuwesData extends Model
{
    // use HasFactory;
    protected $table = 'luwes_data';

    protected $guarded = ['no'];

    protected $fillable = [
        'id',
        'imei',
        'level_sensor',
        'name',
        'rec',
        'submitted_at'
    ];

    public $timestamps = false;
}
