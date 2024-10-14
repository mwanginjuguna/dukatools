<?php

namespace App\Livewire\Products;

use App\Livewire\Forms\ProductEditForm;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductImages;
use App\Models\ProductVariation;
use App\Models\ReturnPolicy;
use App\Models\SubCategory;
use App\Models\Supplier;
use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Js;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public ProductEditForm $form;

    public object $product;

    public mixed $productImage = null;
    public $productImages;

    public string $productFeatureTitle = '';
    public string $productFeatureDescription = '';
    public bool $showProductEditForm = false;

    public function mount(Product $product)
    {
        $this->product = Product::query()
            ->with(['productFeatures', 'productImages', 'productReviews', 'productRatings'])
            ->where('id', $product->id)
            ->first();

        $this->form->name = $this->product->name;
        $this->form->brandId = $this->product->brand_id;
        $this->form->categoryId = $this->product->category_id;
        $this->form->subCategoryId = $this->product->sub_category_id;
        $this->form->returnPolicyId = $this->product->return_policy_id ?? 0;
        $this->form->supplierId = $this->product->supplier_id ?? 0;
        $this->form->manufacturerId = $this->product->manufacturer_id ?? 0;
        $this->form->price = $this->product->price;
        $this->form->description = $this->product->description;
        $this->form->stockQuantity = $this->product->stock_quantity;
        $this->form->shippedFrom = $this->product->shipped_from;
        $this->form->image = $this->product->image;
        $this->form->sku = $this->product->sku ?? '';
        $this->form->supplierSku = $this->product->supplier_sku ?? '';
    }

    public function productUpdate()
    {
        if (!is_null($this->productImage)) {
            $imagePath = Storage::disk('public')
                ->putFileAs(
                    'products',
                    $this->productImage,
                    $this->productImage->getClientOriginalName()
                );

            $this->form->image = $imagePath;
        }

        $this->form->update($this->product);

        $this->dispatch('product-updated');
    }

    public function addProductFeature()
    {
        ProductFeature::create([
            'title' => $this->productFeatureTitle,
            'description' => $this->productFeatureDescription,
            'product_id' => $this->product->id,
        ]);

        $this->dispatch('feature-added');
    }

    public function uploadProductImages()
    {
        if (!is_null($this->productImages)) {
            Arr::map($this->productImages, function($image) {
                $imageUrl = Storage::disk('public')->putFileAs(
                    'products',
                    $image,
                    $image->getClientOriginalName()
                );

                ProductImages::create([
                    'image_location' => $imageUrl,
                    'product_id' => $this->product->id
                ]);
            });
        }
        $this->productImages = null;
    }

    public function deleteProductImage($id)
    {
        $im = ProductImages::where('id',$id)->first();
        Storage::disk('public')->delete($im->image_location);
        $im->delete();

        $this->dispatch('image-deleted');
    }


    public function deleteUploadedImage($imgUrl)
    {
        $image = Arr::first($this->productImages, function ($img) use ($imgUrl) {
            return $img->temporaryUrl() === $imgUrl;
        });
        if ($image) {
            $this->productImages = Arr::except($this->productImages, $image);
        }
    }


    public function deleteProduct($id)
    {
        $pr = Product::findOrFail($id);
        $pr->delete();

        $this->dispatch('product-deleted');

        $this->redirectRoute('admin.products');
    }

    /**
     * Show edit form
     */
    public function showEditForm()
    {
        $this->showProductEditForm = true;
    }

    /**
     * Hide edit form and show product view
     */
    public function showProduct()
    {
        $this->showProductEditForm = false;
    }

    public function render()
    {
        return view('livewire.products.edit', [
            'brands' => Brand::query()->get(),
            'categories' => Category::query()->get(),
            'productImages' => ProductImages::where('product_id', $this->product->id)->get(),
            'productFeatures' => ProductFeature::where('product_id', $this->product->id)->get(),
            'productVariations' => ProductVariation::query()->where('product_id', $this->product->id)->get(),
            'tags' => Tag::query()->get(),
            'SubCategories' => SubCategory::query()->get(),
            'returnPolicies' => ReturnPolicy::query()->get(),
            'suppliers' => Supplier::query()->get(),
            'manufacturers' => Manufacturer::query()->get()
        ]);
    }
}
