<?php

// app/Http/Controllers/RatingFeedbackController.php

namespace App\Http\Controllers;

use App\Models\RatingFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingFeedbackController extends Controller
{
    public function submitFeedback(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string',
        ]);

        RatingFeedback::create([
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);

        return redirect('/')->with('status', 'Thank you for your feedback!');
    }

    public function showFeedback()
    {
        $feedbacks = RatingFeedback::with('user')->get();

        return view('admin.feedbacks', compact('feedbacks'));
    }
}

