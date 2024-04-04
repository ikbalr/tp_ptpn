<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unitusaha extends Model
{
    use HasFactory;
    protected $table = 'unit_usaha';
    public $timestamps = false;
    protected $guarded = [];
}
