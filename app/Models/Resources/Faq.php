<?php
namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model{
    protected $fillable = ['question','answer'];
    public $timestamps = true;
    protected $primaryKey = 'faqId';
    
}
