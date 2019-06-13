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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fileReference.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|max:50',
        //     'mime' => 'required|max:255',
        // ]);
        var_dump($request->files);
        $fileReference = FileReference::create($request->all());

        // $where = array('id' => $request->id);
        // $fileReference = FileReference::where($where)->first();
        //
        // if($fileReference===null)
        // {
        //   $fileReference = new FileReference();
        //   $fileReference->name = $request->name;
        //   $fileReference->description = $request->description;
        //   $fileReference->mime = $request->files->getMimeType();
        //   $fileReference->save();
        //   // $fileReference = FileReference::create($request->all());
        // }

        // $fileStorage = new FileStorage();
        // $fileStorage->data_chunk=file_get_contents($request->files);
        // $fileStorage->save();

        return Redirect::to('fileReference')->with('success', 'Great! fileReference created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fileReference  $fileReference
     * @return \Illuminate\Http\Response
     */
    public function show(fileReference $fileReference)
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
        'name' => 'required|max:50',
        'mime' => 'required|max:255',
    ]);

        $update = ['name' => $request->name, 'mime' => $request->mime];
        FileReference::where('id', $id)->update($update);

        return Redirect::to('fileReference')
  ->with('success', 'Great! fileReference updated successfully');
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
