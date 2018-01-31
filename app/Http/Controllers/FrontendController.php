<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Page;
use App\Setting;
use App\Mainmenu;
use App\Submenu;

class FrontendController extends Controller
{
    //main home
    public function index()
    {
        $allsettings = Setting::all();
        if($allsettings->isNotEmpty())
        {
          $setting = Setting::find(1);
          $page = Page::where('title', '=', $setting->home_page)->first();

          $menu = Mainmenu::all()->load('submenu'); //menu navbar
          return view('homefrontend', ['page' => $page, 'setting' => $setting])->with(compact('menu'));
        }
        else {
          $title = "Default Theme";//site title
          $menu = Mainmenu::all()->load('submenu'); //menu navbar
          return view('defaulthomepage', ['title' => $title, 'setting' => ''])->with(compact('menu'));
        }
    }
    //show blog pages
    public function showblog($slug)
    {
        $allsettings = Setting::all();
        if($allsettings->isNotEmpty())
        {
          $setting = Setting::find(1);

          $blog = Blog::where('slug', '=', $slug)->first();
          $menu = Mainmenu::all()->load('submenu');//menu navbar

          if(!$blog)
          abort(404);

          return view('viewblog', ['blog' => $blog, 'setting' => $setting])->with(compact('menu'));
        }
        else
        {
          $blog = Blog::where('slug', '=', $slug)->first();
          $menu = Mainmenu::all()->load('submenu');//menu navbar

          if(!$blog)
          abort(404);

          return view('viewblog', ['blog' => $blog, 'setting' => ''])->with(compact('menu'));
        }

    }
    //show blog pages
    public function showpage($slug)
    {
        $allsettings = Setting::all();
        if($allsettings->isNotEmpty())
        {
          $setting = Setting::find(1);

          $page = Page::where('slug', '=', $slug)->first();
          $menu = Mainmenu::all()->load('submenu');//menu navbar

          if(!$page)
          abort(404);

          return view('viewpage', ['page' => $page, 'setting' => $setting])->with(compact('menu'));

        }
        else
        {
          $page = Page::where('slug', '=', $slug)->first();
          $menu = Mainmenu::all()->load('submenu');//menu navbar

          if(!$page)
          abort(404);

          return view('viewpage', ['page' => $page, 'setting' => ''])->with(compact('menu'));
        }
    }
}
