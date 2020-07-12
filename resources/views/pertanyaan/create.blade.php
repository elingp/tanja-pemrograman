@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kirim Pertanyaan</h1>
            </div>
            <div class="col-sm-6"></div>
        </div>
    </div>
</section>
<section class="content">
    <form action="/pertanyaan" method="POST">
        @csrf
        <div class="card card-widget">
            <div class="card-body">
                <input
                    type="hidden"
                    name="penanya_id"
                    value="{{ Auth::id() }}"
                />
                <div class="form-group">
                    <label for="judul" class="mb-0">Judul</label>
                    <p class="m-0">
                        <small
                            >Buat agar spesifik dan bayangkan seperti kamu
                            menanyakan pertanyaan ke orang lain</small
                        >
                    </p>
                    <input
                        type="text"
                        name="judul"
                        id="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        placeholder="misalnya 'Bagaimana cara membuat model baru di Laravel?'"
                        value="{{ old('judul') }}"
                        required
                    />
                    @error('judul')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="isi" class="mb-0">Isi</label>
                    <p class="m-0">
                        <small
                            >Tuliskan semua informasi yang diperlukan seseorang
                            untuk menjawab pertanyaanmu</small
                        >
                    </p>
                    <textarea
                        class="form-control @error('isi') is-invalid @enderror"
                        name="isi"
                        id="isi"
                        rows="4"
                        required
                        >{{ old("isi") }}</textarea
                    >
                    @error('isi')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="tag" class="mb-0">Tag</label>
                    <p class="m-0">
                        <small
                            >Tambahkan sebanyak maksimal 5 tag untuk
                            mendeskripsikan mengenai apa pertanyaanmu</small
                        >
                    </p>
                    <input
                        type="text"
                        name="tag"
                        id="tag"
                        class="form-control @error('tag') is-invalid @enderror"
                        placeholder="pisahkan dengan spasi, misalnya 'laravel-mvc php sql-server'"
                        value="{{ old('tag') }}"
                        required
                    />
                    @error('tag')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tanyakan</button>
            </div>
        </div>
    </form>
</section>

@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace("isi");
    });
</script>
@endpush
