<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Folder;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // eat
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $folder_id)
    {
        $folder = Folder::findOrFail($folder_id);
        return view('card.create', compact('folder', 'folder_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $folder_id)
    {
        $folder = Folder::findOrFail($folder_id);
        $cards = new Card();
        $cards->folder_id = $folder_id;
        $cards->front_text = $request->input('front_text');
        $cards->back_text = $request->input('back_text');
        $cards->save();
        
        return redirect()->route('card.show', ['folder_id' => $folder->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $folder_id)
    {
        $folder = Folder::findOrFail($folder_id);
        $folder_name = $folder->folder_name;
        $cards = Card::where('folder_id', $folder_id)->get();
        return view('card.show', compact('cards', 'folder', 'folder_name'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $card = Card::find($id);
        return view('card.edit', compact('card'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $card = Card::findOrFail($id);
        $card->front_text = $request->input('front_text');
        $card->back_text = $request->input('back_text');
        $card->save();
        $folder_id = $card->folder_id;
        
        return redirect()->route('card.show', ['folder_id' => $folder_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $card = Card::findOrFail($id);
        $folder_id = $card->folder_id;
        if (!$card) {
            return redirect()->route('card.index')->withErrors('Card not found.');
        }
        $card->delete();

        return redirect()->route('card.show', ['folder_id' => $folder_id]);
    }
}
