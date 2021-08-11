<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;//bu kitabxanani cagirirq ki zamani gunle gostere bilek
use Cviebrock\EloquentSluggable\Sluggable;//slug ucundu

class Quiz extends Model
{
    use HasFactory;
    use Sluggable;//slug sutunu unutmusduq soradan elave etdik.ve ayrica kod yazmamaq ucun bu kitabxanani daxil edirik..elequent sluglable yazib tapiriq internetde

    protected $fillable=['title','slug','status','description','finished_at'];//hansi xanalara eklemek istediyimizi fillable ile bildirrik
    //protected $guarded=[] hansina veri eklemek istemirim onu yaziriq
    protected $dates=['finished_at'];//difForHumans() istifade etmek ucun yaziriq..manual olaraq create ve update ucun gelir..
    public function getFinishedAtAtribute($date){
       return $data ? Carbon::parse($date) : null;//bu metodu istifade etmek ucun funksiya yazdiq..quiz list icinde yazilib bununla bagli
    }
       public function question()
    {
       return $this->hasMany('App\Models\Question');//question modeline baglanmaq ucun yazildi..questioncontrollorda index metodunda aciqlamasi var
    }

       public function sluggable(): array
    {
        return [
            'slug' => [
                'onUpdate' => true,
                'source' => 'title'
            ]
        ];
    }
}
