@extends('template.index')

@section('content')

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
                    <span class="question-category"><a href="/p/{{ $question->id }}"><i class="far fa-share"></i> Share</a></span>
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
            </article>
            <div id="commentlist" class="page-content">
                <div class="boxedtitle page-title">
                    <h2>Jawaban ( <span class="color">{{ $question->jawaban->count() }}</span> )</h2>
                </div>
                @if ($question->jawaban->count() > 0)
                    <ol class="commentlist clearfix">
                        @foreach ($question->jawaban as $answer)
                        <li class="comment">
                            <div class="comment-body clearfix">
                                <div class="avatar"><img alt="" src="{{ asset('img/avatar_m.png')}}"></div>
                                <div class="comment-text">
                                    <div class="author clearfix">
                                        <div class="comment-author"><a href="#">{{ $answer->user->name }}</a></div>
                                        <div class="comment-vote">
                                            <ul class="question-vote">
                                                <li><a href="#" class="question-vote-up" title="Like"></a></li>
                                                <li><a href="#" class="question-vote-down" title="Dislike"></a></li>
                                            </ul>
                                        </div>
                                        <span class="question-vote-result">+1</span>
                                        <div class="comment-meta">
                                            <div class="date"><i class="icon-time"></i>{{ $answer->created_at->diffForHumans() }}</div>
                                        </div>
                                        <a class="comment-reply" href="#"><i class="fas fa-reply"></i>Reply</a>
                                    </div>
                                    <div class="text">
                                        {!! $answer->isi !!}
                                    </div>
                                </div>
                            </div>
                            @if (!empty($answer->comments))
                            <ul class="children mb-5">
                                @foreach ($answer->comments as $komenjawab)
                                <li class="comment pt-3"><small>
                                        <p>{!! $komenjawab->isi !!}. </p>
                                        {{$komenjawab->user->name}} | <i class="far fa-clock"></i> {{ $komenjawab->created_at->diffForHumans() }}
                                    </small>
                                </li>
                                @endforeach
                            </ul><!-- End children -->
                            @endif
                        </li>
                        @endforeach
                    </ol><!-- End commentlist -->
                @else
                    <p>Belum ada jawaban! Jadilah yang pertama menjawab pertanyaan ini.</p>
                @endif

            </div>




            <div id="respond" class="comment-respond page-content clearfix">
                @auth
                <div class="boxedtitle page-title">
                    <h2>Jawaban Anda</h2>
                </div>
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
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('isi');
    });
</script>
@endpush
