<?php

namespace App\Http\Controllers\lang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    //

    public function change(Request $request,string $lang){

        // App::setlocale($request->lang);
        // $language= $request->input('language');
        // session(['language'=>$language]);
        session(['language'=>$lang]);
        // dd($lang);
        $t= session()->get('language') ;
        // dd($t);
        // dd(session('language'));
        // dd($language);
        return redirect()->back();

    }

}
