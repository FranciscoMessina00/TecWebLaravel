<?php
namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Accomodation extends Model{
    public $timestamps = false;
    protected $primaryKey = 'accId';
    
    public function locator()
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }
    
}
