<?php
namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Accomodation extends Model{
    public $timestamps = true;
    protected $primaryKey = 'accId';
    
    public function locator()
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }
    
    public function students()
    {
        return $this->belongsToMany(User::class, 'accomodation_student', 'accId', 'userId');
    }
    
}
