@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-4 border-bottom border-gray pb-2">
                <h3>Kirim Pertanyaan</h3>
            </div>

            <article class="question question-type-normal">
                <form action="/pertanyaan" method="POST">
                    @csrf
                    <input type="hidden" name="penanya_id" value="{{ Auth::id() }}">
                    <div class="form-group">
                        <label for="judul" class="mb-0">Judul</label>
                        <p class="m-0"><small>Buat agar spesifik dan bayangkan seperti kamu menanyakan pertanyaan ke orang lain</small></p>
                        <input type="text" name="judul" id="judul" class="form-control" placeholder="misalnya 'Bagaimana cara membuat model baru di Laravel?'">
                    </div>
                    <div class="form-group">
                        <label for="isi" class="mb-0">Isi</label>
                        <p class="m-0"><small>Tuliskan semua informasi yang diperlukan seseorang untuk menjawab pertanyaanmu</small></p>
                        <textarea class="form-control" name="isi" id="isi" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="tag" class="mb-0">Tag</label>
                        <p class="m-0"><small>Tambahkan sebanyak maksimal 5 tag untuk mendeskripsikan mengenai apa pertanyaanmu</small></p>
                        <input type="text" name="tag" id="tag" class="form-control" placeholder="pisahkan dengan spasi, misalnya 'laravel-mvc php sql-server'">
                    </div>
                    <button type="submit" class="btn btn-primary">Tanyakan</button>
                </form>
            </article>


        </div>
    </div>
</div>
@endsection


@push('scripts')

@endpush
