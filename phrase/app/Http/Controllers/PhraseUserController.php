<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PhraseUser;


class PhraseUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = PhraseUser::all();
        return view('phrase_user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('phrase_user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new PhraseUser();
        $user->user_name = $request->input('user_name');
        $user->save();

        return redirect()->route('phrase_user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = PhraseUser::find($id);
        return view('phrase_user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = PhraseUser::find($id);
        $user->user_name = $request->input('user_name');
        $user->save();

        return redirect()->route('phrase_user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $user = PhraseUser::find($id);
    if (!$user) {
        return redirect()->route('phrase_user.index')->withErrors('User not found.');
    }
    $user->delete();

    return redirect()->route('phrase_user.index');
    }

}
