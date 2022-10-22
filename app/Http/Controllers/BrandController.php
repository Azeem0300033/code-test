<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use App\Models\ModelItem;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $perms = [
            'pageTitle' => 'Brand List',
        ];
        return view('project.brand.index', $perms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        return view('project.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBrandRequest  $request
     * @return bool
     */
    public function store(StoreBrandRequest $request)
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
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Brand $brand)
    {
        return view('project.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBrandRequest  $request
     * @param  \App\Models\Brand  $brand
     * @return bool
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        if ($request->update($brand)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return bool
     */
    public function destroy(Brand $brand)
    {
        if ($brand->delete()) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchAjax(Request $request)
    {
        $count = Brand::count();
        $brand = Brand::withCount('modelItems','item')->orderBy('id', 'desc')
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

    public function brandAjaxForModel(Request $request)
    {
        return ModelItem::where('brand_id', $request->brand_id)->get();
    }
}
