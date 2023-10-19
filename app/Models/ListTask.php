<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListTask extends Model
{
    use HasFactory;
    // use softDeletes;

    protected $primaryKey = 'user_id';
    public $table = "tasks";

    protected $fillable = [
        'name','deskripsi','status'
    ];

    protected $hidden = [

    ];
}
