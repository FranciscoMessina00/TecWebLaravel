<?php
namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class User extends Model{
    public $timestamps = false;
    protected $primaryKey = 'userId';
    protected $guarded = ['userId'];
    
}
