<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreFormat extends Model
{
    use HasFactory;

    protected $table = 'store_formats';

    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'name',
        'title',
        'tag',
        'description',
        'data',
        'date_store',
    ];
}