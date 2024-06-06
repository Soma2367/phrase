<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['folder_id', 'front_text', 'back_text'];

    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
