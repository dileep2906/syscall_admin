<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;
    protected $table = 'clients';

    protected $fillable = [
        'id',
        'name',
        'email',
        'number',        
        'job'
    ];



    protected $guarded = [];


    protected $hidden = [
        'remember_token',
        '_token',
    ];


    protected $casts = [
        'created_at' => 'datetime',
    ];
}
