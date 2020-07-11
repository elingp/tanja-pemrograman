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
        $pertanyaan = Pertanyaan::orderBy('created_at', 'desc')->paginate(10);
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
        $request->validate([
            'penanya_id' => ['required', 'integer'],
            'judul' => ['required', 'max:255'],
            'isi' => ['required', 'max:65535'],
            'tag' => ['nullable', 'max:255', 'regex:/^[a-zA-Z+#\-.0-9]{1,}(\s[a-zA-Z+#\-.0-9]{1,}){0,4}$/'] // max 5 kata dipisahkan spasi
        ]);
        $slug = Str::slug(Str::limit($request->judul, 100, ''));
        Pertanyaan::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'slug' => $slug,
            'penanya_id' => $request->penanya_id,
            'tag' => $request->tag
        ]);
        return redirect('/pertanyaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertanyaan = Pertanyaan::with(['comments','jawaban'])->where('id', $id)->first();
        return view('pertanyaan.detail', ['question' => $pertanyaan]);
    }

    /**
     * Redirect to the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_redirect($id)
    {
        $slug = Pertanyaan::find($id)->slug;
        return \redirect("\pertanyaan\\{$id}\\{$slug}" );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan = Pertanyaan::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
