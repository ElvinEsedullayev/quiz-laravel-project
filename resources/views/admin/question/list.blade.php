<x-app-layout>
    <x-slot name="header">
     {{$quiz->title}} - aid suallar
    </x-slot>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title" style="float: right;">
      <a href="{{route('quizzes.index')}}" class="btn btn-sm btn-info"><i class="fa fa-hand-point-left"></i> Quizler</a>
          </h5>
            <h5 class="card-title">
      <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Sual Olustur</a>
          </h5>
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Sual</th>
      <th scope="col">Sekil</th>
      <th scope="col">Cavab1</th>
      <th scope="col">Cavab2</th>
      <th scope="col">Cavab3</th>
      <th scope="col">Cavab4</th>
      <th scope="col">Cavab5</th>
      <th scope="col">Deqiq Cavab</th>
      <th scope="col">Islemler</th>
    </tr>
  </thead>
  <tbody>
    @foreach($quiz->question as $questions)
    <tr>
      <td scope="row">{{$questions->questions}}</td>
      <td>
        @if($questions->image)
        <a href="{{asset($questions->image)}}" target="_blank">
          Gorunum
        </a>
        @endif
      </td>
      <td>{{$questions->answer1}}</td>
      <td>{{$questions->answer2}}</td>
      <td>{{$questions->answer3}}</td>
      <td>{{$questions->answer4}}</td>
      <td>{{$questions->answer5}}</td>
      <td class="text-success">{{substr($questions->answer,-1)}}.cavab</td>
      <td>
    
        <a href="{{route('questions.edit',[$quiz->id,$questions->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
        <a href="{{route('questions.destroy',[$quiz->id,$questions->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
    @endforeach

  </tbody>
 
</table>
 
       </div>
    </div>
</x-app-layout>