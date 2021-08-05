<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/panel', function () {//dasboardi panel ile deyisirik..ve providersde dasboardi deyisirik
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth','isAdmin'],'prefix' => 'admin'], function(){
    Route::get('quizzes/{id}',[QuizController::class,'destroy'])->whereNumber('id')->name('quizzes.destroy');//bunu resourceden qabaga atiriq ki islesin..ve number metodunda yaziriq ki,create sehifesine yonlensin
    Route::get('quiz/{quiz_id}/questions/{id}',[QuestionController::class,'destroy'])->whereNumber('id')->name('questions.destroy');
    Route::resource('quizzes', QuizController::class);
    Route::resource('quiz/{quiz_id}/questions',QuestionController::class);
});
