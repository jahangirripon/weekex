<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use Auth;

class BoardController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth', ['only' => ['index', 'show']]);
    }

    public function index()
    {
        // dd(Auth::user());

        // if (Auth::check()) {
        //     echo 'You are logged in'; // you currently don't have an echo or var_dump statement
        //    } else {
        //     echo 'no';
        //    }
        return Board::all();
        // $user = Auth::user(); // lowercase
        // $userEmail = $user->email; // lowercase and tidied up, you don't need to keep referring to Auth::user once you've done it
        // return $userEmail;
    }

    public function store(Request $request)
    {
        Board::create([
            'name' => $request->name,
            'user_id' => Auth::id(),
        ]);

        return response()->json(['message' => 'success'], 200);
    }

    public function show($boardId)
    {
        //return $board;
        $board = Board::findOrFail($boardId);

        // if(Auth::user()->id !== $board->user_id)
        // {
        //     return response()->json(['status' => 'error', 'message' => 'unauthoraized'], 401);
        // }

        return $board;
    }

    public function update(Board $board)
    {
        $board = Board::find($board);
        $board->update($request->all());

        return response()->json(['message' => 'Updated'], 200);
    }

    public function destroy(Board $board)
    {
        if(Board::destroy($board))
        {
            return response()->json(['message' => 'Deleted'], 200);    
        }

        return response()->json(['message' => 'Something went wrong'], 400);
    }
}
