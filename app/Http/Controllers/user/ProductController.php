<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Purchase;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\PurchaseRequest;


class ProductController extends Controller
{
    // Display all products
    public function index()
    {
        $products = Product::all();
        return view('user.products', compact('products'));
    }

    // Show the form for creating a new product
    public function create()
    {
        return view('user.create_product');
    }

    // Store a newly created product in the database
    public function store(ProductRequest $request)
    {
        // Validate and retrieve the data from the request
        $data = $request->validated();

        // Handle image upload if there is a file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = 'user/assets/img';
            $imagePath = $image->storeAs($path, $image->getClientOriginalName(), 'public');
            $data['image'] = $imagePath;
        }

        // Create the product in the database
        Product::create($data);

        // Redirect to the products list with success message
        return redirect()->route('products.index')->with('msg', 'Product added successfully!');
    }

    // Show the form for editing a product
    public function edit($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Return the edit view with the product data
        return view('user.edit_product', compact('product'));
    }

    // Update the specified product in the database
    public function update(ProductRequest $request, $id)
    {
        // Validate and retrieve the data from the request
        $data = $request->validated();

        // Handle image upload if there is a file
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $customPath = 'user/assets/img';
            $imagePath = $image->storeAs($customPath, $image->getClientOriginalName(), 'public');
            $data['image'] = $imagePath;
        }

        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Update the product with the new data
        $product->update($data);

        // Redirect to the products list with success message
        return redirect()->route('products.index')->with('msg', 'Product updated successfully!');
    }

    // Delete the specified product
    public function destroy($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Delete the product
        $product->delete();

        // Redirect back with success message
        return redirect()->back()->with('msg', 'Product deleted successfully!');
    }

    // Show the product details for purchase
    public function buy($id)
{
    // Find the product by its ID
    $product = Product::findOrFail($id);

    // Return the 'product_purchase' view with the product data
    return view('user.product_purchase', compact('product'));
}

    // Store the purchase record for a product
    public function storePurchase(PurchaseRequest $request)
{
    // Validate the incoming request
    $data = $request->validated();

    // Check if it's a product purchase
    if ($request->has('product_id')) {
        // Handle product purchase
        $product = Product::findOrFail($request->product_id);

        // Set relevant product information in the data
        $data['trip_name'] = $product->name;  // Set to null since it's a product purchase, not a trip
        //$data['place'] = $product->place;  // Set the product's place (if applicable)
        $data['product_name'] = $product->name;  // Store the product's name for reference
        $data['product_price'] = $product->price;  // Optionally store the product price
    }

    // Add user info to the purchase
    $data['user_name'] = auth()->user()->name;

    // Store the purchase record
    Purchase::create($data);

    // Redirect back to products page with success message
    return redirect()->route('products.index')->with('msg', 'Product purchase completed successfully!');
}



}
