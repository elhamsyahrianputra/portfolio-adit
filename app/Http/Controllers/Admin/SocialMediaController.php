<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.social-media.index', [
            'title' => '',
            'socialmedias' => SocialMedia::all(),
        ]);
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
            'name' => 'required',
            'url' => 'required',
            'icon' => 'required',
        ]);

        SocialMedia::create($validatedData);

        return redirect('/admin/socialmedia')->with('createSocialMedia', 'Social Media has been added');
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
    public function update(Request $request, SocialMedia $socialmedia)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'url' => 'required',
            'icon' => 'required',
        ]);

        SocialMedia::where('id', $socialmedia->id)->update($validatedData);

        return redirect('/admin/socialmedia')->with('updateSocialMedia', 'Social Media has been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialMedia $socialmedia)
    {
        SocialMedia::destroy('id', $socialmedia->id);

        return redirect('admin/socialmedia')->with('deleteSocailMedia', 'Social Media has been Deleted');
    }
}
