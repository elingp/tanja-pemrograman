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
                <a class="question-report" href="#">{{ $question->user->name }} | {{ date('d/m/Y', strtotime($question->created_at)) }}</a>

                <div class="question-author">
                    <a href="#" original-title="{{ $question->user->name }}" class="question-author-img tooltip-n"><span></span><img alt="" src="{{ asset('img/avatar_m.png')}}"></a>
                </div>

                <a href="" class="question-author-name">{{ $question->user->name }}</a>
                <div class="question-inner">
                    <div class="clearfix"></div>
                    <p class="question-desc"> {{ strip_tags($question->isi) }}.</p>

                    <span class="question-category"><a href="#"><i class="far fa-folder-open"></i> {{ $question->slug }}</a></span>
                    <span class="question-favorite"><i class="far fa-thumbs-up"></i> 5</span>
                    <span class="question-date"><i class="far fa-comment"></i> 4 mins ago</span>
                    <span class="question-comment"><a href="#"><i class="far fa-comments"></i> {{ $question->comments_count }} Jawaban</a></span>
                    <span class="question-view"><i class="far fa-eye"></i> 70 views</span>
                    <div class="clearfix"></div>
                    @if ($question->tag != "")
                    <div class="garisbawah p-2 mb-3"></div>
                    <div class="widget_tag_cloud">
                        @foreach (explode(' ',$question->tag) as $item)
                        <a href="#">{{$item}}</a>
                        @endforeach
                    </div>
                    @endif
                </div>

            </article>

            @endforeach
            {{$questions->links()}}

        </div>
    </div>
</div>
@endsection
