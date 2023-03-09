<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obsatendimentoreport extends Model
{
    protected $fillable =[
        'idAtendimento',
        'obs',
    ];
    use HasFactory;
}
