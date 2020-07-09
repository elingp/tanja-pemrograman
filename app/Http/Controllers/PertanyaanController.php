<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PertanyaanModel;
// use App\Model\Jawaban;

class PertanyaanController extends Controller
{
    public function index()
    {
    $questions = PertanyaanModel::orderBy('tgl_create', 'desc')->paginate(6);
    $newest_questions = PertanyaanModel::orderBy('tgl_create', 'desc')->paginate(20);
    $question_count = PertanyaanModel::count();
        return view('pertanyaan.index', [
            'questions' => $questions, 'newest_questions' => $newest_questions,
        ]);
    }
}
