@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="mb-4 border-bottom border-gray pb-2">
                <h3>Daftar Pertanyaan <span class="float-right">
                        <a class="btn btn-primary btn-md" href="/pertanyaan/create" role="button"><i class="fa fa-question-circle" aria-hidden="true"></i> Buat Pertanyaan</a></span></h3>
            </div>
            @foreach ($questions as $question)
            <article class="question question-type-normal">
                <h2>
                    <a href="/pertanyaan/{{ $question->id }}/{{ $question->slug }}">{{ $question->judul }}</a>
                </h2>
                <a class="question-report" href="#">{{ $question->created_at->diffForHumans() }}</a>

                <div class="question-author">
                    <a href="#" original-title="{{ $question->user->name }}" class="question-author-img tooltip-n"><span></span><img alt="" src="{{ asset('img/avatar_m.png')}}"></a>
                </div>

                <a href="" class="question-author-name">{{ $question->user->name }}</a>
                <div class="question-inner">
                    <div class="clearfix"></div>
                    <div class="question-desc"> {!! Illuminate\Support\Str::limit(strip_tags($question->isi), 200) !!}</div>
                    <div class="widget_tag_cloud">
                        @if (!empty($question->tag))
                        @foreach (explode(' ',$question->tag) as $item)
                        <a href="#">{{$item}}</a>
                        @endforeach
                        @endif
                    </div>
                    <span class="question-favorite"><i class="far fa-thumbs-up"></i>{{ $question->likedislikes->sum('value') }}</span>
                    <span class="question-date"><i class="far fa-comment"></i>{{ $question->created_at->diffForHumans() }}</span>
                    <span class="question-comment"><a href="#"><i class="far fa-comments"></i> {{ $question->comments->count() }} answers</a></span>
                    <span class="question-view"><i class="far fa-eye"></i> {{ $question->view }} views</span>
                    <div class="clearfix"></div>

                </div>

            </article>

            @endforeach
            {{$questions->links()}}

        </div>
    </div>
</div>
@endsection
