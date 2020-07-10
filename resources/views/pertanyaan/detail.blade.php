@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <article class="question question-type-normal">
                <h2>
                    {{$question->judul }}
                </h2>
                <a class="question-report" href="#">{{ $question->user->name }} | {{ date('d/m/Y', strtotime($question->created_at)) }}</a>

                <div class="question-inner">
                    <div class="clearfix"></div>
                    <p class="question-desc"> {{ strip_tags($question->isi) }}..</p>

                    <span class="question-category"><a href="#"><i class="far fa-folder-open"></i> wordpress</a></span>
                    <span class="question-favorite"><i class="far fa-thumbs-up"></i> 5</span>
                    <span class="question-date"><i class="far fa-comment"></i> 4 mins ago</span>
                    <span class="question-comment"><a href="#"><i class="far fa-comments"></i> 5 Answer</a></span>
                    <span class="question-view"><i class="far fa-eye"></i> 70 views</span>
                    <span class="single-question-vote-result">+22</span>
                    <ul class="single-question-vote">
                        <li><a href="#" class="single-question-vote-down" title="Dislike"><i class="far fa-thumbs-down"></i></a></li>
                        <li><a href="#" class="single-question-vote-up" title="Like"><i class="far fa-thumbs-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>


            </article>
            <div class="share-tags page-content">
                <div class="question-tags widget_tag_cloud"><i class="icon-tags"></i>
                    <a href="#">wordpress</a>, <a href="#">question</a>, <a href="#">developer</a>
                </div>
                <div class="share-inside"><i class="fas fa-tags"></i> Tags</div>
                <div class="clearfix"></div>
            </div>





            <div class="about-author clearfix">
                <div class="author-image">
                    <a href="#" original-title="{{ $question->user->name }}" class="tooltip-n"><img alt="" src="{{ asset('img/avatar_m.png')}}"></a>
                </div>
                <div class="author-bio">
                    <h4>About : <a href="" class="">{{ $question->user->name }}</a></h4>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed viverra auctor neque. Nullam lobortis, sapien vitae lobortis tristique.
                </div>
            </div>

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
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="//cdn.ckeditor.com/4.14.0/basic/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('isi');
        });
    </script>
    @endpush
