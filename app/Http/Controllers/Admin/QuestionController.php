<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;//yazdigimiz modeli elave edirik
use App\Http\Requests\QuestionCreateRequest;//validate istifade etmek ucundu
use App\Http\Requests\QuestionUpdateRequest;//validate istifade etmek ucundu
use Illuminate\Support\Str;//slug ucun bu kitabxanani elave edirik
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)//burda bunu elave etdik,ona goreki question modelini ayri quiz modelni ayri cagirmiyaq. ele quizden questiona kecik edek. yeni her quize aid questionlar olacaq..bizde id ile hansi quize gedirik onu gyazdiq..questiona baglanmaq ucun ise quiz modelinde question funksiyasin yazdiq
    {
        $quiz=Quiz::whereId($id)->with('question')->first() ?? abort(404,'Quiz tapilmadi');
        return view('admin.question.list',compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz = Quiz::find($id);
        return view('admin.question.create',compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request,$id)//hansi quize aid sual yaradiriq onun idsin tapmaq lazimdi
    {
            if($request->hasFile('image')){
                    $imageName = Str::slug($request->questions).'.'.$request->image->extension();
                    $fileUpload = 'uploads/'.$imageName;
                    $request->image->move(public_path('uploads'),$imageName);
                    $request->merge([
                        'image'=>$fileUpload
                    ]);
        }
         Quiz::find($id)->question()->create($request->post());//burda quize baglanib questionu ise modulda yazdigimiz funksiya ile cagirdiq,her iki modula bagli oldu
         return redirect()->route('questions.index',$id)->with('success','Sual basarili sekilde olusturuldu');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz_id,$question_id)
    {
        $question = Quiz::find($quiz_id)->question()->whereId($question_id)->first();
        return view('admin.question.edit',compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, $quiz_id,$question_id)
    {
                    if($request->hasFile('image')){
                    $imageName = Str::slug($request->questions).'.'.$request->image->extension();
                    $fileUpload = 'uploads/'.$imageName;
                    $request->image->move(public_path('uploads'),$imageName);
                    $request->merge([
                        'image'=>$fileUpload
                    ]);
        }
         
         Quiz::find($quiz_id)->question()->whereId($question_id)->first()->update($request->post()) ??abort(404,'Quiz tapilmadi');//burda quize baglanib questionu ise modulda yazdigimiz funksiya ile cagirdiq,her iki modula bagli oldu
         return redirect()->route('questions.index',$quiz_id)->with('success','Sual basarili sekilde yenilendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($quiz_id,$question_id)
    {
        Quiz::find($quiz_id)->question()->whereId($question_id)->first()->delete();
        return redirect()->back()->with('success','Sual basarili sekilde silindi');
    }
}
