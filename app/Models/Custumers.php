<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custumers extends Model
{
    use HasFactory;
    protected $table = 'custumers';
    protected $fillable = ['dni','email','address','name','last_name','id_reg','id_com'];
}
