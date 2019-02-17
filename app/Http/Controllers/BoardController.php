<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;

class BoardController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth', ['only' => ['index', 'show']]);
    }

    public function index()
    {
        return Board::all();
    }

    public function store(Request $request)
    {
        Board::create([
            'name' => $request->name,
            'user_id' => 1
        ]);

        return response()->json(['message' => 'success'], 200);
    }

    public function show(Board $board)
    {
        return $board;
    }
}
