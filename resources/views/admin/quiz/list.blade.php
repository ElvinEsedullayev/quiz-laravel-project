<x-app-layout>
    <x-slot name="header">
     Quizler
    </x-slot>
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
      <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-info"><i class="fa fa-plus"></i> Quiz Olustur</a>
          </h5>
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Quiz</th>
      <th scope="col">Sual Sayi</th>
      <th scope="col">Status</th>
      <th scope="col">Bitme Tarixi</th>
      <th scope="col">Islemler</th>
    </tr>
  </thead>
  <tbody>
    @foreach($quizzes as $quiz)
    <tr>
      <td scope="row">{{$quiz->title}}</td>
      <td>{{$quiz->question_count}}</td>
      <td>
        @switch($quiz->status)
            @case('publish')
                <span class="badge rounded-pill bg-success">Active</span>
                @break
            @case('draft')
                <span class="badge rounded-pill bg-secondary">Draft</span>
                @break
            @case('passive')
                <span class="badge rounded-pill bg-danger">Passive</span>
                @break
                
        @endswitch
          
        </td>
      <td>
        <span title="{{$quiz->finished_at}}">{{$quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-'}}</span>
        {{--sualla yazdigimiz if sorgusudu..yeni eger bir tarix varsa difforhumanla goster yoxsa - bele goster...bu difforhumani quiz modelde yazmisiq --}}
      </td>
      <td>
        <a href="{{route('questions.index',$quiz->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-question"></i></a>
        <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
        <a href="{{route('quizzes.destroy',$quiz->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
      </td>
    </tr>
@endforeach

  </tbody>
 
</table>
 {{$quizzes->links()}}{{--paginate ucundu quizcontrollerde index metodunda cagrilib--}}
       </div>
    </div>
</x-app-layout>