<x-app-layout>
    <x-slot name="header">
     {{$quiz->title}}
    </x-slot>
  <div class="card">
  <div class="card-body">
    <p class="card-text">
      <div class="row">
        <div class="col-md-4">
            <ul class="list-group">
              @if($quiz->finished_at)
   <li class="list-group-item d-flex justify-content-between align-items-center">
    Son Katilim Tarixi
    <span title="{{$quiz->finished_at}}" class="badge bg-secondary rounded-pill">{{$quiz->finished_at->diffForHumans()}}</span>
  </li>
  @endif
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Sual Sayi
    <span class="badge bg-secondary rounded-pill">{{$quiz->question_count}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Istirakci Sayi
    <span class="badge bg-secondary rounded-pill">2</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Ortalama Bal
    <span class="badge bg-secondary rounded-pill">1</span>
  </li>
</ul>
        </div>
        <div class="col-md-8">
              {{$quiz->description}}
         </p>
        <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-sm" style="width: 100%;">Quize qatil</a>
        </div>
      </div>
  </div>
</div>
</x-app-layout>
