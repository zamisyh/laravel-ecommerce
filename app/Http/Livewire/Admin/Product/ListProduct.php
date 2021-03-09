<?php

namespace App\Http\Livewire\Admin\Product;

use App\Imports\ProductImport;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;
use App\Jobs\ProductJob;
use Maatwebsite\Excel\Facades\Excel;


class ListProduct extends Component
{

    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $isFormCreate = 0;
    public $dataCategory;
    public $name, $category, $description, $weight, $price, $image, $status, $file_excel;
    public $search;
    public $product_id;
    public $mass, $massOpenForm;

    public function render()
    {
        $product = null;
        $cat = null;


        if($this->search){
            $product = Product::where('name', 'LIKE', '%' . $this->search . '%')->with('category')->orderBy('created_at', 'DESC')->paginate(5);
        }else{
            $product = Product::with('category')->orderBy('created_at', 'DESC')->paginate(5);

        }
        return view('livewire.admin.product.list-product', compact('product'))->extends('layouts.app')->section('content');
    }

    public function openFormCreate() { $this->isFormCreate = true; }
    public function closeFormCreate() { $this->isFormCreate = false;  }

    //Show Create Form
    public function create()
    {
        $this->mass = true;
        $this->dataCategory = Category::orderBy('created_at', 'DESC')->get();
        $this->openFormCreate();
    }

    public function createMass()
    {

        $this->massOpenForm = true;
        $this->dataCategory = Category::orderBy('created_at', 'DESC')->get();
        $this->openFormCreate();

    }


    public function store()
    {
        $this->validate([
            'name' => 'required|max:100',
            'category' => 'required',
            'description' => 'required',
            'weight' => 'required|integer',
            'price' => 'required|integer',
            'image' => 'required|file|image|mimes:jpeg,jpg,png'
        ]);

        try {

            $nameFile = strtolower(Str::slug($this->name)).'-'.time().'.'.$this->image->getClientOriginalExtension();
            $path = 'assets/images/product';

            $this->image->storeAs('public/images/product', $nameFile);

            $id = Product::max('id') == 0 ? 1 : Product::max('id') + 1;


            Product::create([
                'id' => $id,
                'name' => $this->name,
                'category_id' => $this->category,
                'description' => $this->description,
                'weight' => $this->weight,
                'price' => intval($this->price),
                'slug' => strtolower(Str::slug($this->name)),
                'image' => $nameFile
            ]);

            session()->flash('successCreate', 'Product succesfully created!');
            $this->resetForm();
            $this->closeFormCreate();

        } catch (Exception $e) {
            return dd($e->getMessage);
        }

    }

    public function storeMass()
    {
        $this->validate([
            'category' => 'required',
            'file_excel' => 'required|file|mimes:xlsx'
        ]);

        if($this->file_excel){
            $file = $this->file_excel;
            $filename = time() . '-product.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads', $filename);

            ProductJob::dispatch($this->category, $filename);

        }

        session()->flash('successUpload', 'Successfully upload file');
        $this->massOpenForm = false;
        $this->mass = false;
        $this->closeFormCreate();

    }

    public function resetForm()
    {
         $this->resetErrorBag();
         $this->resetValidation();
         $this->reset();
    }

    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        $this->dataCategory = Category::orderBy('created_at', 'DESC')->get();
        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->weight = $product->weight;
        $this->price = $product->price;
        $this->image = $product->image;
        $this->openFormCreate();


    }

    public function update($id)
    {

        $this->validate([
            'name' => 'required|max:100',
            'category' => 'required',
            'description' => 'required',
            'weight' => 'required|numeric',
            'price' => 'required|numeric',
            'status' => 'required',
            'image' => 'required|file|image|mimes:jpeg,jpg,png'
        ]);

        $product = Product::where('id', $id)->first();

        $photo = $product->image;

        if ($this->image) {
            !empty($photo) ? File::delete(public_path('storage/images/product/' . $photo)) : null;

            $photo = strtolower(Str::slug($this->name)).'-'.time().'.'.$this->image->getClientOriginalExtension();
            $path = 'assets/images/product';

            $this->image->storeAs('public/images/product', $photo);

        }

        $product->name = $this->name;
        $product->category = $this->category;
        $product->description = $this->description;
        $product->weight = $this->weight;
        $product->price = $this->price;
        $product->image = $photo;
        $product->status = $this->status;

        $product->save();

        session()->flash('successUpdate', $this->name . ' Updated!');
        $this->closeFormCreate();
        $this->resetForm();
    }

    public function delete($id)
    {

        $product = Product::where('id', $id)->first();
        $product->delete();

        if(!empty($product->image)){
            File::delete(public_path('storage/images/product/' . $product->image));
        }



        session()->flash('successDelete', 'Product ' . $product->name . ' Successfully delete');

    }

}
