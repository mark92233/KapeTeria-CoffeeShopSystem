<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Retrieve all products
        public function index()
{
    $products = Product::with(['category', 'variants'])
        ->latest()
        ->get();

    $categories = \App\Models\Category::orderBy('name')->get();

    $totalProducts = Product::count();

    $availableProducts = Product::where('status', 'available')->count();

    $unavailableProducts = Product::where('status', 'unavailable')->count();

    return view('admin.products', compact(
        'products',
        'categories',
        'totalProducts',
        'availableProducts',
        'unavailableProducts'
    ));
}

    // Retrieve a single product
    public function show(Product $product)
    {
        $product->load(['category', 'variants']);

        return response()->json($product);
    }
     private function generateProductCode(): string
    {
        do {
            $code = (string) random_int(100000, 999999);
        } while (Product::where('product_code', $code)->exists());

        return $code;
    }

    // Register a new product
       public function store(Request $request)
    {
        $hasSizes = $request->input('has_sizes') === 'yes';

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                'unique:products,name',
            ],
            'category_id' => [
                'required',
                'integer',
                'exists:categories,id',
            ],
            'description' => [
                'required',
                'string',
                'max:250',
            ],
            'image' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],
            'has_sizes' => [
                'required',
                Rule::in(['yes', 'no']),
            ],
            'price' => [
                Rule::requiredIf(!$hasSizes),
                'nullable',
                'numeric',
                'min:0.01',
            ],
            'variants' => [
                Rule::requiredIf($hasSizes),
                'nullable',
                'array',
                'min:1',
            ],
            'variants.*.size_name' => [
                'required',
                'string',
                'max:30',
                'distinct:ignore_case',
            ],
            'variants.*.price' => [
                'required',
                'numeric',
                'min:0.01',
            ],
        ]);

        $imagePath = $request->file('image')->store('products', 'public');

        try {
            $product = DB::transaction(function () use (
                $validated,
                $hasSizes,
                $imagePath
            ) {
                $product = Product::create([
                    'category_id' => $validated['category_id'],
                    'name' => $validated['name'],
                    'product_code' => $this->generateProductCode(),
                    'description' => $validated['description'],
                    'price' => $hasSizes ? null : $validated['price'],
                    'has_sizes' => $hasSizes,
                    'image' => $imagePath,
                    'status' => 'available',
                ]);

                if ($hasSizes) {
                    foreach ($validated['variants'] as $variant) {
                        $product->variants()->create([
                            'size_name' => trim($variant['size_name']),
                            'price' => $variant['price'],
                        ]);
                    }
                }

                return $product->load(['category', 'variants']);
            });
        } catch (\Throwable $e) {
            Storage::disk('public')->delete($imagePath);
            throw $e;
        }

        return response()->json([
            'message' => 'Product registered successfully!',
            'product' => $product,
        ], 201);
    }
    // Update product information
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => ['sometimes', 'required', 'exists:categories,id'],

            'name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'name')->ignore($product->id),
            ],

            'description' => ['sometimes', 'required', 'string'],

            'has_sizes' => ['sometimes', 'required', 'boolean'],

            'price' => ['nullable', 'numeric', 'min:0'],

            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $hasSizes = $validated['has_sizes'] ?? $product->has_sizes;

        if ($hasSizes && !$product->has_sizes) {
            return response()->json([
                'message' => 'Add product variants before enabling multiple sizes.',
            ], 422);
        }

        if (!$hasSizes && $product->has_sizes) {
            return response()->json([
                'message' => 'Remove the existing variants before switching to a single price.',
            ], 422);
        }

        if (!$hasSizes && !isset($validated['price']) && !$product->has_sizes) {
            return response()->json([
                'message' => 'A product price is required.',
            ], 422);
        }

        $oldImage = $product->image;

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('products', 'public');
        }

        $product->update($validated);

        if ($request->hasFile('image') && $oldImage) {
            Storage::disk('public')->delete($oldImage);
        }

        return response()->json([
            'message' => 'Product updated successfully!',
            'product' => $product->fresh(['category', 'variants']),
        ]);
    }

    // Delete a product
    public function destroy(Product $product)
    {
        $image = $product->image;

        $product->delete();

        if ($image) {
            Storage::disk('public')->delete($image);
        }

        return response()->json([
            'message' => 'Product deleted successfully!',
        ]);
    }

public function toggleAvailability(Request $request, Product $product)
{
    // Only admins may change product availability.
    abort_unless($request->user()->role === 'admin', 403);

    $validated = $request->validate([
        'status' => ['required', 'in:available,unavailable'],
    ]);

    $product->update([
        'status' => $validated['status'],
    ]);

    return response()->json([
        'message' => 'Product availability updated successfully.',
        'status' => $product->status,
    ]);
}
}
