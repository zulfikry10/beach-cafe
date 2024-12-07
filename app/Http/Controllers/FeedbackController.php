<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    //
    public function viewListOFeedback($id): View {
        return view('manageFeedback.listofFeedback', [
            'feedbacks' => Feedback::where('user_id', $id),
        ]);
    }
}
