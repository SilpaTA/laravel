<?php

namespace App\Http\Controllers;

use App\Models\Notes as ModelsNotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notes;
use Illuminate\Support\Str;
use Notes as GlobalNotes;

// use Notes;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $userId = Auth::id();
        // $notes = Notes::where('user_id', Auth::id())->latest('updated_at')->get();//get all data from database
        
        // $notes = Notes::where('user_id', Auth::id())->latest('updated_at')->paginate(5);

        // $notes = Auth::user()->notes()->latest('updated_at')->paginate(5); //Elequent relationship querying 
        $notes = Notes::whereBelongsTo(Auth::user())->latest('updated_at')->paginate(5); //Inverse relationships
        return view('notes.index')->with('notes', $notes);
        
        
        // $notes->each(function($notes){
        //     dump($notes->title);

        // });
        // dd($notes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:200',
            'content' =>'required'
        ]);
        Auth::user()->notes()->create([
        
        // Notes::create ([
            'uuid'=>Str::uuid(),
            // 'user_id' => Auth::id(),
            'title'=> $request->title,
            'content'=> $request->content
        ]);
        return redirect()->route('notes.index')->with('success', 'Note Added Successfully');


        // $note = new Notes ([
        //     'user_id' => Auth::id(),
        //     'title'=> $request->title,
        //     'content'=> $request->content
        // ]);
        // $note->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function show(Notes $note)
    {
        // $note = Notes::where('uuid',$uuid)->where('user_id',Auth::id())->firstOrFail();
        // if($note->user_id != Auth::id()){
        //     return abort(403);
        // }

        if($note->user->is(Auth::user())){ //Checking primary keys of two tables
            return abort(403);
        }
        return view('notes.show')->with('notes', $note);
    }

    // public function show($uuid)
    // {
    //     $note = Notes::where('uuid',$uuid)->where('user_id',Auth::id())->firstOrFail();
    //     return view('notes.show')->with('notes', $note);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Notes $note)
    {
        if($note->user_id != Auth::id()){
            return abort(403);
        }
        return view('notes.edit')->with('notes', $note)->with('success', 'Note Edited Successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notes $note )
    {
        if($note->user_id != Auth::id()){
            return abort(403);
        }
        $request->validate([
            'title' => 'required|max:200',
            'content' =>'required'
        ]);

        $note->update ([
            
            'title'=> $request->title,
            'content'=> $request->content
        ]);
        return redirect()->route('notes.show', $note)->with('success', 'Note Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $note)
    {
        if($note->user_id != Auth::id()){
            return abort(403);
        }

        $note->delete();
        return redirect()->route('notes.index', $note)->with('success', 'Note Deleted Successfully');
    }
}
