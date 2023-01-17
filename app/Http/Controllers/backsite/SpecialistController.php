<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// use libary here
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

//use rqeuest here
use App\Http\Requests\Specialist\StoreSpecialistRequest;
use App\Http\Requests\Specialist\UpdateSpecialistRequest;

// use everything here
use Gate;
use Auth;

//use model here
use App\Models\MasterData\Specialist;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialist = Specialist::all();
        return view('pages.backsite.master-data.specialist.index', compact('specialist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpecialistRequest $request)
    {
        // get all request from frontsite
        $data = $request->all();

        // re format before push to table
        $data['price'] = str_replace(',', '', $data['price']);
        $data['price'] = str_replace('IDR ', '', $data['price']);

        // store to database
        $specialist = Specialist::create($data);

        alert()->success('Success Message', 'Successfully added new specialist');
        return redirect()->route('backsite.specialist.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }
}
