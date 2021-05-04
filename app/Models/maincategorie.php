<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maincategorie extends Model
{
    protected $table = 'maincategories';
    protected $primaryKey = 'id';
    use HasFactory;
}
