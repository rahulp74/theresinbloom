<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->orderByDesc('id')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.form', ['product' => new Product(), 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);
        $data['details'] = $this->splitDetails($request->input('details_text', ''));
        $data['image'] = $this->handleImage($request, null) ?? 'images/product-coaster.jpg';
        $data['slug'] = $data['slug'] ?: Str::slug($data['name']);
        Product::create($data);
        return redirect()->route('admin.products.index')->with('status', 'Product created.');
    }

    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.form', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->validateData($request, $product->id);
        $data['details'] = $this->splitDetails($request->input('details_text', ''));
        $img = $this->handleImage($request, $product->image);
        if ($img) $data['image'] = $img;
        $product->update($data);
        return redirect()->route('admin.products.index')->with('status', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('status', 'Product deleted.');
    }

    private function validateData(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'name' => 'required|string|max:150',
            'slug' => 'nullable|string|max:150|unique:products,slug' . ($id ? ",{$id}" : ''),
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer|min:0',
            'swatch' => 'required|in:petal,mist,leaf,lavender',
            'best_seller' => 'sometimes|boolean',
            'featured' => 'sometimes|boolean',
            'customizable' => 'sometimes|boolean',
            'description' => 'required|string',
        ]);
    }

    private function splitDetails(string $text): array
    {
        return collect(preg_split("/\r\n|\n|\r/", $text))
            ->map(fn ($s) => trim($s))->filter()->values()->all();
    }

    private function handleImage(Request $request, ?string $current): ?string
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            return $path; // e.g. products/xyz.jpg
        }
        return null;
    }
}
