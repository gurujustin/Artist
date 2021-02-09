<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Page;
use Session;


class MenuController extends Controller
{
    public function menu($id = NULL){        
        $pages = Page::where('status_id', 1)->get();
        if(Menu::count() == 0){
            return view('admin.pages.nomenu', [
                'pages' => $pages,
            ])->with('success', 'There is no menus yet.');
        }        
        if($id == NULL){
            $id = Menu::first()->id;
        }
        $menus = Menu::all();
        $sort_num = Menu::find($id)->sort_num;
        $pagenums = explode(',' , $sort_num);
        return view('admin.pages.menu', [
            'menus' => $menus,
            'pagenums' => $pagenums,
            'current_menu' => $id,
            'pages' => $pages,
        ]);
    }

    public function store(Request $request){
        Menu::create([
            'name' => $request->name,
            'sort_num' => implode(',', $request->sort_num),
        ]);
        $id = Menu::first()->id;
        return redirect()->route('menu')->with('success', 'New Menu was successfully created.');
    }

    public function destroy($id){
        Menu::find($id)->delete();
        if(Menu::count() == 0){
            $id = NULL;
        }
        else{
            $id = Menu::first()->id;
        }
        return redirect()->route('menu')->with('success', 'The Menu was successfully removed.');
    }
    
    public function addpage($id, Request $request){
        $menu = Menu::find($id);
        $menu->sort_num .= ','. $request->page;
        $menu->save();
        return back()->with('success', 'Pages was successfully changed');
    }

    public function removepage($id, Request $request){
        $menu = Menu::find($id);
        $sort_num = $menu->sort_num;
        $page_array = explode(',', $sort_num);
        $page_array = \array_diff($page_array, [$request->page]);
        $menu->sort_num = implode(',', $page_array);
        $menu->save();
        return back()->with('success', 'The page was successfully removed from this menu.');
    }

    public function sort($id){

    }
}
