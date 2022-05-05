<?php

namespace App\Http\Controllers\api;

use App\Functional;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FunctionalResource;
use Symfony\Component\HttpFoundation\Response;

class FunctionalAPIController extends Controller
{
    public function index()
    {
        $functional = Functional::all();
        return FunctionalResource::collection($functional);
        // return Functional::all();
    }

    public function store(Request $request)
    {
        $functional = new Functional;
        $functional->functional_area = $request->functional_area;
        $functional->save();

        return new FunctionalResource($functional);
        // return $functional;
    }

    public function update(Functional $functional, Request $request)
    {
        // return $functional;

        $functional->update($request->all());

        return response([
            'data' => new FunctionalResource($functional)
        ], Response::HTTP_CREATED);



        // Functional::where('id', $id)
        // ->update(['functional_area' => $request->input('functional_area')]);

        // return Functional::find($id);
    }

    public function destroy(Functional $functional)
    {
        // return $functional;
        $functional->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }

    // public function destroy($id)
    // {
    //     Functional::find($id)->delete();
    // }
}