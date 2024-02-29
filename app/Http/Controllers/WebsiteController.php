<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $website = Website::latest()->first();

        return view('admin.website', compact('website'));
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
    public function show(Website $website)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Website $website)
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
            'title_home' => 'max:255',
            'body' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'error',
                'data' => $validator->errors(),
            ]);
        }

        $data = $request->all();
        $product = Website::find($id);
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
    public function destroy(Website $website)
    {
        //
    }
}
