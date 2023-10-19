<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ListTask extends Model
{
    use HasFactory;
    // use softDeletes;

    protected $primaryKey = 'id';
    public $table = "tasks";

    protected $fillable = [
        'user_id','task_name','deskripsi','status','gambar_task'
    ];

    protected $hidden = [

    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
