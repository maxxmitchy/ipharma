<?php

namespace App\Http\Livewire\Modal;

use App\Models\Product;
use App\Models\Category;
use App\Events\CreateProduct;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class AddProductForm extends ModalComponent
{
    use WithFileUploads;

    public $section_id = 1;
    public $brand_id = 1;
    public $category_id = 1;
    public $currentProduct;
    public $product_name = "";
    public $product_description;
    public $sub_images = [];
    public $main_image;
    public $meta_title, $meta_keywords, $meta_description;
    public $allfiles;
    public $selection = [];
    public $discount_id;
    public $manufacturing_date, $expiry_date;
    public bool $ingredient = false;
    public bool $attribute = false;

    public function mount()
    {
        $this->attribute = session()->exists('attributes') ?: false;
    }

    public function resetForm()
    {
        session()->forget(['attributes','ingredients[]']);
    }

    public $listeners = [
        'productAttributeEvent' => 'updateAttribute',
        'productIngreedientsEvent' => 'updateIngredient',
    ];

    public function updateAttribute()
    {
        $this->attribute = true;
    }

    public function updateIngredient()
    {
        $this->ingredient = true;
    }

    public function rules()
    {
        return [
            'product_name' => ['required','string','max:255','unique:products'],
            'section_id' => ['required'],
            'category_id' => ['required'],
            'brand_id' => ['required'],
            'product_description' => ['required','max:255'],
            'meta_title' => ['required'],
            'meta_keywords' => ['required'],
            'meta_description' => ['required'],
            'ingredient' => ['required'],
            'attribute' => ['required'],
        ];
    }

    public function updateAction()
    {

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public function render()
    {
        $categorylevel = Category::MainCategories($this->section_id)->with('subcategories', 'section')->get();

        return view('livewire.modal.add-product-form', [
            'productAttribute' => $this->attribute,
            'productIngredient' => $this->ingredient,
            'categorylevel' => $categorylevel
        ]);
    }

    public function toggle(Product $product)
    {
        $product->update([
            'status' => !$product->status,
        ]);
    }

    public function store()
    {
        if(empty($this->allfiles)){

            $files = collect();

            $files->put('main_image', [
                    'name' => $this->main_image->getClientOriginalName(),
                    'path' => $this->main_image->getRealPath(),
            ]);

            collect($this->sub_images)->each(fn($image) =>
                $files->put('sub_image-' . $image->getClientOriginalName(), [
                    'name' => $image->getClientOriginalName(),
                    'path' => $image->getRealPath(),
                ])
            );

            $this->allfiles = $files;

        }

        CreateProduct::dispatch($this);

        $this->reset();

        $this->closeModal();

    }
}
