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
                  <img class="img-circle" src="{{ $question->user->profile->profile_img }}" alt="User Image">
                  <span class="username"><a href="#" class="text-muted">{{ $question->user->name }}</a></span>
                  <span class="description text-bold"><h3> <a href="/pertanyaan/{{ $question->id }}/{{ $question->slug }}">{{ $question->judul }}</a></h3></span>
                  <span class="description text-sm">
                <span class="badge bg-primar link-black text-sm"><small><i class="far fa-thumbs-up"></i> Like ({{ $question->likedislikes->sum('value') }})</small></span>
               <span class="badge bg-primar link-black text-sm"><small><i class="far fa-comment"></i> {{ $question->created_at->diffForHumans() }}</small></span>
               <span class="badge bg-primar link-black text-sm"><small><i class="far fa-comments"></i> {{ $question->comments->count() }} answers</small></span>
               <span class="badge bg-primar link-black text-sm"><small><i class="far fa-eye"></i> {{ $question->view }} views</small></span>
                </span>
                </div>
                <div class="card-tools">
                </div>
              </div>
 <div class="card-body">
  {!! $question->isi !!}
  <hr>
 @if (!empty($question->tag))
                        @foreach (explode(' ',$question->tag) as $item)
                        <span class="badge badge-primary">{{$item}}</span>
                        @endforeach
                        @endif

                    <div class="btn-group float-right topic" data-post="{{ $question->id }}">
                        <button type="button" class="btn btn-outline-primary btn-sm vote-pertanyaan"
                        {{ $question->likedislikes && $question->likedislikes->contains('user_id', Auth::id()) ? ($question->likedislikes->where('user_id', Auth::id())->first()->value > 0 ? 'upvote-on' : null) : null}}"
                        data-value="1" data-post-id="{{ $question->id }}"
                        ><i class="far fa-thumbs-up mr-1"></i></button>
                        <button type="button" class="btn btn-outline-primary btn-sm vote-pertanyaan"
                        {{ $question->likedislikes && $question->likedislikes->contains('user_id', Auth::id()) ? ($question->likedislikes->where('user_id', Auth::id())->first()->value < 0 ? 'downvote-on' : null) : null}}"
                        data-value="-1" data-post-id="{{ $question->id }}"
                        ><i class="far fa-thumbs-down mr-1"></i></button>
                   </div>


@if (!empty($question->comments))
<br><hr>
@foreach ($question->comments as $komentanya)
    <div class="direct-chat-msg">
        <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-left"> {{$komentanya->user->name}}</span>
            <span class="direct-chat-timestamp float-right">{{ $komentanya->created_at->diffForHumans() }}</span>
        </div>
    <img class="direct-chat-img" src="{{ $komentanya->user->profile->profile_img }}" alt="Message User Image">
    <div class="direct-chat-text">
        {!! $komentanya->isi !!}
    </div>
    </div>
@endforeach
@endif

</div>

@auth
    <form action="/komen-pertanyaan" method="POST">
@csrf
<input type="hidden" name="pengomentar_id" value="{{ Auth::id() }}">
<input type="hidden" name="pertanyaan_id" value="{{ $question->id }}">
 <div class="card-footer">
        <div class="input-group input-group-sm">
                  <input type="text" name="isi_komenpertanyaan" class="form-control @error('isi_komenpertanyaan') is-invalid @enderror" placeholder="Type a comment">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat">komentar</button>
                  </span>
                </div>
                @error('isi_komenpertanyaan')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
</div>
    </form>
@endauth
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
                        <img class="img-circle img-bordered-sm" src="{{ $answer->user->profile->profile_img }}" alt="user image">
                        <span class="username">
                          <a href="#">{{ $answer->user->name }}</a>
                          @auth
                          @if (Auth::user()->name== $answer->user->name)
                              <button type="button" class="btn btn-danger btn-xs float-right"><i class="far fa-trash-alt"></i> Hapus</button>
                          @endif
                          @endauth
                        </span>
                        <span class="description">{{ $answer->created_at->diffForHumans() }}</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                         {!! $answer->isi !!}
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2 text-primary"><i class="far fa-bookmark"></i> Best Answer</a>
                        <a href="#" class="link-black text-sm mr-2 text-mutted"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm text-mutted"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>
 @if (!empty($answer->comments))
 @foreach ($answer->comments as $komenjawab)
<div class="direct-chat-msg ml-5">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left"> {{$komenjawab->user->name}}</span>
                          <span class="direct-chat-timestamp float-right">{{ $komenjawab->created_at->diffForHumans() }}</span>
                        </div>
                        <img class="direct-chat-img" src="{{ $komenjawab->user->profile->profile_img }}" alt="message user image">
                        <div class="direct-chat-text">
                          {!! $komenjawab->isi !!}
                        </div>
                      </div>
 @endforeach
 @endif
 @auth
    <form action="/komen-jawaban" method="POST">
@csrf
<input type="hidden" name="pengomentar_id" value="{{ Auth::id() }}">
<input type="hidden" name="jawaban_id" value="{{ $answer->id }}">
                <div class="input-group input-group-sm">
                  <input type="text" name="isi_komenjawaban" class="form-control @error('isi_komenjawaban') is-invalid @enderror" placeholder="Type a comment">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-info btn-flat">komentar</button>
                  </span>
                </div>
                @error('isi_komenjawaban')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
    </form>
                @endauth
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

@push('scripts')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('isi');
    });
</script>
<script>
    // CSRF token setup for jQuery
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxPrefilter(function(options, originalOptions, jqXHR){
        switch (options['type'].toLowerCase()) {
            case "post":
            case "delete":
            case "put":
                // add leading ampersand if `data` is non-empty
                if (options.data != '') {
                    options.data += '&';
                }
                // add _token entry
                options.data += "_token=" + csrf_token;
                break;
        }
    });
    $.get( "/is_logged", function(data)
    {
        data.status == false ? console.log('not logged in') : console.log('logged in');
        $('.vote-pertanyaan').on('click', function (e) {
            e.preventDefault();
            var $button = $(this);
            var pertanyaanId = $button.data('post-id');
            var value = $button.data('value');
            if(data.status == false) {
                sweetAlert("Oops...", "You are not logged in!", "error");
                window.setInterval(function()
                {
                    $('button.upvote').removeClass('upvote-on');
                    $('button.downvote').removeClass('downvote-on');
                }, 500);
            } else {
                $.post('/vote-pertanyaan', {pertanyaan_id:pertanyaanId, value:value}, function(data) {
                    // success here
                }).fail(function() {
                    sweetAlert("Oops...", "Something went wrong...", "error");
                }, 'json');
            }
        });
        $('.vote-jawaban').on('click', function (e) {
            e.preventDefault();
            var $button = $(this);
            var jawabanId = $button.data('post-id');
            var value = $button.data('value');
            if(data.status == false) {
                sweetAlert("Oops...", "You are not logged in!", "error");
                window.setInterval(function()
                {
                    $('button.upvote').removeClass('upvote-on');
                    $('button.downvote').removeClass('downvote-on');
                }, 500);
            } else {
                $.post('/vote-jawaban', {jawaban_id:jawabanId, value:value}, function(data) {
                    // success here
                }).fail(function() {
                    sweetAlert("Oops...", "Something went wrong...", "error");
                }, 'json');
            }
        });
    });
</script>
@endpush
