<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Models\Crud;


class CrudController extends Controller {

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $crud = Crud::all();
        return view('home')->with(compact('crud'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);
        $crud = Crud::create($data);

        return Response::json($crud);
    }

}
