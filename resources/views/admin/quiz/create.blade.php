<x-app-layout>
    <x-slot name="header">
     Quiz Olustur
    </x-slot>
    

    <div class="card">
      
      <div class="card-body">
   
          <form method="POST" action="{{route('quizzes.store')}}">
            @csrf
            <div class="form-group">
                <label for="">Quiz Basligi</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            </div>
               <div class="form-group">
                <label for="">Quiz Aciqlamasi</label>
                <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            </div><br>
               <div  class="form-group">
                <label for="">Quiz Bitme Tarix Varmi</label>
                <input id="isFinished" type="checkbox" @if(old('finished_at')) checked @endif>
            </div><br>
               <div id="isFinishedInput"  @if(!old('finished_at'))  style="display: none;" @endif class="form-group">
                <label for="">Quiz Bitme Tarix</label>
                <input  type="datetime-local" class="form-control" name="finished_at" value="{{ old('finished_at') }}">{{--bir vaxtin baslama ve bitmesini qeyd etmek olur --}}
            </div><br>
              <div class="form-group">
                <button type="submit" class="btn btn-block btn-success form-control">Olustur</button>
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