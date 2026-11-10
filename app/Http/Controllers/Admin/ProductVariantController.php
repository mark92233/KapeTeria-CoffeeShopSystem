<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductVariantController extends Controller
{
    // Retrieve all variants belonging to a product
    public function index(Product $product)
    {
        return response()->json(
            $product->variants()->orderBy('id')->get()
        );
    }

    // Add a variant to a product
    public function store(Request $request, Product $product)
    {
        if (!$product->has_sizes) {
            return response()->json([
                'message' => 'This product does not support multiple sizes.',
            ], 422);
        }

        $validated = $request->validate([
            'size_name' => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        $variant = $product->variants()->create($validated);

        return response()->json([
            'message' => 'Product variant added successfully!',
            'variant' => $variant,
        ], 201);
    }

    // Update a variant
    public function update(
        Request $request,
        Product $product,
        ProductVariant $variant
    ) {
        if ($variant->product_id !== $product->id) {
            abort(404);
        }

        $validated = $request->validate([
            'size_name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('product_variants', 'size_name')
                    ->where('product_id', $product->id)
                    ->ignore($variant->id),
            ],
            'price' => ['required', 'numeric', 'min:0'],
        ]);

        $variant->update($validated);

        return response()->json([
            'message' => 'Product variant updated successfully!',
            'variant' => $variant,
        ]);
    }

    // Delete a variant
    public function destroy(Product $product, ProductVariant $variant)
{
    if ($variant->product_id !== $product->id) {
        abort(404);
    }

    if ($product->variants()->count() <= 1) {
        return response()->json([
            'message' => 'A product with multiple sizes must have at least one variant.',
        ], 422);
    }

    $variant->delete();

    return response()->json([
        'message' => 'Product variant deleted successfully!',
    ]);
}
}
