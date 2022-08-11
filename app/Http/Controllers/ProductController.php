<?php
//php artisan make:model Product -csfmr
/* Commande pour créer un model du nom de Product ,créer son controlleur, son , son factor */

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function productWithCategory()
    {
        $productsWithCategory = Product::with('category')->get();
        return $productsWithCategory;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|max:255',
            'first_price' => 'required',
            'reduction_rate' => 'required',
            'id_category' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(["message" => $validator->errors()], 401);
        } else {

            $product = Product::create([
                'product_name' => $request->product_name,
                'first_price' => $request->first_price,
                'reduction_rate' => $request->reduction_rate,
                'product_description' => $request->product_description,
                'product_date_end' => $request->product_date_end,
                'id_category' => $request->id_category
            ]);

            $image = ($request->file('images') == null ? "" : request('images')->store('product_file', 'public'));
            $file_photo = $request->file('images');

            $cover = Image::create([
                'path' => $image,
                'name' => $file_photo->getClientOriginalName(),
                'id_product' => $product->id
            ]);
        }


        return response()->json(["message" => "Product has been created", "produit" => $product->with('images')->get()]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public
    function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Product $product)
    {
        //
    }
}
