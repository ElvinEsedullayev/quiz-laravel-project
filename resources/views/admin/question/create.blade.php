<x-app-layout>
    <x-slot name="header">
     {{$quiz->title}} quizine aid suallar formu
    </x-slot>
    

    <div class="card">
      
      <div class="card-body">
   
          <form method="POST" action="{{route('questions.store',$quiz->id)}}" enctype="multipart/form-data">
            @csrf
      
            <div class="form-group">
              <label for="">Sekil Sec</label>
              <input type="file" name="image" id="" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Quiz Suali</label>
                <textarea name="questions" class="form-control" rows="4">{{ old('questions') }}</textarea>
            </div>
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                <label for="">Cavab 1</label>
                <textarea name="answer1" class="form-control" rows="2">{{ old('answer1') }}</textarea>
                </div>
              </div>
                   <div class="col-md-6">
                 <div class="form-group">
                <label for="">Cavab 2</label>
                <textarea name="answer2" class="form-control" rows="2">{{ old('answer2') }}</textarea>
                </div>
              </div>
            </div>
             <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                <label for="">Cavab 3</label>
                <textarea name="answer3" class="form-control" rows="2">{{ old('answer3') }}</textarea>
                </div>
              </div>
                   <div class="col-md-6">
                 <div class="form-group">
                <label for="">Cavab 4</label>
                <textarea name="answer4" class="form-control" rows="2">{{ old('answer4') }}</textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                <label for="">Cavab 5</label>
                <textarea name="answer5" class="form-control" rows="2">{{ old('answer5') }}</textarea>
                </div>
              </div>
                   <div class="col-md-6">
                 <div class="form-group">
                <label for="">Cavab 2</label>
                <select name="correct_answer" id="" class="form-control">
                  <option @if(old('answer1')==='answer1') selected @endif value="answer1">Cavab 1</option>
                  <option @if(old('answer2')==='answer2') selected @endif value="answer2">Cavab 2</option>
                  <option @if(old('answer3')==='answer3') selected @endif value="answer3">Cavab 3</option>
                  <option @if(old('answer4')==='answer4') selected @endif value="answer4">Cavab 4</option>
                  <option @if(old('answer5')==='answer5') selected @endif value="answer5">Cavab 5</option>
                </select>
                </div>
              </div>
            </div>
             
             
              <br><div class="form-group">
                <button type="submit" class="btn btn-block btn-success form-control">Olustur</button>
            </div>
          </form>
       </div>
    </div>
    
</x-app-layout>