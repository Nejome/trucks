<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{

    public function index() {

        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));

    }

    public function edit(Category $category) {

        return view('admin.categories.edit', compact('category'));

    }

    public function update(Request $request, Category $category) {

        $this->validate($request, [
            'title' => 'required'
        ]);

        if($category->title == $request->title) {

            return redirect(url('/admin/categories'));

        }

        $exist_category = Category::where('title', $request->title)->first();

        if($exist_category){

            session()->flash('category_exist', 'عفوا تم استخدام العنوان الذي ادخلته من قبل');

            return redirect()->back();

        }

        $category->title = $request->title;
        $category->save();

        session()->flash('category_updated', 'تم تعديل اسم التصنيف بنجاح');

        return redirect(url('admin/categories'));

    }

}
