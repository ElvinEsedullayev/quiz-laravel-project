<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;//yazdigimiz modeli elave edirik
use App\Http\Requests\QuizCreateRequest;//validate istifade etmek ucundu
use App\Http\Requests\QuizUpdateRequest;//validate istifade etmek ucundu
class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::withCount('question')->orderBy('created_at','DESC')->paginate(5);//paginate ucundu admin.quiz.list icindedi
        return view('admin.quiz.list',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quiz.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizCreateRequest $request)
    {
        Quiz::create($request->post());
        return redirect()->route('quizzes.index')->with('success','Quiz basarili sekilde yuklendi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::withCount('question')->find($id) ?? abort(404,'Quiz tapilmadi');//error mesajlari view icinde errors papkasinda.
        return view('admin.quiz.edit',compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizUpdateRequest $request, $id)
    {
         $quiz = Quiz::find($id) ?? abort(404,'Quiz tapilmadi');
         //Quiz::where('id',$id)->update($request->post());burda put metodu qeyd etmisik ve onu da postla guncellemek istirdi..asagida olan exceptle onlar xaric guncelleme et yazdiq
         Quiz::where('id',$id)->update($request->except(['_method','_token']));
         return redirect()->route('quizzes.index')->with('success','Quiz basarili sekilde guncellendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//destroy metodu islemir,gerek ayrica route yazasan
    {
        $quiz=Quiz::find($id) ?? abort(404,'Quiz tapilmadi');
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('success','Quiz basarili sekilde silindi');
    }
}
