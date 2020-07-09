@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4 border-bottom border-gray pb-2">
                <h3>Kirim Pertanyaan</h3>
            </div>

            <article class="question question-type-normal">
                <div class="form-group">
                    <label>CONTENT</label>
                    <textarea class="form-control" name="pertanyaan" id="pertanyaan" placeholder="Masukkan Content" rows="4"></textarea>
                </div>
            </article>


        </div>
    </div>
</div>
@endsection


@push('scripts')

@endpush
