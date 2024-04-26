<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ArchivedCategoryController extends Controller
{
    


    public function index(){

        return view('backoffice.category.archived');

    }

    public function forceDelete(Category $category){

    }


    public function restore(Category $category){

    }
}
