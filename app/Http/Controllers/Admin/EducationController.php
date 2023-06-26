<?php

namespace App\Http\Controllers\Admin;

use App\Models\Education;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            'place' => 'required',
            'description' => 'required',
        ]);

        $validatedData['profile_id'] = $request['profile_id'];

        Education::create($validatedData);

        return redirect('/admin/profiles/'.$request['profile_id'])->with('createEducation', 'Data education has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            'place' => 'required',
            'description' => 'required',
        ]);

        Education::where('id', $education->id)->update($validatedData);

        return redirect('/admin/profiles/'.$request['profile_id'])->with('updateEducation', 'Data education has been update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education, Request $request)
    {
        Education::destroy($education->id);
		return redirect('/admin/profiles/'.$request['profile_id'])->with('deleteEducation', 'Data education has been deleted');
    }
}
