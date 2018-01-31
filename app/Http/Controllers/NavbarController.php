<?php

namespace App\Http\Controllers;

use App\page;
use App\Blog;
use App\Mainmenu;
use App\Submenu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    //add navbar
    public function addnavbar()
    {
        $allpage = Page::all(['title', 'slug', 'id']);
        $allblog = Blog::all(['title', 'slug']);
        $allmainmenu = Mainmenu::all();

        return view('navbar/addnavbar', compact('allpage', $allpage, 'allblog', $allblog, 'allmainmenu', $allmainmenu));
    }
    //store menu to main menu
    public function storenavbarmainmenu(Request $req)
    {

      $validator = Validator::make(request()->all(), [
          'mainmenu_name' => 'required',
          'mainmenu_link' => 'required',
      ]);

      if($validator->passes())
      {
          if(!is_null($req))
          {
            $menu = new Mainmenu;
            $menu->mainmenu_name = $req->mainmenu_name;
            $menu->mainmenu_link = $req->mainmenu_link;
            $menu->save();

            $req->session()->flash('success', 'Successfully added!');
            return redirect()->action('NavbarController@addnavbar');
          }
          else
          {
            $req->session()->flash('warning', 'Error, menu is empty! Please select menu.');
            return redirect()->action('NavbarController@addnavbar');
          }
      }
      else
      {
        $req->session()->flash('warning', 'Error, menu is empty! Please select menu.');
        return redirect()->action('NavbarController@addnavbar');

      }

    }
    //store menu to sub menu
    public function storenavbarsubmenu(Request $req)
    {
        $validator = Validator::make(request()->all(), [
            'mainmenu_id' => 'required',
            'submenu_name' => 'required',
            'submenu_link' => 'required',
        ]);

        if($validator->passes())
        {
            if(!is_null($req))
            {
              $menu = new Submenu;
              $menu->mainmenu_id = $req->mainmenu_id;
              $menu->submenu_name = $req->submenu_name;
              $menu->submenu_link = $req->submenu_link;
              $menu->save();

              $req->session()->flash('success', 'Successfully added!');
              return redirect()->action('NavbarController@addnavbar');
            }
            else
            {
              $req->session()->flash('warning', 'Error, submenu is empty! Please select submenu.');
              return redirect()->action('NavbarController@addnavbar');
            }
        }
        else
        {
          $req->session()->flash('warning', 'Error, submenu is empty! Please select submenu.');
          return redirect()->action('NavbarController@addnavbar');

        }
    }
    //list main menu & sub menu
    public function listnavbar()
    {
      $allmainmenu = Mainmenu::all();
      $allsubmenu = Submenu::all();

      return view('navbar/listnavbar', compact('allmainmenu', $allmainmenu, 'allsubmenu', $allsubmenu));
    }
    //delete main menu navbar
    public function deletemainmenu($id)
    {
        $checkmainmenu = Mainmenu::count();
        if($checkmainmenu == 1)
        {
            $submenu = Submenu::where('id', '>', '0');
            $submenu->delete();

            $mainmenu = Mainmenu::find($id);
            $mainmenu->delete();
            return redirect('admin/home/navbar');
        }
        else
        {
            $mainmenu = Mainmenu::find($id);
            $mainmenu->delete();
            return redirect('admin/home/navbar');
        }

    }
    //delete sub menu navbar
    public function deletesubmenu($id)
    {
        $submenu = Submenu::find($id);
        $submenu->delete();
        return redirect('admin/home/navbar');
    }
}
