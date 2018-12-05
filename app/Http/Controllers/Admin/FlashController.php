<?php

namespace App\Http\Controllers\Admin;

use App\Models\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flashs=Flash::all();
        return view('admin.flash.index',compact('flashs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.flash.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Flash $flash)
    {
//        $re=$request->all()['data'];
//        dd(json_decode($re,true));
        $re=json_decode($request->all()['data'],true);
//        这一句有问题
        $flash->create([
            'title'=>$re['title'],
            'path'=>$re['picurl'],
            ]);
        return  redirect()->route('admin.flash.index')->with('success','添加成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flash  $flash
     * @return \Illuminate\Http\Response
     */
    public function show(Flash $flash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flash  $flash
     * @return \Illuminate\Http\Response
     */
    public function edit(Flash $flash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flash  $flash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flash $flash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flash  $flash
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flash $flash)
    {
        //
    }
}
