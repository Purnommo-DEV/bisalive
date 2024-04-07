<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedsosUsers extends Model
{
    use HasFactory;

    protected $table = 'medsos_users';
    protected $guarded = ['id'];
}
