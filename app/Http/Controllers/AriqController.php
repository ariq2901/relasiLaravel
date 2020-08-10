<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class AriqController extends Controller
{
    public function addCategory(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect('/manage-category')->with('status', 'Berhasil ditambah');
    }

    public function addProduct(/** $id **/ Request $request)
    {   
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'merk' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stock' => 'required',
            'disc' => 'required'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->merk = $request->merk;
        $product->harga_beli = $request->harga_beli;
        $product->harga_jual = $request->harga_jual;
        $product->stock = $request->stock;
        $product->disc = $request->disc;
        $product->save();
        return redirect('/')->with('status', 'Berhasil ditambah');
    }

    // public function getproductsByCategory($id)
    // {
    //     $products = Category::find($id)->product;
    //     return $products;
    // }

    public function categoryForm()
    {
        return view('form.category');
    }

    public function productForm(Category $category)
    {
        $category = $category->all();
        return view('form.product', ['category' => $category]);
    }

    public function index(Product $product)
    {
        $product = $product->all();
        return view('ariq.index', ['product' => $product]);
    }

    public function manageCategory(Category $category)
    {
        $category = $category->all();
        return view('ariq.managecategory', ['category' => $category]);
    }

    public function edit(Product $product,  Category $category)
    {
        $category = $category->all();
        return view('form.edit', ['product' => $product, 'category' => $category]);
    }

    public function categoryEdit(Product $product,  Category $category)
    {
        return view('form.categoryedit', ['product' => $product, 'category' => $category]);
    }

    public function update(Product $product, Request $request)
    {
        Product::where('id', $product->id)
                ->update([
                    'name' => $request->name,
                    'category_id' => $request->category,
                    'merk' => $request->merk,
                    'harga_beli' => $request->harga_beli,
                    'harga_jual' => $request->harga_jual,
                    'stock' => $request->stock,
                    'disc' => $request->disc
                ]);
        
        return redirect('/')->with('status', 'Berhasil Diupdate');
    }

    public function categoryUpdate(Category $category, Request $request)
    {
        Category::where('id', $category->id)
                ->update([
                    'name' => $request->name,
                ]);
        
        return redirect('/manage-category')->with('status', 'Berhasil Diupdate');
    }

    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect('/')->with('status', 'Berhasil dihapus');
    }

    public function categoryDestroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect('/manage-category')->with('status', 'Berhasil dihapus');
    }

}
