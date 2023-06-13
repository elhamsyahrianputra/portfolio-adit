<?php

namespace App\Http\Controllers\Admin;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.portfolio.index', [
            'portfolios' => Portfolio::all(),
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
            'portfolio_image' => 'image|file|required',
            'description' => 'required',
            'category' => 'required',
            'project_date' => 'required',
            'project_url' => 'string',
            'client_project' => 'string',
        ]);

        $validatedData['profile_id'] = auth()->user()->profile->id;

        if ($request->file('portfolio_image')) {
            $validatedData['portfolio_image'] = $request->file('portfolio_image')->store('portfolio/portfolio-image');
        };

        Portfolio::create($validatedData);

        return redirect('/admin/portfolios')->with('success', 'Data portfolios has been update');
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
    public function update(Request $request, Portfolio $portfolio)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'portfolio_image' => 'image|file',
            'description' => 'required',
            'category' => 'required',
            'project_date' => 'required',
            'project_url' => '',
            'client_project' => '',
        ]);



        if ($request->file('portfolio_image')) {
            Storage::delete($request->old_image);
            $validatedData['portfolio_image'] = $request->file('portfolio_image')->store('portfolio/portfolio-image');
        }

        Portfolio::where('id', $portfolio->id)->update($validatedData);

        return redirect('/admin/portfolios')->with('success', 'Data portfolio has been update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        Portfolio::destroy($portfolio->id);
        Storage::delete($portfolio->portfolio_image);
		return redirect('/admin/portfolios')->with('success', 'Data portfolio has been deleted');
    }
}
