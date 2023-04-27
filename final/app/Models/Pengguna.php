<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Pengguna extends Authenticable
{
    protected $primarykey = 'id';
    protected $fillable = ['Name', 'Email', 'Password', 'Phone'];
    public $timestamp = true;
    use HasFactory;
}
