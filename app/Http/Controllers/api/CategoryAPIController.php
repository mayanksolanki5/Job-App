<?php

namespace App\Http\Controllers\api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategoryAPIController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->job_category = $request->job_category;
        $category->save();

        return $category;
    }

    // public function update(Request $request, Category $category)
    // {
    //     return $category;
        
    //     $update = Category::where('id', $id)
    //     ->update(['job_category' => $request->input('job_category')]);
    // }


    public function update(Request $request, $id)
    {
        $update = Category::where('id', $id)
        ->update(['job_category' => $request->input('job_category')]);


        // return response([
        //     'data' => $request
        // ], Response::HTTP_CREATED);

        // return Category::find($id);
    }
    
    public function destroy($id)
    {
        Category::find($id)->delete();
    }
}
