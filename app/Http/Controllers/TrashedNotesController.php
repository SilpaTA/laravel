<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notes;

class TrashedNotesController extends Controller
{
    public function index(){
        $notes = Notes::whereBelongsTo(Auth::user())->onlyTrashed()->latest('updated_at')->paginate(5); //Inverse relationships
        return view('notes.index')->with('notes', $notes);
    }

    public function show(Notes $note) {
        if(!$note->user->is(Auth::user())) {
            return abort(403);
        }

        return view('notes.show')->with('note', $note);
    }
    
}
