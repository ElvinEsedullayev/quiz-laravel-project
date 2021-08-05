<x-app-layout>
    <x-slot name="header">
     {{$question->questions}} quizine aid suali yenile
    </x-slot>
    

    <div class="card">
      
      <div class="card-body">
   
          <form method="POST" action="{{route('questions.update',[$question->quiz_id,$question->id])}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @if($question->image)
            <div class="form-group">
              <label for="">Yuklu Sekil</label>
              <img src="{{asset($question->image)}}" alt="" width="150" height="100">
            </div>
            @endif
            <div class="form-group">
              <label for="">Sekil</label>
              <input type="file" name="image" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Quiz Suali</label>
                <textarea name="questions" class="form-control" rows="4">{{ $question->questions }}</textarea>
            </div>
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                <label for="">Cavab 1</label>
                <textarea name="answer1" class="form-control" rows="2">{{ $question->answer1 }}</textarea>
                </div>
              </div>
                   <div class="col-md-6">
                 <div class="form-group">
                <label for="">Cavab 2</label>
                <textarea name="answer2" class="form-control" rows="2">{{ $question->answer2 }}</textarea>
                </div>
              </div>
            </div>
             <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                <label for="">Cavab 3</label>
                <textarea name="answer3" class="form-control" rows="2">{{ $question->answer3 }}</textarea>
                </div>
              </div>
                   <div class="col-md-6">
                 <div class="form-group">
                <label for="">Cavab 4</label>
                <textarea name="answer4" class="form-control" rows="2">{{ $question->answer4 }}</textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                <label for="">Cavab 5</label>
                <textarea name="answer5" class="form-control" rows="2">{{ $question->answer5 }}</textarea>
                </div>
              </div>
                   <div class="col-md-6">
                 <div class="form-group">`
                <label for="">Dogru Cavab</label>
                <select name="answer" id="" class="form-control">
                  <option @if($question->answer==='answer1') selected @endif value="answer1">Cavab 1</option>
                  <option @if($question->answer==='answer2') selected @endif value="answer2">Cavab 2</option>
                  <option @if($question->answer==='answer3') selected @endif value="answer3">Cavab 3</option>
                  <option @if($question->answer==='answer4') selected @endif value="answer4">Cavab 4</option>
                  <option @if($question->answer==='answer5') selected @endif value="answer5">Cavab 5</option>
                </select>
                </div>
              </div>
            </div>
              <br><div class="form-group">
                <button type="submit" class="btn btn-block btn-success form-control">Yenile</button>
            </div>
          </form>
       </div>
    </div>
 
</x-app-layout>