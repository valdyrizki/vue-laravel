<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Http\Resources\NoteResource;
use App\Models\Note;
use App\Models\Subject;
use Illuminate\Http\Request;

class NoteController extends Controller
{

    public function index(){
        $notes =  Note::latest()->get();


        return NoteResource::collection($notes);
    }

    public function show(Subject $subject,Note $note){
        return new NoteResource($note);
    }

    public function update(Note $note){
        request()->validate([
            'subject_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $note->update([
            'subject_id' => request('subject_id'),
            'title' => request('title'),
            'description' => request('description')
        ]);

        if($note){
            return response()->json([
                'message' => 'Your note was updated',
                'note' => $note
            ]);
        }else{
            return response()->json([
                'message' => 'Your note failed to updated',
                'note' => $note
            ]);
        }
    }

    public function store(){

        request()->validate([
            'subject' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $subject = Subject::findOrFail(request('subject'));

        $notes = Note::create([
            'subject_id' => $subject->id,
            'title' => request('title'),
            'slug' => \Str::slug(request('title')),
            'description' => request('description')
        ]);

        if($notes){
            return response()->json([
                'message' => 'Your note was created',
                'subject' => $subject,
                'note' => $notes
            ]);
        }else{
            return response()->json([
                'message' => 'Your note failed to created',
                'subject' => $subject,
                'note' => $notes
            ]);
        }

    }

    public function destroy (Note $note){
        $note->delete();

        return response()->json([
            'message' => 'Your note was deleted'
        ],200);
    }

    public function get(){
        dd('test Get');
    }
}
