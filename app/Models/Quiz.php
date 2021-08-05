<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;//bu kitabxanani cagirirq ki zamani gunle gostere bilek
class Quiz extends Model
{
    use HasFactory;
    protected $fillable=['title','description','finished_at'];//hansi xanalara eklemek istediyimizi fillable ile bildirrik
    //protected $guarded=[] hansina veri eklemek istemirim onu yaziriq
    protected $dates=['finished_at'];//difForHumans() istifade etmek ucun yaziriq..manual olaraq create ve update ucun gelir..
    public function getFinishedAtAtribute($date){
       return $data ? Carbon::parse($date) : null;//bu metodu istifade etmek ucun funksiya yazdiq..quiz list icinde yazilib bununla bagli
    }
       public function question()
    {
       return $this->hasMany('App\Models\Question');//question modeline baglanmaq ucun yazildi..questioncontrollorda index metodunda aciqlamasi var
    }
}
