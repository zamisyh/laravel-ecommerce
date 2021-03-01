<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category as ModelCategory;
use Illuminate\Support\Str;
use Livewire\WithPagination;


class Category extends Component
{
    // protected $queryString = [;]

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $isFormCreate = 0;
    public $category, $parent_id;
    public $category_id;

    public $search;
    public $page = 1;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];


    public function render()
    {

        $data = null;

        if($this->search){
            $data = ModelCategory::where('category', 'LIKE', '%' . $this->search . '%')->with(['parent'])->orderBy('created_at', 'DESC')->paginate(10);
        }else{
            $data = ModelCategory::with(['parent'])->orderBy('created_at', 'DESC')->paginate(10);
        }
        $parent = ModelCategory::getParent()->orderBy('name', 'ASC')->get();
        return view('livewire.admin.category.category', compact('data', 'parent'))->extends('layouts.app')->section('content');
    }


    // public function mount(ModelCategory $catid)
    // {
    //     $this->catid = $catid;
    // }

    //Create Category
    public function create() { $this->openFormCreate();}
    public function closeFormCreate(){ $this->isFormCreate = false; }
    public function openFormCreate(){ $this->isFormCreate = true; }

    public function resetForm()
    {
         $this->resetErrorBag();
         $this->resetValidation();
         $this->reset();
    }

    public function store()
    {
        $this->validate([
            'category' => 'required|max:50|unique:categories'
        ]);


       try {
            // $slug = Str::slug($this->category);

            $dataId = ModelCategory::max('id') == 0 ? 1 : ModelCategory::max('id') + 1;


            ModelCategory::create([
                'id' => $dataId,
                'category' => $this->category,
                'parent_id' => $this->parent_id,
                'slug' => Str::slug(strtolower($this->category)),

            ]);

             session()->flash('successCreate', $this->category . ' Saved!');

             $this->closeFormCreate();
             $this->resetForm();
       } catch (Exception $e) {
            return $e->getMessage();
       }
    }

    public function edit($id)
    {

        $data = ModelCategory::where('id', $id)->first();
        $this->category_id = $data->id;
        $this->category = $data->category;
        $this->parent_id = $data->parent_id;
        $this->openFormCreate();
    }

    public function update($id)
    {
        $data = ModelCategory::where('id', $id)->first();
        $data->category = $this->category;
        $data->parent_id = $this->parent_id;
        $data->save();

        session()->flash('successUpdate', $this->category . ' Updated!');
        $this->closeFormCreate();


    }

    public function delete($id)
    {
        $data = ModelCategory::where('id', $id)->first();
        $data->delete();

        session()->flash('successDelete', $data->category. ' Deleted');
    }
}
