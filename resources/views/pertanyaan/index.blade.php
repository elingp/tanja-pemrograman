@extends('layouts.app')
@section('title', 'Kelompok 13')
@section('content')


<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Pertanyaan</h1>
          </div>
          <div class="col-sm-6">
            <span class="float-right"><a class="btn btn-primary btn-sm" href="/pertanyaan/create" role="button"><i class="fa fa-question-circle" aria-hidden="true"></i> Buat Pertanyaan</a></span>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

 <section class="content">
   <div class="row">
<div class="col-md-9">
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
                 <span data-toggle="tooltip" title={{ $question->created_at->diffForHumans() }}" class="badge bg-info"><i class="fas fa-clock"></i> {{ $question->created_at->diffForHumans() }}</span>
                  {{-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> --}}
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               {!! Illuminate\Support\Str::limit(strip_tags($question->isi), 200) !!}
              </div>
              <!-- /.card-footer -->
              <div class="card-footer">
                 <span class="float-left">
                      @if (!empty($question->tag))
                        @foreach (explode(' ',$question->tag) as $item)
                         <span class="badge badge-success">{{$item}}</span>
                        @endforeach
                        @endif
                </span>
               <span class="float-right badge bg-primar link-black text-sm"><i class="far fa-thumbs-up"></i> Like ({{ $question->likedislikes->sum('value') }})</span>
               <span class="float-right badge bg-primar link-black text-sm"><i class="far fa-comment"></i> {{ $question->created_at->diffForHumans() }}</span>
               <span class="float-right badge bg-primar link-black text-sm"><i class="far fa-comments"></i> {{ $question->jawaban->count() }} answers</span>
               <span class="float-right badge bg-primar link-black text-sm"> <i class="far fa-eye"></i> {{ $question->view }} views</span>
              </div>
              <!-- /.card-footer -->
</div>
    @endforeach
      <center>{{$questions->links()}}</center>
<br>
  @else
                <p>Belum ada pertanyaan!</p>
            @endif
</div>
<div class="col-md-3">
   @include('includes.right')
</div>
   </div>


 </section>
@endsection
