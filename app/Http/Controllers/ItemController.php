<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use App\Models\ModelItem;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $perms = [
            'pageTitle' => 'Items List',
        ];
        return view('project.item.index', $perms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('project.item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return bool
     */
    public function store(StoreItemRequest $request)
    {
        if ($request->store()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Item $item)
    {
        return view('project.item.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return false
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        if ($request->update($item)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return bool
     */
    public function destroy(Item $item)
    {
        if ($item->delete()) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchAjax(Request $request)
    {
        $count = Item::count();
        $brand = Item::with('brand','modelItem')->orderBy('id', 'desc')
            ->skip($request->start)
            ->take($request->length)
            ->get();

        return response()->json([
            'aaData' => $brand,
            'draw' => intval($request->draw),
            'iTotalRecords' => $count,
            'iTotalDisplayRecords' => $count,
            'start' => $request->start
        ]);
    }
}
