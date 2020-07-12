<?php

namespace App\Http\Controllers;

use App\Models\Pertanyaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PertanyaanController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaan = Pertanyaan::latest()->paginate(15);

        return view('pertanyaan.index', ['questions' => $pertanyaan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pertanyaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // regex tag dengan pola max 5 kata dipisahkan oleh spasi
        $request->validate([
            'penanya_id' => ['required', 'integer'],
            'judul' => ['required', 'max:255'],
            'isi' => ['required', 'min:30', 'max:65535'],
            'tag' => ['nullable', 'max:255', 'regex:/^[a-zA-Z+#\-.0-9]{1,}(\s[a-zA-Z+#\-.0-9]{1,}){0,4}$/'],
        ]);
        Pertanyaan::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'slug' => Str::slug(Str::limit($request->judul, 100, '')),
            'penanya_id' => $request->penanya_id,
            'tag' => $request->tag,
        ]);
        toast('Pertanyaan berhasil dikirim!', 'success');

        return redirect('/pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $pertanyaan = Pertanyaan::with(['comments', 'jawaban'])->where('id', $id)->first();
        $pertanyaan->increment('view');

        return view('pertanyaan.detail', ['question' => $pertanyaan]);
    }

    /**
     * Redirect to the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showRedirect(int $id)
    {
        $slug = Pertanyaan::find($id)->slug;

        return redirect("\pertanyaan\\{$id}\\{$slug}");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $pertanyaan = Pertanyaan::find($id);

        return view('pertanyaan.edit', ['pertanyaan' => $pertanyaan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
