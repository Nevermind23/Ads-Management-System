<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClickController extends Controller
{
    // TODO make views
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $clicks = DB::table('clicks')->orderByDesc('created_at')->paginate(25);
        return view('click.index', compact('clicks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('click.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'request_id' => 'required|numeric|exists:requests,id',
            'banner_name' => 'required|string|max:30|unique',
            'click_cost' => 'required|numeric'
        ]);
        $click = DB::table('clicks')->insertGetId($data);

        return redirect(route('click.show', $click));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object
     */
    public function show($id)
    {
        $click = DB::table('clicks')->where('id', $id)->first();
        return view('click.show', compact('click'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $click = DB::table('clicks')->where('id', $id)->first();
        return view('click.edit', compact('click'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object
     */
    public function update(Request $request, $id)
    {
        $click = DB::table('clicks')->where('id', $id);
        $clickData = $click->first();
        $data = $request->validate([
            'request_id' => 'required|numeric|exists:requests,id',
            'banner_name' => 'required|string|max:30|unique:clicks,banner_name.'.$clickData->id,
            'click_cost' => 'required|numeric'
        ]);

        $click->update($data);

        return back()->with(['success' => 'Click info has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('clicks')->where('id', $id)->delete();
        return back()->with(['success' => 'Click has been deleted']);
    }
}
