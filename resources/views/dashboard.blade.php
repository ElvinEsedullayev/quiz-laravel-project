<x-app-layout>
    <x-slot name="header">
     Anasayfa
    </x-slot>
<div class="row">
    <div class="col-md-8">
        <div class="list-group">
            @foreach($quizzes as $quiz)
  <a href="{{route('quiz.detail',$quiz->slug)}}" class="list-group-item list-group-item-action" aria-current="true">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">{{$quiz->title}}</h5>
      <small>{{$quiz->finished_at ? $quiz->finished_at->diffForHumans() : null}}  bitir.</small>
    </div>
    <p class="mb-1">{{Str::limit($quiz->description,100)}}</p>
    <small>{{$quiz->question_count}} sual</small>
  </a>
@endforeach
<div class="mt-2">
 {{$quizzes->links()}}
</div>
 
</div>
    </div>
    <div class="col-md-4">
        deneme
    </div>
</div>
</x-app-layout>
