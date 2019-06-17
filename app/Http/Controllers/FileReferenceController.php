<?php

namespace App\Http\Controllers;

use App\FileReference;
use Illuminate\Http\Request;
use Redirect;

class FileReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['fileReference'] = FileReference::paginate(10);

        return view('fileReference.list', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:500',
        ]);

        $fileReference = FileReference::create($request->all());

        return Redirect::to('fileReference')->with('success', 'Great! fileReference created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('id' => $id);
        $data['fileReference_info'] = FileReference::where($where)->first();

        return view('fileReference.edit', $data);
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
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:500',
        ]);

        $update = ['name' => $request->name,'description' => $request->description];
        FileReference::where('id', $id)->update($update);

        return Redirect::to('fileReference')->with('success', 'Great! fileReference updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FileReference::where('id', $id)->delete();

        return Redirect::to('fileReference')->with('success', 'fileReference deleted successfully');
    }
}
