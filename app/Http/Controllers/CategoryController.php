<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function __construct(){

        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $categories= Category::all();
        return view('backoffice.category.index', compact('categories'));
        // dd($categories);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('backoffice.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( CategoryRequest $request)
    {

        $filds= $request->validated();

        $image = $request->file('image');
        // $imageName=  $image->getClientOriginalName() . '.'.time();
        $imagePath=$image->store('categories','public');
        // $category = new Category();
        // dd($t);
        // $filds['image'] = 'categories/'.$imageName;

        $filds['image'] = $imagePath;
        Category::create($filds);


        // dd($request->all());
        return redirect()->route('category.index')
        ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
        return view('backoffice.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        //
        return view('backoffice.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {

       $formField=  $request->validated();
        // dd($formField);



        $image= $request->file('image');
        if($image){
            // Storage::delete($category->image);
            Storage::disk('public')->delete($category->image);

            $imagePath=$image->store('categories', 'public');
            $formField['image'] = $imagePath;

        }
        $category->update($formField);
        return redirect()->route('category.index')
        ->with('success', 'Category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Category $category):RedirectResponse
    // {


    //     // Storage::disk('public')->delete($category->image);
    //     // @unlink(public_path('storage/'.$category->image));

    //     $category->delete();
    //     // $category->store()->delete();
    //     // dd($category->image);

    //     return redirect()->route('category.index')
    //     ->with('success', 'Category Deleted Successfully.');
    // }

    public function destroy(Category $category)
    {


        // Storage::disk('public')->delete($category->image);
        // @unlink(public_path('storage/'.$category->image));


        // dd($category->image);
        $result =$category->delete();
        // dd($t);

        if($result){
        //    return  response()->json([
        //         'success'=>true,
        //        'message' => 'Category Deleted Successfully.'
        //    ]);

           return response()->json([
               'success'=>'success',
           ]);
        }


        return response()->json([
            'success'=>false,
            'message' => 'Something went wrong.'
        ]);
        // $category->store()->delete();
        // dd($category->image);

        // return redirect()->route('category.index')
        // ->with('success', 'Category Deleted Successfully.');
    }


    public function archived(){

        $archivedCategories = Category::onlyTrashed()->get();
        return view('backoffice.category.archived',compact('archivedCategories'));

    }

    // public function forceDelete(Category $category){


    //     $category->forceDelete();
    //     Category::where('id', $id)->withTrashed()->restore();
    //     return back()->with('success', 'Category deleted successfully.');

    // }

    public function forceDelete($id){


        $category= Category::onlyTrashed()->where('id', $id)->first();
        Storage::disk('public')->delete($category->image);
        Category::where('id', $id)->withTrashed()->forceDelete();
        return back()->with('success', 'Category deleted successfully.');

    }


    // public function restore(Category $category){
    //     dd($category);
    //     $category->restore();
    //     return back()->with('success', 'Category restored successfully.');

    // }


    public function restore($id)
{
    // dd($id);
    Category::where('id', $id)->withTrashed()->restore();

    // return redirect()->route('category.index', ['status' => 'archived'])
    // ->withSuccess(__('User restored successfully.'));
            return back()->with('success', 'Category restored successfully.');


}
}
