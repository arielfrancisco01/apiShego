<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable =[
        "code_user",
        "name",
        "price",
        "description",
        "marca",
        "modelo",
        "comprimento",
        "peso",
        "img",
        "code_condition"
    ];
}
