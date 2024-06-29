<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['folder_id', 'front_text', 'back_text'];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    // カードが現在のユーザーにブックマークされているかチェック
    public function isBookmarkedByUser()
    {
        return $this->bookmarks()->where('user_id', Auth::id())->exists();
    }
}
