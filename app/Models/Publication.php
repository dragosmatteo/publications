<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $table = "publications";
    protected $fillable = ['title', 'author', 'category', 'description', 'created_at', 'updated_at'];
}
