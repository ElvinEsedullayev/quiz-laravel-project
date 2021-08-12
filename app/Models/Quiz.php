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

    protected $appends=['details'];//yeni sutun yaradirtiq ve istifade etmek ucun yaziriq..getdetailattribute ile

    ####################################--yeni tablo yaradiriq gorunmuyen--#################################################

    public function getDetailsAttribute()
    {  
        if($this->results()->count()>0){
                        return [
                    'average'=>round($this->results()->avg('point')),//avg ortalama bali gosterir..hamsin topluyur ve saya bolur..hansi sutunu istediyimnizi de qeyd edirik..results ise asagida yazdigimiz funksiyadan gelir..ozumuz sutun yaratdiq
                    'join_count'=>$this->results()->count()//istirak eden sayi gosterir
                ];
           }
           return null;
    }

    ####################################--result(tablosuna baglanti)--#################################################
    //tek veri getirir,yeni menim neticemi
    public function my_result()
    {
        //quiz/detay sehifesinde imtahan neticesini gostere bilmek ucun bu funksiya yazildi..hasOne ile baglandi..ordan bir neticeni getirir
        return $this->hasOne('App\Models\Result')->where('user_id',auth()->user()->id);//hansi userdi onun neticesin gostersin
    }

     ####################################--result(tablosuna baglanti)--#################################################
        //cox veri getirri,imtahana giren butun usaqlarin neticesin

        public function results()
        {
            return $this->hasMany('App\Models\Result');
        }

    ####################################--diffForHumans()--#################################################
    public function getFinishedAtAtribute($date){
       return $data ? Carbon::parse($date) : null;//bu metodu istifade etmek ucun funksiya yazdiq..quiz list icinde yazilib bununla bagli
    }

    ####################################--question(tablosu)--#################################################

       public function question()
    {
       return $this->hasMany('App\Models\Question');//question modeline baglanmaq ucun yazildi..questioncontrollorda index metodunda aciqlamasi var
    }

    ####################################--slug()--#################################################

       public function sluggable(): array//slug sutunu unutmusduq soradan elave etdik.ve ayrica kod yazmamaq ucun bu kitabxanani daxil edirik..elequent sluglable yazib 
    {
        return [
            'slug' => [
                'onUpdate' => true,
                'source' => 'title'
            ]
        ];
    }
}
