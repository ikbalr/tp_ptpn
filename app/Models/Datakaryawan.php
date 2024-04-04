<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datakaryawan extends Model
{
    use HasFactory;
    protected $table = 'data_karyawan';
    protected $primaryKey = 'pers_no';
    public $timestamps = false;
    protected $guarded = [];
}
