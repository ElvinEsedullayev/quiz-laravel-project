<x-app-layout>
    <x-slot name="header">
     Quizler
    </x-slot>
    <div class="card">
      <div class="card-body">
             <form method="get" action="">
            <div class="row">
              <div class="col-md-2">
                <input type="text" name="title" value="{{request()->get('title')}}" class="form-control">
              </div>
                 <div class="col-md-2">
                <select name="status" class="form-control" onchange="this.form.submit()">
                  <option value="">Durum Sec</option>
                  <option @if(request()->get('status')=='publish') selected @endif  value="publish">Active</option>
                  <option @if(request()->get('status')=='draft') selected @endif value="draft">Draft</option>
                  <option @if(request()->get('status')=='passive') selected @endif value="passive">Passive</option>
                </select>
              </div>
              @if(request()->get('title') or request()->get('status'))
               <div class="col-md-2">
              <a href="{{route('quizzes.index')}}" class="btn btn-secondary">Temizle</a>
            </div>
            @endif
            </div>
          </form>
        <h5 class="card-title" style="float: right;">
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
 {{$quizzes->withQueryString()->links()}}{{--paginate ucundu quizcontrollerde index metodunda cagrilib--}}
 {{--withQueryString ona gore yazdiq ki,meselen axtaris edende ikinci sehifeye qeder coxdusa melumat ikinci sehifeye gedende axtaris linki deyisilirdi,sadece ikinci sehife gedis linki yazilirdi --}}
       </div>
    </div>
</x-app-layout>