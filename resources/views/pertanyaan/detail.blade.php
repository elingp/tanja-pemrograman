@extends('template.master')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Pertanyaan</h1>
          </div>
          <div class="col-sm-6">
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
                  <span class="description text-bold"><h5> <a href="/pertanyaan/{{ $question->id }}/{{ $question->slug }}">{{ $question->judul }}</a></h5></span>
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
