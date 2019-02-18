<?php

namespace App\Http\Controllers;

use App\Card;
use App\Lists;
use App\Board;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($boardId, $listId)
    {
        $board = Board::find($boardId);

        $list = $board->lists()->find($listId);

        return response()->json(['cards' => $list->cards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $boardId)
    {
        $this->validate($request, ['name' => 'required']);

        $board = Board::find($boardId);

        $board->lists()->cards()->create([
            'name' => $request->name
        ]);

        return response()->json(['message' => 'success'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lists  $lists
     * @return \Illuminate\Http\Response
     */
    public function show($boardId, $listId, $cardId)
    {
        $board = Board::find($boardId);

        $list = $board->lists()->find($listId);
        $card = $list->cards()->find($cardId);

        return response()->json(['status' => 'success', 'card' => $card]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lists  $lists
     * @return \Illuminate\Http\Response
     */
    public function edit(Lists $lists)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lists  $lists
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lists $lists)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lists  $lists
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lists $lists)
    {
        //
    }
}
