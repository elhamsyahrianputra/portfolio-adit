<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.video.index', [
            'videos' => Video::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.video.create', [
            
        ]);
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
            'cover_url' => 'image|file|required',
            'video_url' => 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi,video/x-matroska',
            'title' => 'unique:articles|required',
            'author' => 'required',
            'text' => 'required',
        ]);

        if ($request->file('cover_url')) {
            $validatedData['cover_url'] = $request->file('cover_url')->store('video/cover-image');
        }

        if ($request->file('video_url')) {
            $validatedData['video_url'] = $request->file('video_url')->store('video/video-file');
        }

        $validatedData['slug'] = Str::slug($validatedData['title']);

        Video::create($validatedData);

        return redirect('/admin/videos')->with('createVideo', 'Data video has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('admin.video.show', [
            'video' => $video,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.video.edit', [
            'video' => $video,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $rules = [
            'cover_url' => 'image|file',
            'video_url' => 'mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            'article_image' => 'image|file',
            'author' => 'required',
            'text' => 'required',
        ];

        if ($request->title != $video->title){
            $rules['title'] = 'required|unique:articles';
        }else{
            $rules['title'] = 'required';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('cover_url')) {
            Storage::delete($request->old_image);
            $validatedData['cover_url'] = $request->file('cover_url')->store('video/cover-image');
        }
        if ($request->file('video_url')) {
            Storage::delete($request->old_video);
            $validatedData['video_url'] = $request->file('video_url')->store('video/video-file');
        }

        $validatedData['slug'] = Str::slug($validatedData['title']);

        Video::where('id', $video->id)->update($validatedData);

        return redirect('/admin/videos')->with('updateVideo', 'Data video has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        Video::destroy($video->id);
        Storage::delete($video->cover_url);
        Storage::delete($video->video_url);
		return redirect('/admin/videos')->with('deleteVideo', 'Data video has been deleted');
    }
}
