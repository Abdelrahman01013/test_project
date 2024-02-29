<?php

namespace App\Http\Controllers;

use App\Models\Welcom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WelcomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $welcom = Welcom::latest()->first();
        return view('admin.welcom', compact('welcom'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Welcom $welcom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Welcom $welcom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title_page' => 'required|max:255',
            'welcom_to' => 'required|max:255',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'error',
                'data' => $validator->errors(),
            ]);
        }

        $data = $request->all();
        $product = Welcom::find($id);
        if ($request->has('photo')) {
            $productOldPath = "build/assets/imgs/" . $product->photo;
            $file = $request->photo;
            $name = time() . $file->getClientOriginalName();
            $file->move('build/assets/imgs/', $name);
            $data['photo'] = $name;
            if (file_exists($productOldPath)) {
                unlink($productOldPath);
            }
        };


        if ($product->update($data)) {
            return response()->json([
                'msg' => 'success',
                'name' => $request->name

            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Welcom $welcom)
    {
        //
    }
}
