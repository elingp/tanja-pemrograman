@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4 border-bottom border-gray pb-2">
                <h3>Daftar Pertanyaan <span class="float-right">
                    <a class="btn btn-primary btn-md" href="/pertanyaan/add" role="button"><i class="fa fa-question-circle" aria-hidden="true"></i> Kirim Pertanyaan</a></span></h3>
            </div>
            @foreach ($questions as $question)

            <article class="question question-type-normal">
                <h2>
                    <a href="single_question.html">{{ $question['judul'] }}?</a>
                </h2>
                <a class="question-report" href="#">{{ date('d/m/Y', strtotime($question['tgl_create'])) }}</a>
                <!-- <div class="question-type-main"><i class="fa fa-question-circle" aria-hidden="true"></i>{{($question->user)['name']}}</div> -->
                <div class="question-author">
                    <a href="#" original-title="{{ ($question->user)['name'] }}" class="question-author-img tooltip-n"><span></span><img alt="" src="{{ asset('img/avatar_m.png')}}"></a>
                    <br>{{($question->user)['name']}}
                </div>
                <div class="question-inner">
                    <div class="clearfix"></div>
                    <p class="question-desc"> {{ $question['isi'] }}.</p>

                    <span class="question-favorite"><i class="far fa-thumbs-up"></i> 5</span>
                    <span class="question-category"><a href="#"><i class="far fa-folder-open"></i> wordpress</a></span>
                    <span class="question-date"><i class="far fa-calendar-alt"></i> 4 mins ago</span>
                    <span class="question-comment"><a href="#"><i class="far fa-comments"></i> 5 Answer</a></span>
                    <span class="question-view"><i class="far fa-eye"></i> 70 views</span>
                    <div class="clearfix"></div>
                </div>
            </article>
            @endforeach
            {{$questions->links()}}

        </div>
    </div>
</div>
@endsection
