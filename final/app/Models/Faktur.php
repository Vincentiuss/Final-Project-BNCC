<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    protected $primarykey = 'id';
    protected $fillable = ['Invoice', 'Quantity', 'Name', 'Category','Address','PostalCode','Subtotal','Total','NameItem'];
    public $timestamp = true;
    use HasFactory;
}
