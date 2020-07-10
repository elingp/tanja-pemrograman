@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4 border-bottom border-gray pb-2">
                <h3>Kirim Pertanyaan</h3>
            </div>

            <article class="question question-type-normal">
                   <form action="{{ url('artikel')}}" method="POST">
            @csrf
            <input type="hidden" name="userid" value="1">
                <div class="form-group">
                    <label>CONTENT</label>
                    <textarea class="form-control" name="pertanyaan" id="pertanyaan" placeholder="Masukkan Content" rows="4"></textarea>
                </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
        </form>
            </article>



        </div>
    </div>
</div>
@endsection


@push('scripts')
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
$(document).ready(function() {
    CKEDITOR.replace('pertanyaan');
});

</script>
@endpush
