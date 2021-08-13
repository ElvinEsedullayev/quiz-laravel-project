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
    @if($quiz->my_rank){{--my_rank getattribute ile verdiyimis funksiyadi..imtahanda 500 nefer istirak edibse ve men ilk 10luqda olmasam menim sirami gosterir..quiz modelde yazmisiq.. --}}
      <li class="list-group-item d-flex justify-content-between align-items-center">
    Siralama
    <span class="badge bg-success rounded-pill">{{$quiz->my_rank}}</span>
  </li>
  @endif
      @if($quiz->my_result){{--menim neticem var ise bal ve dogru yalnis cvb olan hisseni gosterir --}}
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
  @if($quiz->details){{--istirakci sayi ve ortalama bal dquiz modelinde getdetailatribute ile verdiyimiz sutundan gelir..ayrica sutun yazmamisiq,bu formada yaratdiq..ve o var ise ortalama bal ve istirakci sayini gosterir.. --}}
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Istirakci Sayi
    <span class="badge bg-secondary rounded-pill">{{$quiz->details['join_count']}}</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    Ortalama Bal
    <span class="badge bg-info rounded-pill">{{$quiz->details['average']}}</span>
    {{--details getdetailsattribute funksiyasinda verdiyimiz addi..burda details sutununu yaratmisiq..ve ona baglanmaq ucun bele yazdiq..avarage ve join_count return etdiyimiz parametrlerdi--}}
  </li>
  @endif
     @if($quiz->finished_at)
   <li class="list-group-item d-flex justify-content-between align-items-center">
    Son Katilim Tarixi
    <span title="{{$quiz->finished_at}}" class="badge bg-light text-danger rounded-pill">{{$quiz->finished_at->diffForHumans()}}</span>
  </li>
  @endif
</ul>
          @if(count($quiz->topTen)>0){{--topten 0 dan boyukduse bize siralamani gosterir --}}
            <div class="card mt-3">
                <div class="card-body">
                  <h5 class="card-title">Ilk 10</h5>
                  <ul class="list-group">
                    @foreach($quiz->topTen as $result)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      <strong class="h5">{{$loop->iteration}}.</strong> <img src="{{$result->user->profile_photo_url}}" class="w-8 h-8 rounded-full" alt=""><strong @if(auth()->user()->id == $result->user_id) class="text-danger" @endif>{{$result->user->name}}</strong>
                      {{--$result->user->profile_photo_url  burda olan user result modelinde funksiyanin adidi..ve maincontrollerde quiz_detail funksiyasinda Quiz deyiskenini return etdikde usere aid olan profil phote urlni gore bilerik--}}
                      <span class="badge bg-info rounded-pill">{{$result->point}}</span>
                    </li>
                    @endforeach
                  </ul>
                </div>
            </div>
            @endif
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
