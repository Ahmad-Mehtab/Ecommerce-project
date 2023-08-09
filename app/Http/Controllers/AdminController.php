<?php

namespace App\Http\Controllers;
use App\Models\Category;
// use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
// use App\Requests\CategoryFormRequest;

class AdminController extends Controller
{
    public function show_categories_record(){
    $category_record = Category::orderByDesc('id')->get();
    $data['category_record'] = $category_record;
    return view('admin.admin_side.add_category',$data);
    }

    public function add_category(request $request){
        $category = new category;
        if ($request->hasFile('image')) {
        $image = $request->image;
        $imageName=time().'.'.$image->getClientOriginalExtension();
        // Image::make($avatar)->resize(150, 150)->save(public_path('doctors/' . $imageName));
        $request->image->move('user_assets\img',$imageName);
        }
        $category->image = $imageName;
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status == true ? '1': '0';
        $category->meta_title = $request->meta_title;
        $category->Meta_desc = $request->Meta_desc;
        $category->meta_keyword = $request->meta_keyword;
        
        $category->save();
        return redirect()->back()->with('message',"your data has been saved");
    }

    public function edit_category($id){
       $cate =  Category::find($id);
       if (is_null($cate)) {
        return redirect()->back();
    } else {
        return view('admin.admin_side.add_category_edit')->with('cate', $cate);
    }
    }

    public function category_update(request $request, $cate_id){
        
        $category = category::findOrFail($cate_id);
       
        if ($request->hasFile('image')) {
           $path   =  'user_assets/img/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        $image = $request->image;
        $imageName=time().'.'.$image->getClientOriginalExtension();
        // Image::make($avatar)->resize(150, 150)->save(public_path('doctors/' . $imageName));
        $request->image->move('user_assets/img/',$imageName);
        }
        $category->image = $imageName;
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->status == true ? '1': '0';
        $category->meta_title = $request->input('meta_title');
        $category->Meta_desc = $request->input('Meta_desc');
        $category->meta_keyword = $request->input('meta_keyword');
        $category->save();
        return redirect('/admin/category')->with('message',"your data has been updated");
    }
}
