@extends('template.master')

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
</section>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('isi');
    });
</script>
@endpush
