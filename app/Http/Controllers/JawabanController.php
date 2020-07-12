<?php

namespace App\Http\Controllers;

use App\Models\Jawaban;
use Illuminate\Http\Request;

class JawabanController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
            'pertanyaan_id' => ['required', 'integer'],
            'penjawab_id' => ['required', 'integer'],
            'isi' => ['required', 'min:30', 'max:65535'],
        ]);
        Jawaban::create([
            'isi' => $request->isi,
            'penjawab_id' => $request->penjawab_id,
            'pertanyaan_id' => $request->pertanyaan_id,
        ]);
        toast('Jawaban berhasil dikirim!', 'success');
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $jawaban = Jawaban::find($id);
        if ($jawaban->penjawab->id != auth()->id())
        {
            toast('Hanya pembuat pertanyaan yang bisa mengubah!', 'warning');
            return back();
        }
        return view('pertanyaan.detail2', ['jawaban' => $jawaban]);
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
        // regex tag dengan pola max 5 kata dipisahkan oleh spasi
        $jawaban = Jawaban::find($id);
        $slug = $jawaban->pertanyaan->slug;
        if ($request->action == 'delete')
        {
            $this->destroy($id);
            return redirect("/pertanyaan/{$id}/{$slug}");
        }
        $request->validate([
            'isi' => ['required', 'min:30', 'max:65535'],
        ]);
        $jawaban->isi = $request->isi;
        $jawaban->save();
        toast('Jawaban berhasil disunting!', 'success');
        return redirect("/pertanyaan/{$id}/{$slug}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Jawaban::destroy($id);
        toast('Pertanyaan berhasil dihapus!', 'success');
    }
}
