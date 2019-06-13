<?php

namespace App\Http\Controllers;

use App\FileStorage;
use App\FileReference;
use Illuminate\Http\Request;

class FileStorageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fileStorage.upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FileStorage  $fileStorage
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $files = $request->file('files');
        $file = $files[0];
// dd($file1);
        $request->files;

        $where = array('id' => $request->id);
        $fileReference = FileReference::where($where)->first();

        if($fileReference===null)  {
          $fileReference = new FileReference();
          $fileReference->name = $file->getClientOriginalName();
          $fileReference->mime = $file->getMimeType();
          $fileReference->save();
        }
        // $fileReference = FileReference::create($request->all());


        $fileStorage = new FileStorage();
        $fileStorage->data_chunk=file_get_contents($file);

        $fileReference->fileStorage()->save($fileStorage);
        // $fileStorage->save();

        return response()->json(array('files' => $fileReference->id), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function done()
    {
        //
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FileStorage  $fileStorage
     * @return \Illuminate\Http\Response
     */
    public function rollback()
    {
        //
    }
}
