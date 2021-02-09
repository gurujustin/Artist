<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\Menu;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index')->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            // 'attach_file' => 'required|max:100000|mimes:jpeg,jpg,png,gif'
        ]);
        // $fileName = time() . '.' . $request->attach_file->extension();
        // $path = $request->attach_file->move(public_path('uploads'), $fileName);
        Page::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => str_slug($request->title, '-'),
            // 'file' => $fileName,
        ]);
        return redirect()->route('pages.index')->with('success', 'The page is successfully created.');
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
        $page = Page::find($id);
        return view('admin.pages.edit')->with('page', $page);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            // 'attach_file' => 'required|max:100000|mimes:jpeg,jpg,png,gif'
        ]);
        // unlink(public_path('uploads/' . Page::find($id)->value('url')));
        // $fileName = time() . '.' . $request->attach_file->extension();
        // $path = $request->attach_file->move(public_path('uploads'), $fileName);
        Page::find($id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'slug'=> str_slug($request->title, '-'),
            // 'file' => $fileName,
        ]);
        return redirect()->route('pages.index')->with('success', 'The page is successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Page::find($id)->delete();
        return redirect()->route('pages.index')->with('success', 'The page is successfully removed.');
    }

    public function changeStatus($id){
        Page::find($id)->update([
            'status_id' => 3-Page::find($id)->status_id,
        ]);
        return redirect()->route('pages.index')->with('success', 'The Status is successfully changed.');
    }

}