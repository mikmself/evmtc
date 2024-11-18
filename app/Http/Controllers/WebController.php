<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function candidatePage()
    {
        $candidates = Candidate::all();
        return view('candidate', compact('candidates'));
    }
}
