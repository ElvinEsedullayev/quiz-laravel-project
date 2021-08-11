<x-app-layout>
    <x-slot name="header">
     {{$quiz->title}}
    </x-slot>
  <div class="card">
  <div class="card-body">
         
            <form action="{{route('quiz.result',$quiz->slug)}}" method="POST">
              @csrf
            @foreach($quiz->question as $ques)
              <strong>#{{$loop->iteration}}.{{-- reqem yazir her sualin qarsinda--}} {{$ques->questions}}</strong>
              @if($ques->image)
              <img src="{{asset($ques->image)}}" alt="" style="width: 50%;">
              @endif
                  <div class="form-check mt-2">
                <input class="form-check-input" type="radio" name="{{$ques->id}}" id="quiz{{$ques->id}}1" value="answer1" required>
                <label class="form-check-label" for="quiz{{$ques->id}}1">
                  {{$ques->answer1}}
                </label>
                </div>
                    <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$ques->id}}" id="quiz{{$ques->id}}2" value="answer2" required>
                <label class="form-check-label" for="quiz{{$ques->id}}2">
                  {{$ques->answer2}}
                </label>
                </div>
                    <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$ques->id}}" id="quiz{{$ques->id}}3" value="answer3" required>
                <label class="form-check-label" for="quiz{{$ques->id}}3">
                  {{$ques->answer3}}
                </label>
                </div>
                    <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$ques->id}}" id="quiz{{$ques->id}}4" value="answer4" required>
                <label class="form-check-label" for="quiz{{$ques->id}}4">
                  {{$ques->answer4}}
                </label>
                </div>
                    <div class="form-check">
                <input class="form-check-input" type="radio" name="{{$ques->id}}" id="quiz{{$ques->id}}5" value="answer5" required>
                <label class="form-check-label" for="quiz{{$ques->id}}5">
                  {{$ques->answer5}}
                </label>
                </div>

                @if(!$loop->last)
              <hr>
              @endif
            @endforeach
           <br> <button style="width: 100%;" type="submit" class="btn btn-success">Gonder</button>
            </form>

      
      </div>
  </div>

</x-app-layout>
