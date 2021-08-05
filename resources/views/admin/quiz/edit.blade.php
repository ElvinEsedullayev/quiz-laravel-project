<x-app-layout>
    <x-slot name="header">
     Quiz Yenile
    </x-slot>
    

    <div class="card">
      
      <div class="card-body">
   
          <form method="POST" action="{{route('quizzes.update',$quiz->id)}}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="">Quiz Basligi</label>
                <input type="text" class="form-control" name="title" value="{{ $quiz->title }}">
            </div><br>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                  <option @if($quiz->question_count<4) disabled @endif @if($quiz->status==='publish') selected @endif value="publish">Active</option>
                  <option @if($quiz->status==='draft') selected @endif value="draft">Draft</option>
                  <option @if($quiz->status==='passive') selected @endif value="passive">Passive</option>
                </select>
            </div><br>
               <div class="form-group">
                <label for="">Quiz Aciqlamasi</label>
                <textarea name="description" class="form-control" rows="4">{{ $quiz->description }}</textarea>
            </div><br>
               <div  class="form-group">
                <label for="">Quiz Bitme Tarix Varmi</label>
                <input id="isFinished" type="checkbox" @if($quiz->finished_at) checked @endif>
            </div><br>
               <div id="isFinishedInput"  @if(!$quiz->finished_at)  style="display: none;" @endif class="form-group">
                <label for="">Quiz Bitme Tarix</label>
                <input  type="datetime-local" class="form-control" name="finished_at" @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i',strtotime($quiz->finished_at)) }}" @endif>{{--bir vaxtin baslama ve bitmesini qeyd etmek olur ,qeyd olunmus zamani cekmek ucundu ardi--}}
            </div><br>
              <div class="form-group">
                <button type="submit" class="btn btn-block btn-success form-control">Yenile</button>
            </div>
          </form>
       </div>
    </div>
     <x-slot name="js">
     <script>
      //  $('#isFinished').click(function(){
      //    alert(' f')
      //       if($('#isFinished').is(':checked')){
      //             $('#isFinishedInput').show();
      //       }else{
      //               $('#isFinishedInput').hide();
      //       }
      //  })
      let checkbox = document.querySelector('#isFinished');
          dateInput = document.querySelector('#isFinishedInput')
      checkbox.addEventListener('click', (e)=>{ 
        if(dateInput.style.display === 'none'){
          dateInput.style.display = 'block'
        }else{
          dateInput.style.display = 'none'
        }
      })
     </script>
    </x-slot>
</x-app-layout>