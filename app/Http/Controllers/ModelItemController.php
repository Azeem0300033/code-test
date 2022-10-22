<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModelItemRequest;
use App\Http\Requests\UpdateModelItemRequest;
use App\Models\ModelItem;
use Illuminate\Http\Request;

class ModelItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $perms = [
            'pageTitle' => 'Model List',
        ];
        return view('project.model-item.index', $perms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('project.model-item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreModelItemRequest  $request
     * @return bool
     */
    public function store(StoreModelItemRequest $request)
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
     * @param  \App\Models\ModelItem  $modelItem
     * @return \Illuminate\Http\Response
     */
    public function show(ModelItem $modelItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModelItem  $modelItem
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(ModelItem $modelItem)
    {
        return view('project.model-item.edit', compact('modelItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateModelItemRequest  $request
     * @param  \App\Models\ModelItem  $modelItem
     * @return bool
     */
    public function update(UpdateModelItemRequest $request, ModelItem $modelItem)
    {
        if ($request->update($modelItem)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModelItem  $modelItem
     * @return bool
     */
    public function destroy(ModelItem $modelItem)
    {
        if ($modelItem->delete()) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchAjax(Request $request)
    {
        $count = ModelItem::count();
        $brand = ModelItem::with('brand')->orderBy('id', 'desc')
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

    public function modelAjaxForItem(Request $request)
    {
        return ModelItem::where('brand_id', $request->brand_id)->get();
    }
}
