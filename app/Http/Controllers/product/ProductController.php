<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\CreateProductRequest;
use App\Http\Requests\product\EditProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\fileExists;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // dd(asset('storage/products'));
        // dd(public_path());
        // dd(storage_path());
        // return public_path();
        $products= Product::all();

        return view('backoffice.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        // dd($categories);
        return view('backoffice.product.create' ,compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProductRequest $request)
    {

        $formFields = $request->validated();
        // dd($formFields);

        $image = $request->file('photo');


        if($image){

            $imageName= time().uniqid().".".$image->getClientOriginalExtension();
            $formFields['photo']=$imageName;
            // Storage::disk('public')->put('products/'.$imageName, file_get_contents($image->getRealPath()));
            // $image->storeAs('products',$imageName,'public');
            $image->move(public_path('storage/products'),$imageName);
            // $image->store('products',$imageName,'public');

        }else{
            $formFields['image']="default-product.png";
        }
        Product::create($formFields);
        return redirect()->route('product.index')
        ->with('success',"Product created Successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('backoffice.product.edit',compact('product','categories'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditProductRequest $request, Product $product)
    {


        $formFields = $request->validated();

        $image = $request->file('photo');
        if($image){
            Storage::disk('public')->delete("products/".$product->photo);
            $imageName= time().uniqid().".".$image->getClientOriginalExtension();
            $formFields['photo']=$imageName;
            $image->storeAs('products',$imageName,'public');
    }


    $product->update($formFields);
    return redirect()->route('product.index')
    ->with('success',"Product updated successfully");
}

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Product $product)
    // {

    //     $image= $product->photo;


    //     if(file_exists(public_path('storage/products/'.$image))){

    //         Storage::disk('public')->delete("products/".$image);
    //          $product->delete();
    //     }

    //     return back()->with('success','Product deleted successfully');


    // }

    public function destroy(Product $product)
    {

        $image= $product->photo;


        $result = false; #change this
        $product->delete();
        if(file_exists(public_path('storage/products/'.$image))){

            Storage::disk('public')->delete("products/".$image);
             $result=   $product->delete();
        }


        if($result){
            return response()->json(
                [
                    'success'=>'success',
                ]
                );
        }

        return response()->json(
            [
                'success'=>'error',
            ]
            );




        // return back()->with('success','Product deleted successfully');


    }
}
