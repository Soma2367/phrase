<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Folder;

class FolderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // ユーザーに関連するフォルダとそのフォルダ
        $folders = $user->folders()->with('cards')->get();

        return view('folder.index', compact('folders'));
    }

    public function create()
    {
        return view('folder.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:20'
        ]);

        $folder = new Folder();
        $folder->folder_name = $request->name;
        $folder->user_id = $user->id;
        $folder->save();

        return redirect()->route('folder.index');
    }

    public function show($id)
    {
        $folder = Folder::with('cards')->findOrFail($id);
        return view('folder.show', compact('folder'));
    }

    public function edit($id)
    {
        $folder = Folder::find($id);
        return view('folder.edit', compact('folder'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'folder_name' => 'required|string|max:255',
        ]);

        $folder = Folder::find($id);
        if (!$folder) {
            return redirect()->route('folder.index');
        }

        $folder->folder_name = $request->folder_name;
        $folder->save();

        return redirect()->route('folder.index');
    }

    public function destroy($id)
    {
        $folder = Folder::find($id);
        if (!$folder) {
            return redirect()->route('folder.index');
        }

        $folder->delete();

        return redirect()->route('folder.index');
    }
}
