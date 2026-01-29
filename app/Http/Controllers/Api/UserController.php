<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends Controller
{

//9|Tbl90qhUduZ1bMvfUMMwM66p3mejXx62eRYqeJ542e9c5972
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return new JsonResponse([
            'success' => true,
            'data' => [
                'type' => 'user',
                'id' =>  $request->user()->id,
                'attributes' => [
                'name' =>  $request->user()->name,
                'email' =>  $request->user()->email,
                ],
            ],
        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
