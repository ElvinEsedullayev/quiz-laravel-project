<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;//yazdigimiz modeli elave edirik
use App\Models\Answer;//yazdigimiz modeli elave edirik
use App\Models\Result;//yazdigimiz modeli elave edirik

class MainController extends Controller
{


 ####################################--dasboard sehifesi--#################################################
    
    public function dashboard()
    {
        $quizzes= Quiz::where('status','publish')->withCount('question')->paginate(5);
        return view('dashboard',compact('quizzes'));
    }

     ####################################--dasboard sehifesinde suallari gosterir--#################################################

    public function quiz($slug)
    {
       $quiz=Quiz::whereSlug($slug)->with('question.my_answer')->first() ?? abort(404,'Bele quiz tapilmadi');
        //main controllerde quiz metodu suallari getirir quiz modelinde yazilan funksiya ile..indide deyirik ki,o suallarnan beraber cvblari da getir ..ona gore question modelinde cavablar modeline baglanti qurduq..bunu da maincontrollerde quiz metodu icinde questin yaninda yaziriq..bu yazi question icinde yazdigim aiqlamadi..hardan geldiyini bilim
        if($quiz->my_result){
            return view('quiz_result',compact('quiz'));
        }
        return view('quiz',compact('quiz'));
    }

     ####################################--detail sehifesinde gedir--#################################################


    public function quiz_detail($slug)
    {
        $quiz=Quiz::whereSlug($slug)->with('my_result','topTen.user')->withCount('question')->first() ?? abort(404,'Bele bir quiz tapilmadi');
        //my_result ve results quiz modelinden result modeline baglanti ile yaradilib ,burda istifade olunur,question da hemcinin..
        //results funksiyasini topTenle evez etdik.ele o modelde topten resultsa abglandi
        //user result tablosunda user modeline baglanma ucun yazilan funksiyanin adidi
        return view('quiz_detail',compact('quiz'));
    }

     ####################################--question sehifesine gedir--#################################################

    public function result(Request $request,$slug)
    {
        $quiz=Quiz::with('question')->whereSlug($slug)->first() ?? abort(404,'Bele bir quiz bulunamadi');
       // dd($quiz,$request->post());
       if($quiz->my_result){
           abort(404,'Siz artiq imtahanda istirak etmisiniz');
       }
       $correct=0;
        foreach ($quiz->question as $questions) {
            //echo $questions->id.'-'.$questions->answer.'/'.'<br>';//sualin id si ve sualin cvbni gosterir
            //echo $questions->id.'-'.$questions->answer.'/'.$request->post($questions->id).'<br>';//quiz icinde questionun cvbi ile postdan gelen cvbi gosterir yanasi
            Answer::create([
                'user_id'=>auth()->user()->id,
                'question_id'=>$questions->id,
                'answer'=>$request->post($questions->id)
                //butun suallara verilen cvblari answer tablosuna yukluyuruk
            ]);
            //echo $questions->answer.'-'.$request->post($questions->id).'<br>';//suallarin cvbi ve post ile gelen suallarin cvbini gosterir
            if($questions->correct_answer===$request->post($questions->id)){
                $correct+=1;//dogru cavab olduqca 1 ustune gelir
            }
        }
        //print_r($request->post());//requestden gelen yeni userin verdiyi cvblari gosterir..yuxardaki echo ile yoxlamaq olar nece cvb duzdu

        //return $correct; // dogru cvblarin sayini gosterir
            $point= round((100 / count($quiz->question) ) * $correct);//umumi quizdeki sayi 100 e bolur ve dogru cvblarin sayina vurur..meselen 100/5=20 20 vur dogru cavab sayi..round ededi yuvarlaqlasdirir
            $wrong = count($quiz->question)-$correct;
        Result::create([
            'user_id'=>auth()->user()->id,
            'quiz_id'=>$quiz->id,
            'point'=>$point,
            'correct'=>$correct,
            'wrong'=>$wrong
            //quizin neticeleri de bu tabloda saxlandi yuklendi
        ]);
        return redirect()->route('quiz.detail',$quiz->slug)->with('success','Imtahan suallarina cavab verdiniz. Sizin neticeniz :'.$point);
    }
}
