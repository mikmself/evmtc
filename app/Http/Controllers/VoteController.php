<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Exception;

class VoteController extends Controller
{
    public function vote(Request $request, $candidateId)
    {
        try {
            if (!auth()->check()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You need to be logged in to vote.'
                ], 401);
            }
            $user = auth()->user();
            if ($user->is_voted == "true") {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You have already voted.'
                ], 403);
            }
            if (!is_numeric($candidateId)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid candidate ID.'
                ], 400);
            }
            $candidate = Candidate::find($candidateId);
            if (!$candidate) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Candidate not found.'
                ], 404);
            }
            $vote = new Vote();
            $vote->user_id = $user->id;
            $vote->candidate_id = $candidateId;
            $vote->save();
            $user->is_voted = "true";
            $user->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Vote successfully recorded!'
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }
}
