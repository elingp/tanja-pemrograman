@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <article class="question question-type-normal">
                <h2>
                    {{ $question->judul }}
                </h2>
                <div class="question-report" href="#">{{ $question->created_at->diffForHumans() }}</div>

                <div class="question-inner">
                    <div class="clearfix"></div>
                    <div class="question-desc">{!! $question->isi !!}</div>
                    <div class="widget_tag_cloud">
                        @if (!empty($question->tag))
                            @foreach (explode(' ',$question->tag) as $item)
                                <a href="#">{{$item}}</a>
                            @endforeach
                        @endif
                    </div>
                    <div class="clearfix"></div>
                    <span class="question-category"><a href="/p/{{ $question->id }}"><i class="far fa-share"></i> Share</a></span>
                    <span class="question-view"><i class="far fa-eye"></i> 70 views</span>
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
                        <h4><a href="" class="">{{ $question->user->name }}</a></h4>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra auctor neque. Nullam lobortis, sapien vitae lobortis tristique.
                    </div>
                </div>
            </article>

            <div id="commentlist" class="page-content">
                <div class="boxedtitle page-title">
                    <h2>Answers ( <span class="color">5</span> )</h2>
                </div>
                <ol class="commentlist clearfix">
                    <li class="comment">
                        <div class="comment-body comment-body-answered clearfix">
                            <div class="avatar"><img alt="" src="{{ asset('img/avatar_m.png')}}"></div>
                            <div class="comment-text">
                                <div class="author clearfix">
                                    <div class="comment-author"><a href="#">admin</a></div>
                                    <div class="comment-vote">
                                        <ul class="question-vote">
                                            <li><a href="#" class="question-vote-up" title="Like"></a></li>
                                            <li><a href="#" class="question-vote-down" title="Dislike"></a></li>
                                        </ul>
                                    </div>
                                    <span class="question-vote-result">+1</span>
                                    <div class="comment-meta">
                                        <div class="date"><i class="icon-time"></i>January 15 , 2014 at 10:00 pm</div>
                                    </div>
                                    <a class="comment-reply" href="#"><i class="fas fa-reply"></i>Reply</a>
                                </div>
                                <div class="text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequatLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat.</p>
                                </div>
                                <div class="question-answered question-answered-done"><i class="fas fa-certificate"></i> Best Answer</div>
                            </div>
                        </div>
                        <ul class="children mb-5">
                            <li class="comment">
                                <div class="comment-text m-6">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat. </p>
                                    <div class="comment-meta date">
                                        namauser | <i class="icon-time"></i>January 15 , 2014 at 10:00 pm
                                    </div>
                                </div>
                            </li>
                            <li class="comment">
                                <div class="comment-text m-6">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat. </p>
                                    <div class="comment-meta date">
                                        namauser | <i class="icon-time"></i>January 15 , 2014 at 10:00 pm
                                    </div>
                                </div>
                            </li>



                        </ul><!-- End children -->
                    </li>
                    <li class="comment">
                        <div class="comment-body clearfix">
                            <div class="avatar"><img alt="" src="{{ asset('img/avatar_m.png')}}"></div>
                            <div class="comment-text">
                                <div class="author clearfix">
                                    <div class="comment-author"><a href="#">2code</a></div>
                                    <div class="comment-vote">
                                        <ul class="question-vote">
                                            <li><a href="#" class="question-vote-up" title="Like"></a></li>
                                            <li><a href="#" class="question-vote-down" title="Dislike"></a></li>
                                        </ul>
                                    </div>
                                    <span class="question-vote-result">+1</span>
                                    <div class="comment-meta">
                                        <div class="date"><i class="icon-time"></i>January 15 , 2014 at 10:00 pm</div>
                                    </div>
                                    <a class="comment-reply" href="#"><i class="fas fa-reply"></i>Reply</a>
                                </div>
                                <div class="text">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ol><!-- End commentlist -->
            </div>


            <div id="respond" class="comment-respond page-content clearfix">
                @auth
                <div class="boxedtitle page-title">
                    <h2>Jawaban Anda</h2>
                </div>
                <form action="/pertanyaan" method="POST">
                    @csrf
                    <input type="hidden" name="penanya_id" value="{{ Auth::id() }}">
                    <div class="form-group">
                        <textarea class="form-control" name="isi" id="isi" rows="4"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Jawaban</button>
                </form>
                @endauth
                @guest
                <a href="/login">
                    <div class="alert-message error">
                        <i class="fas fa-lock"></i>

                        <p><span>Login</span><br>
                            Anda Harus Login Untuk Menjawab</p>
                    </div>
                </a>
                @endguest
            </div>


        </div>
    </div>
    @endsection
    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('isi');
        });
    </script>
    @endpush
