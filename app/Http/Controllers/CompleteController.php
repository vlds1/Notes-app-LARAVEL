<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class CompleteController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $note = Note::where('id', $id)->first();
        $note->isdone = !$note->isdone;
        $note->save();
        // dd(var_dump($note->isdone));
        return redirect()->route('notes.index');
    }
}
