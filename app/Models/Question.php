<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable=['questions','image','answer1','answer2','answer3','answer4','answer5','correct_answer'];

         ####################################--answer modele baglanti--#################################################
    public function my_answer(){
        return $this->hasOne('App\Models\Answer')->where('user_id',auth()->user()->id);//main controllerde quiz metodu suallari getirir quiz modelinde yazilan funksiya ile..indide deyirik ki,o suallarnan beraber cvblari da getir ..ona gore question modelinde cavablar modeline baglanti qurduq..bunu da maincontrollerde quiz metodu icinde questin yaninda yaziriq
    }
   
}
