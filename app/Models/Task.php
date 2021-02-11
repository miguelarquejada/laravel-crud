<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // protected $table = 'tasks';
    // protected $primaryKey = 'id';
    // public $incrementing = false;
    // protected $keyType = 'string';

    public $timestamps = false; // created_at, updated_at
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'updated_date';

    protected $fillable = ['title']; //  allow mass assignment
}
