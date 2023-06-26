<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
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

        Experience::create($validatedData);

        return redirect('/admin/profiles/'.$request['profile_id'])->with('createExperience', 'Data experience has been added');
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
    public function update(Request $request, Experience $experience)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'start_at' => 'required',
            'end_at' => 'required',
            'place' => 'required',
            'description' => 'required',
        ]);

        Experience::where('id', $experience->id)->update($validatedData);

        return redirect('/admin/profiles/'.$request['profile_id'])->with('updateExperience', 'Data experience has been update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience, Request $request)
    {
        Experience::destroy($experience->id);
		return redirect('/admin/profiles/'.$request['profile_id'])->with('deleteExperience', 'Data experience has been deleted');

    }
}
