<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    // Tambahkan ini di Controller Anda
    public function vote(Request $request, $candidateId)
    {
        // Pastikan user sudah login
        if (auth()->check()) {
            $user = auth()->user();

            // Periksa apakah user sudah pernah melakukan vote
            $existingVote = Vote::where('user_id', $user->id)->first();
            if ($existingVote) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You have already voted.'
                ], 403);
            }

            // Simpan vote baru
            $vote = new Vote();
            $vote->user_id = $user->id;
            $vote->candidate_id = $candidateId;
            $vote->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Vote successfully recorded!'
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'You need to be logged in to vote.'
            ], 401);
        }
    }

}
