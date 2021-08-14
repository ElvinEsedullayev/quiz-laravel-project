<x-app-layout>
    <x-slot name="header">
     {{$quiz->title}} quize aid neticeler
    </x-slot>
  <div class="card">
  <div class="card-body">
            <h3>Bal : <strong>{{$quiz->my_result->point}}</strong></h3>
            <div class="alert alert-info">
              <i class="fas fa-check-circle text-success"></i> Dogru Cavab<br>
              <i class="fa fa-times text-danger"></i>      Sehv Cavab<br>
              <i class="fas fa-times-circle text-warning"></i> Secdiyin Cavab
            </div>
            @foreach($quiz->question as $ques)
            @if($ques->correct_answer==$ques->my_answer->answer)
           <i class="fas fa-check-circle text-success"></i>
            @else
            <i class="fa fa-times text-danger"></i>
            @endif
              <strong>#{{$loop->iteration}}.{{-- reqem yazir her sualin qarsinda--}} {{$ques->questions}}</strong><br>
              <span>Bu suala istirakcilardan <strong>{{$ques->true_percent}}%</strong> dogru cavab verdi.</span>
              @if($ques->image)
              <img src="{{asset($ques->image)}}" alt="" style="width: 50%;">
              @endif
                  <div class="form-check mt-2">
             @if($ques->correct_answer=='answer1')
             <i class="fas fa-check-circle text-success"></i>
                    @elseif($ques->my_answer->answer=='answer1')
             <i class="fas fa-times-circle text-warning"></i>
              @endif
                <label class="form-check-label" for="quiz{{$ques->id}}1">
                  {{$ques->answer1}}
                </label>
           
                </div>
                    <div class="form-check">
               @if($ques->correct_answer=='answer2')
             <i class="fas fa-check-circle text-success"></i>
                      @elseif($ques->my_answer->answer=='answer2')
             <i class="fas fa-times-circle text-warning"></i>
              @endif
                <label class="form-check-label" for="quiz{{$ques->id}}2">
                  {{$ques->answer2}}
                </label>
 
                </div>
                    <div class="form-check">
              @if($ques->correct_answer=='answer3')
             <i class="fas fa-check-circle text-success"></i>
                      @elseif($ques->my_answer->answer=='answer3')
             <i class="fas fa-times-circle text-warning"></i>
              @endif
                <label class="form-check-label" for="quiz{{$ques->id}}3">
                  {{$ques->answer3}}
                </label>
         
                </div>
                    <div class="form-check">
             @if($ques->correct_answer=='answer4')
             <i class="fas fa-check-circle text-success"></i>
                      @elseif($ques->my_answer->answer=='answer4')
             <i class="fas fa-times-circle text-warning"></i>
              @endif
                <label class="form-check-label" for="quiz{{$ques->id}}4">
                  {{$ques->answer4}}
                </label>
               
                </div>
                    <div class="form-check">
          @if($ques->correct_answer=='answer5')
             <i class="fas fa-check-circle text-success"></i>
             @elseif($ques->my_answer->answer=='answer5')
             <i class="fas fa-times-circle text-warning"></i>
              @endif
                <label class="form-check-label" for="quiz{{$ques->id}}5">
                  {{$ques->answer5}}
                </label>
               
                </div>

                @if(!$loop->last)
              <hr>
              @endif
            @endforeach
      </div>
  </div>

</x-app-layout>
