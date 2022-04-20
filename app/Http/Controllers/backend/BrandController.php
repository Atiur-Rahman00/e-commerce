<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //To view brand data
        $all_brands = Brand::all();
        return view('backend.brand.index', compact('all_brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //To view create page
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //To store brand
        $request->validate([
            'brand_name' => 'required',
        ]);
        $brand_name = Str::lower($request->brand_name);
        Brand::insert([
            'brand_name' => $brand_name,
            'slug' => Str::slug($request->brand_name),
            'created_at' => Carbon::now(),
        ]);
        return back()->with('insdone', 'brand added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //To edit brand data
        $single_info = Brand::find($id);
        return view('backend.brand.edit', compact('single_info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //To update brand data
        $request->validate([
            'brand_name' => 'required',
        ]);
        $brand_name = Str::lower($request->brand_name);
        Brand::findOrFail($request->brand_id)->update([
            'brand_name' => $brand_name,
        ]);
        return redirect('/brand/index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
