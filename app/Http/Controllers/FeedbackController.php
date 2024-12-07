<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    //
    public function viewListOFeedback($id): View {
        $user = User::findOrFail($id);

        if ($user->role === 'Customer') {
            $feedbacks = Feedback::where('user_id', $user->id)->get();
        } elseif ($user->role === 'Staff') {
            $feedbacks = Feedback::all();
        }

        foreach ($feedbacks as $fb) {
            $fb->date = Carbon::parse()->format(' j F Y');
        }

        return view('manageFeedback.listofFeedback', [
            'feedbacks' => $feedbacks,
        ]);
    }

    public function viewAddFeedback(): View {

        return view('manageFeedback.addFeedback');
    }
}
