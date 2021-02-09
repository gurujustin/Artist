<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Act;
use App\Models\ParentAct;
use Illuminate\Http\Request;

class ActTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actTypes = Act::all();
        $parentacts = ParentAct::all();
        return view('admin.acttype.act_types', [
            'acttypes' => $actTypes,
            'parentacts' => $parentacts,
        ]);
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
    public function store(Request $request, Act $actType)
    {
        $actType->create([
            'name' => $request->name,
            'parent_act_id' => $request->parentact,
            'slug'=> str_slug($request->name, '-'),
        ]);
        
        return redirect()->back()->with('success', 'Category was successfully created.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ActType  $actType
     * @return \Illuminate\Http\Response
     */
    public function show(Act $actType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ActType  $actType
     * @return \Illuminate\Http\Response
     */
    public function edit($acttype)
    {
        $acttype = Act::find($acttype);
        return $acttype;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ActType  $actType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $acttype)
    {
        Act::find($acttype)->update([
            'name'=> $request->name,
            'slug'=> str_slug($request->name, '-'),
            'parent_act_id' => $request->parentact,
        ]);
        return redirect()->back()->with('success', 'Category was successfully saved.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ActType  $actType
     * @return \Illuminate\Http\Response
     */
    public function destroy($acttype)
    {        
        Act::find($acttype)->delete();
        return 1;
    }
}
