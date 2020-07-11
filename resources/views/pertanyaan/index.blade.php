@extends('template.master')

@section('content')


        <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Pertanyaan</h1>
          </div>
          <div class="col-sm-6">
            <span class="float-right">
            <a class="btn btn-primary btn-md" href="/pertanyaan/create" role="button"><i class="fa fa-question-circle" aria-hidden="true"></i> Buat Pertanyaan</a></span>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 <section class="content">
       @if (count($questions) > 0)
  @foreach ($questions as $question)
<div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="{{ asset('img/avatar_m.png')}}" alt="User Image">
                  <span class="username"><a href="#" class="text-muted">{{ $question->user->name }}</a></span>
                  <span class="description text-bold"><h5> <a href="/pertanyaan/{{ $question->id }}/{{ $question->slug }}">{{ $question->judul }}</a></h5></span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                 <span data-toggle="tooltip" title={{ $question->created_at->diffForHumans() }}" class="badge bg-danger">{{ $question->created_at->diffForHumans() }}</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                 
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
               {!! Illuminate\Support\Str::limit(strip_tags($question->isi), 200) !!}
<hr>
               

             
                <span class="float-left">
                      @if (!empty($question->tag))
                        @foreach (explode(' ',$question->tag) as $item)
                         <span class="badge badge-primary">{{$item}}</span>
                        @endforeach
                        @endif
                </span>
               <span class="float-right badge bg-primar link-black text-sm"><i class="far fa-thumbs-up"></i> Like ({{ $question->likedislikes->sum('value') }})</span>
               <span class="float-right badge bg-primar link-black text-sm"><i class="far fa-comment"></i> {{ $question->created_at->diffForHumans() }}</span>
               <span class="float-right badge bg-primar link-black text-sm"><i class="far fa-comments"></i> {{ $question->comments->count() }} answers</span>
               <span class="float-right badge bg-primar link-black text-sm"> <i class="far fa-eye"></i> {{ $question->view }} views</span>



                 
              </div>
           
              <!-- /.card-footer -->
              {{-- <div class="card-footer">
                <form action="#" method="post" _lpchecked="1">
                  <img class="img-fluid img-circle img-sm" src="../dist/img/user4-128x128.jpg" alt="Alt Text">
                  <!-- .img-push is used to add margin to elements next to floating images -->
                  <div class="img-push">
                    <input type="text" class="form-control form-control-sm" placeholder="Press enter to post comment">
                  </div>
                </form>
              </div> --}}
              <!-- /.card-footer -->
</div>
    @endforeach
      <center>{{$questions->links()}}</center>
<br>
  @else
                <p>Belum ada pertanyaan!</p>
            @endif
        </div>
 </section>
@endsection
