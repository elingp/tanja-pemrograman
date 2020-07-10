@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <article class="question question-type-normal">


                <div class="question-inner">
                    <div class="clearfix"></div>
                    <p class="question-desc"> asdasd.</p>

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
                <div class="question-tags"><i class="icon-tags"></i>
                    <a href="#">wordpress</a>, <a href="#">question</a>, <a href="#">developer</a>
                </div>
                <div class="share-inside"><i class="icon-share-alt"></i>Share</>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="about-author clearfix">
                <div class="author-image">
                    <a href="#" original-title="admin" class="tooltip-n"><img alt="" src="https://2code.info/demo/html/ask-me/images/demo/admin.jpeg"></a>
                </div>
                <div class="author-bio">
                    <h4>About the Author</h4>
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
                            <div class="avatar"><img alt="" src="https://2code.info/demo/html/ask-me/images/demo/admin.jpeg"></div>
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
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat.</p>
                                </div>
                                <div class="question-answered question-answered-done"><i class="icon-ok"></i>Best Answer</div>
                            </div>
                        </div>
                        <ul class="children">
                            <li class="comment">
                                <div class="comment-body clearfix">
                                    <div class="avatar"><img alt="" src="https://2code.info/demo/html/ask-me/images/demo/avatar.png"></div>
                                    <div class="comment-text">
                                        <div class="author clearfix">
                                            <div class="comment-author"><a href="#">vbegy</a></div>
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
                                <ul class="children">
                                    <li class="comment">
                                        <div class="comment-body clearfix">
                                            <div class="avatar"><img alt="" src="https://2code.info/demo/html/ask-me/images/demo/admin.jpeg"></div>
                                            <div class="comment-text">
                                                <div class="author clearfix">
                                                    <div class="comment-author"><a href="#">admin</a></div>
                                                    <div class="comment-vote">
                                                        <ul class="question-vote">
                                                            <li><a href="#" class="question-vote-up" title="Like"></a></li>
                                                            <li><a href="#" class="question-vote-down" title="Dislike"></a></li>
                                                        </ul>
                                                    </div>
                                                    <span class="question-vote-result">+9</span>
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
                                </ul><!-- End children -->
                            </li>
                            <li class="comment">
                                <div class="comment-body clearfix">
                                    <div class="avatar"><img alt="" src="https://2code.info/demo/html/ask-me/images/demo/avatar.png"></div>
                                    <div class="comment-text">
                                        <div class="author clearfix">
                                            <div class="comment-author"><a href="#">ahmed</a></div>
                                            <div class="comment-vote">
                                                <ul class="question-vote">
                                                    <li><a href="#" class="question-vote-up" title="Like"></a></li>
                                                    <li><a href="#" class="question-vote-down" title="Dislike"></a></li>
                                                </ul>
                                            </div>
                                            <span class="question-vote-result">-3</span>
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
                        </ul><!-- End children -->
                    </li>
                    <li class="comment">
                        <div class="comment-body clearfix">
                            <div class="avatar"><img alt="" src="https://2code.info/demo/html/ask-me/images/demo/avatar.png"></div>
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
                <div class="boxedtitle page-title">
                    <h2>Leave a reply</h2>
                </div>
                <form action="" method="post" id="commentform" class="comment-form">
                    <div id="respond-inputs" class="clearfix">
                        <p>
                            <label class="required" for="comment_name">Name<span>*</span></label>
                            <input name="author" type="text" value="" id="comment_name" aria-required="true">
                        </p>
                        <p>
                            <label class="required" for="comment_email">E-Mail<span>*</span></label>
                            <input name="email" type="text" value="" id="comment_email" aria-required="true">
                        </p>
                        <p class="last">
                            <label class="required" for="comment_url">Website<span>*</span></label>
                            <input name="url" type="text" value="" id="comment_url">
                        </p>
                    </div>
                    <div id="respond-textarea">
                        <p>
                            <label class="required" for="comment">Comment<span>*</span></label>
                            <textarea id="comment" name="comment" aria-required="true" cols="58" rows="8"></textarea>
                        </p>
                    </div>
                    <p class="form-submit">
                        <input name="submit" type="submit" id="submit" value="Post your answer" class="button small color">
                    </p>
                </form>
            </div>


        </div>
    </div>
    @endsection
