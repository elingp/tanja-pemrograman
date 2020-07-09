<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pertanyaan;
// use App\Model\Jawaban;

class PertanyaanController extends Controller
{
    public function index()
    {
    $questions = Pertanyaan::orderBy('created_at', 'desc')->paginate(6);
    $newest_questions = Pertanyaan::orderBy('tgl_create', 'desc')->paginate(20);
    $question_count = Pertanyaan::count();
    return view('pertanyaan.index', [
        'questions' => $questions, 'newest_questions' => $newest_questions,
    ]);
    }
    public function add(){
        if (Auth::user()) {
            return view('pertanyaan.add');
        } else {
            return redirect("/login");
        }
    }
}
