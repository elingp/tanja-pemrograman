@extends('layouts.app')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Pertanyaan</h1>
          </div>
          <div class="col-sm-6">
              <span class="float-right"><a class="btn btn-primary btn-sm" href="/pertanyaan/create" role="button"><i class="fa fa-question-circle" aria-hidden="true"></i> Buat Pertanyaan</a></span>
          </div>
        </div>
      </div>
    </section>



<section class="content">
     <div class="card card-widget">
     <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="{{ asset('img/avatar_m.png')}}" alt="User Image">
                  <span class="username"><a href="#" class="text-muted">{{ $question->user->name }}</a></span>
                  <span class="description text-bold"><h3> <a href="/pertanyaan/{{ $question->id }}/{{ $question->slug }}">{{ $question->judul }}</a></h3></span>
                  <span class="description text-sm">
                <span class="badge bg-primar link-black text-sm"><small><i class="far fa-thumbs-up"></i> Like ({{ $question->likedislikes->sum('value') }})</small></span>
               <span class="badge bg-primar link-black text-sm"><small><i class="far fa-comment"></i> {{ $question->created_at->diffForHumans() }}</small></span>
               <span class="badge bg-primar link-black text-sm"><small><i class="far fa-comments"></i> {{ $question->comments->count() }} answers</small></span>
               <span class="badge bg-primar link-black text-sm"><small><i class="far fa-eye"></i> {{ $question->view }} views</small></span>
      
                </span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                </div>
                <!-- /.card-tools -->
              </div>
 <div class="card-body">
  {!! $question->isi !!}
  <hr>
 @if (!empty($question->tag))
                        @foreach (explode(' ',$question->tag) as $item)
                        <span class="badge badge-primary">{{$item}}</span>
                        @endforeach
                        @endif          

 <div class="btn-group float-right"> 
                        <button type="button" class="btn btn-outline-primary btn-sm"><i class="far fa-thumbs-up mr-1"></i></button>
                        <button type="button" class="btn btn-outline-primary btn-sm"><i class="far fa-thumbs-down mr-1"></i></button>
                       </div> 


@if (!empty($question->comments))
<br>
<hr>


                        @foreach ($question->comments as $komentanya)
                        {{-- <li class="comment pt-3"><small>
                                <p>{!! $komentanya->isi !!}. </p>
                                {{$komentanya->user->name}} | <i class="far fa-clock"></i> {{ $komentanya->created_at->diffForHumans() }}
                            </small>
                        </li> --}}
                        <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left"> {{$komentanya->user->name}}</span>
                      <span class="direct-chat-timestamp float-right">{{ $komentanya->created_at->diffForHumans() }}</span>
                    </div>
                    <img class="direct-chat-img" src="{{ asset('img/avatar_m.png')}}" alt="Message User Image">
                    <div class="direct-chat-text">
                      {!! $komentanya->isi !!}
                    </div>
                  </div>
                        @endforeach

                    @endif
                     
</div>
 <div class="card-footer">
<a href="#"  data-toggle="modal" data-target="#myModal" class="link-black text-sm mr-2 mt-2"><i class="fas fa-share mr-1"></i> Komentar</a>
</div>
     </div>
</section>


<section class="content">
     <div class="card card-widget">
     <div class="card-header"><h5 class="header-title">Jawaban ( <span class="color">{{ $question->jawaban->count() }}</span> )</h5></div>
     <div class="card-body">
  @if ($question->jawaban->count() > 0)
                    
                        @foreach ($question->jawaban as $answer)
                       <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('img/avatar_m.png')}}" alt="user image">
                        <span class="username">
                          <a href="#">{{ $answer->user->name }}</a>
                          @if (Auth::user()->name== $answer->user->name)
                              <button type="button" class="btn btn-danger btn-xs float-right"><i class="far fa-trash-alt"></i> Hapus</button>
                          @endif
                        </span>
                        <span class="description">{{ $answer->created_at->diffForHumans() }}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                         {!! $answer->isi !!}
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>


                      <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Type a comment">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat">komentar</button>
                  </span>
                </div>
                    </div>
                        @endforeach
                   
                @else
                    <p>Belum ada jawaban! Jadilah yang pertama menjawab pertanyaan ini.</p>
                @endif
     </div>
     </div>
</section>

<section class="content">
     <div class="card card-widget">
     <div class="card-header"><h5 class="header-title">Jawaban Anda</h5></div>
     <div class="card-body">

@auth
               
                <form action="/jawaban" method="POST">
                    @csrf
                    <input type="hidden" name="penjawab_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="pertanyaan_id" value="{{ $question->id }}">
                    <div class="form-group">
                        <label for="isi" class="sr-only">Isi</label>
                        <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" id="isi" rows="4" required>{{ old('isi') }}</textarea>
                        @error('isi')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
                </form>
                @endauth
                @guest
                <a href="/login">
                    <div class="alert alert-danger">
                  <h5><i class="icon fas fa-lock"></i> Alert!</h5>
                  Anda harus Login untuk menjawab!
                </div>
                    
                </a>
                @endguest
     </div>
     </div>
</section>

@endsection

 @include('includes.modal')

@push('scripts')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('isi');
    });
</script>
@endpush
