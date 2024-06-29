<?php

// BookmarkController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Card;
use Illuminate\Support\Facades\Auth;


class BookmarkController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $bookmarkedCards = $user->bookmarks()->with('card')->get()->pluck('card');

        return view('book.index', compact('bookmarkedCards'));
    }

    public function toggle(Request $request)
    {
        $cardId = $request->input('card_id');
        $userId = auth()->id();

        $bookmark = Bookmark::where('user_id', $userId)->where('card_id', $cardId)->first();

        if ($bookmark) {
            $bookmark->delete();
            $bookmarked = false;
        } else {
            Bookmark::create([
                'user_id' => $userId,
                'card_id' => $cardId,
            ]);
            $bookmarked = true;
        }

        return response()->json(['bookmarked' => $bookmarked]);
    }

    public function checkBookmarkStatus($card_id)
    {
        $bookmarked = Bookmark::where('user_id', auth()->id())
                              ->where('card_id', $card_id)
                              ->exists();

        return response()->json(['bookmarked' => $bookmarked]);
    }
}