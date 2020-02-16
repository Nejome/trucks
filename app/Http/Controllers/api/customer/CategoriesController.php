<?php

namespace App\Http\Controllers\api\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{

    public function index() {

        $data['categories'] = Category::get('title');

        return response()->json(['message' => 'تم الحصول علي التصنيفات بنجاح', 'data' => $data, 'status' => 1]);

    }

}
