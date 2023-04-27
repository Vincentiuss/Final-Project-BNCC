<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $primarykey = 'id';
    protected $fillable = ['Category', 'Name', 'Price', 'Quantity','Image'];
    public $timestamp = true;
    use HasFactory;
}
