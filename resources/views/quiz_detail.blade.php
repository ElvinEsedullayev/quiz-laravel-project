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
      @if($quiz->details)
    <li class="list-group-item d-flex justify-content-between align-items-center">
    Bal
    <span class="badge bg-primary rounded-pill">{{$quiz->my_result->point}}</span>
  </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
    Dogru / Yanlis
    <div class="float-right">
      <span class="badge bg-success rounded-pill">{{$quiz->my_result->correct}} Dogru</span>
      <span class="badge bg-danger rounded-pill">{{$quiz->my_result->wrong}} Yanlis</span>
    </div>
  </li>
@endif
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Sual Sayi
    <span class="badge bg-warning rounded-pill">{{$quiz->question_count}}</span>
  </li>
  @if($quiz->details)
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Istirakci Sayi
    <span class="badge bg-secondary rounded-pill">{{$quiz->details['join_count']}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Ortalama Bal
    <span class="badge bg-info rounded-pill">{{$quiz->details['average']}}</span>
  </li>
  @endif
     @if($quiz->finished_at)
   <li class="list-group-item d-flex justify-content-between align-items-center">
    Son Katilim Tarixi
    <span title="{{$quiz->finished_at}}" class="badge bg-light text-danger rounded-pill">{{$quiz->finished_at->diffForHumans()}}</span>
  </li>
  @endif
</ul>
        </div>
        <div class="col-md-8">
              {{$quiz->description}}
         </p>
         @if($quiz->details)
         <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-info btn-sm" style="width: 100%;">Quiz Neticeye Bax</a>
         @else
        <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary btn-sm" style="width: 100%;">Quize qatil</a>
        @endif
        </div>
      </div>
  </div>
</div>
</x-app-layout>
