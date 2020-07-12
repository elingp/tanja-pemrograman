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
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="{{ asset('img/avatar_m.png')}}" alt="Message User Image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      {!! $komentanya->isi !!}
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                        @endforeach

                    @endif
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

                      {{-- <input class="form-control form-control-sm" type="text" placeholder="Type a comment"> --}}
                      <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Type a comment">
                  <span class="input-group-append">
                    <button type="button" class="btn btn-info btn-flat">Go!</button>
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
                    <div class="alert-message error">
                        <i class="fas fa-lock"></i>
                        <p><span>Login</span><br>
                            Anda harus Login untuk menjawab!</p>
                    </div>
                </a>
                @endguest
     </div>
     </div>
</section>


{{-- 

<div class="content-wrapper ">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <article class="question question-type-normal">
                <h2>
                    {{ $question->judul }}
                </h2>
                <div class="question-report" href="#">{{ $question->created_at->diffForHumans() }}</div>

                <div class="question-inner">
                    <div class="clearfix"></div>
                    <div class="question-desc">{!! $question->isi !!}</div>

                    @if (!empty($question->comments))
                    <h5>Komentar :</h5>
                    <ul class="children mb-5">
                        @foreach ($question->comments as $komentanya)
                        <li class="comment pt-3"><small>
                                <p>{!! $komentanya->isi !!}. </p>
                                {{$komentanya->user->name}} | <i class="far fa-clock"></i> {{ $komentanya->created_at->diffForHumans() }}
                            </small>
                        </li>
                        @endforeach
                    </ul><!-- End children -->
                    @endif

                    <div class="clearfix"></div>

                    <div class="widget_tag_cloud">
                        @if (!empty($question->tag))
                        @foreach (explode(' ',$question->tag) as $item)
                        <a href="#">{{$item}}</a>
                        @endforeach
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <span class="question-category"><a href="/p/{{ $question->id }}"><i class="fas fa-share"></i> Share</a></span>
                    <span class="question-view"><i class="far fa-eye"></i> {{ $question->view }} views</span>
                    <span class="single-question-vote-result">{{ $question->likedislikes->sum('value') }}</span>
                    <ul class="single-question-vote">
                        <li><a href="#" class="single-question-vote-down" title="Dislike"><i class="far fa-thumbs-down"></i></a></li>
                        <li><a href="#" class="single-question-vote-up" title="Like"><i class="far fa-thumbs-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                    <div class="author-image mt-3">
                        <a href="#" original-title="{{ $question->user->name }}" class="tooltip-n"><img alt="" src="{{ asset('img/avatar_m.png')}}"></a>
                    </div>
                    <div class="author-bio mt-3">
                        <h4><a href="/profile" class="">{{ $question->user->name }}</a></h4>
                        {{ $question->user->address }}.
                    </div>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                 <span data-toggle="tooltip" title={{ $question->created_at->diffForHumans() }}" class="badge bg-danger">{{ $question->created_at->diffForHumans() }}</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                 
                </div>
                <!-- /.card-tools -->
              </div>
 <div class="card-body">
  {!! Illuminate\Support\Str::limit(strip_tags($question->isi), 200) !!}

   <span class="float-right badge bg-primar link-black text-sm"><i class="far fa-thumbs-up"></i> Like ({{ $question->likedislikes->sum('value') }})</span>
               <span class="float-right badge bg-primar link-black text-sm"><i class="far fa-comment"></i> {{ $question->created_at->diffForHumans() }}</span>
               <span class="float-right badge bg-primar link-black text-sm"><i class="far fa-comments"></i> {{ $question->comments->count() }} answers</span>
               <span class="float-right badge bg-primar link-black text-sm"> <i class="far fa-eye"></i> {{ $question->view }} views</span>
<br>

            
</div>
<div class="card-footer">
                
              </div>
</section> --}}
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('isi');
    });
</script>
@endpush
