<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'questions'=>'required|min:3',
            'image'=>'image|nullable|max:1024|mimes:jpg,jpeg,png',
            'answer1'=>'required|min:1',
            'answer2'=>'required|min:1',
            'answer3'=>'required|min:1',
            'answer4'=>'required|min:1',
            'answer5'=>'required|min:1',
            'correct_answer'=>'required|min:1'
        ];
    }
          public function attributes()
    {
        return [
            'questions'=>'Sual',
            'image' => 'Quiz Sekil',
            'answer1'=> 'Cavab 1',
            'answer2'=> 'Cavab 2',
            'answer3'=> 'Cavab 3',
            'answer4'=> 'Cavab 4',
            'answer5'=> 'Cavab 5',
            'correct_answer'=> 'Dogru Cavab'
        ];
    }
}
