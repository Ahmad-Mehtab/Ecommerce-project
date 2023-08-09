<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = "boostrap";
    public $brand, $slug, $status, $brandId;

    public function rules()
    {
        return [
            'brand' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable'
        ];
    }
    public function resetBrandInput()
    {
        $this->brand = NULL;
        $this->slug = NULL;
        $this->status = NULL;
        $this->brandId = NULL;
    }

    public function storeBrand()
    {
        $validatedData =  $this->validate();
        brand::create([
            'brand' => $this->brand,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0'
        ]);
        session()->flash('message', 'Brand added successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetBrandInput();
    }

    public function deleteRecord($brandId)
    {   
      
        $this->brandId = $brandId;
        
    }
    public function destroyRecord()
    {   
        
          brand::findOrFail($this->brandId)->delete();
         session()->flash('message', 'Brand Deleted successfully');
         $this->dispatchBrowserEvent('close-modal');
         $this->resetBrandInput();
  
    }
    public function editRecord(int  $brandId)
    {   $this->brandId = $brandId;
        $brand = brand::findOrFail($this->brandId);
        $this->brand = $brand->brand;
        $this->slug = $brand->slug;
        $this->status = $brand->status;
    }
    public function updateBrand(){
     
        $validatedData =  $this->validate();
        brand::findOrfail($this->brandId)->update([
            'brand' => $this->brand,
            'slug' => Str::slug($this->slug),
            'status' => $this->status == true ? '1' : '0'
        ]);
        session()->flash('message', 'Brand updated successfully');
        $this->dispatchBrowserEvent('close-modal');
        $this->resetBrandInput();
     }
    public function closeModal()
    {
       $this->resetBrandInput();
    }
    public function openModal()
    {
       $this->resetBrandInput();
    }
    public function render()
    {
        $brands  =  Brand::orderBy('id', 'DESC')->paginate(5);
        return view('livewire.admin.brand.index', ['brands' => $brands])->extends('admin.layouts.main')->section('content');
    }
}
