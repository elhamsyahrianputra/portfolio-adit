<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Collaboration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CollaborationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.collaboration.index', [
            'title' => '',
            'collaborations' => Collaboration::all(),
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
            'image_url' => 'image|file|required'
        ]);

        if ($request->file('image_url')) {
            $validatedData['image_url'] = $request->file('image_url')->store('collaboration/collaboration-image');
        }

        Collaboration::create($validatedData);

        return redirect('/admin/collaborations')->with('createCollaboration', 'Collaboration has been added');
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
    public function update(Request $request, Collaboration $collaboration)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'url' => 'required',
            'image_url' => 'file|image'
        ]);

        if ($request->file('image_url')) {
            Storage::delete($request->old_image);
            $validatedData['image_url'] = $request->file('image_url')->store('collaboration/collaboration-image');
        }

        Collaboration::where('id', $collaboration->id)->update($validatedData);

        return redirect('/admin/collaborations')->with('updateArticle', 'Collaboration has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collaboration $collaboration)
    {
        Collaboration::destroy($collaboration->id);
        Storage::delete($collaboration->image_url);
        return redirect('/admin/collaborations')->with('deleteCollaboration', 'Collaboration has been delated');
    }
}
