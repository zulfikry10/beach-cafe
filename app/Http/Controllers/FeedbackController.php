<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\Menu;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FeedbackController extends Controller
{
    public function displaydummy(): View {
        return view('manageFeedback.dummydisplay');
    }

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

    public function viewAddFeedback($menu_id): View {
        $menu = Menu::findOrFail($menu_id);

        return view('manageFeedback.addFeedback', [
            'menu' => $menu,
        ]);
    }

    public function createFeedback(Request $request) {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'menu_id' => ['required', 'exists:menus,id'],
            'comment' => ['required', 'string', 'max:50'],
            'rating' => ['required', 'integer'],
            'date' => ['required', 'date', 'before_or_equal:today'],
        ]);

        Feedback::create([
            'user_id' => $request->user_id,
            'menu_id' => $request->menu_id,
            'comment' => $request->comment,
            'rating' => $request->rating,
            'date' => $request->date,
        ]);

        return redirect()->route('dummydisplay');
    }
}
