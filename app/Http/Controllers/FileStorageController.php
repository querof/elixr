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

        $where = array('id' => $request->fileReferenceId);
        $fileReference = FileReference::where($where)->first();

        if (collect($fileReference)->isEmpty()) {
            $fileReference = new FileReference();
            $fileReference->name = $file->getClientOriginalName();
            $fileReference->mime = $file->getMimeType();
            $fileReference->description = $file->getClientOriginalName();
            $fileReference->save();
        }

        $fileStorage = new FileStorage();
        $fileStorage->data_chunk= base64_encode(file_get_contents($file));
        $fileReference->fileStorage()->save($fileStorage);
        $fileStorage->save();

        return response()->json(array('fileReferenceId' => $fileReference->id,'fr'=>$fileReference,'frid'=>$request->fileReferenceId), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download($fileReferenceId)
    {
        $where = array('id' => $fileReferenceId);
        $fileReference = FileReference::where($where)->first();

        $where = array('file_reference_id' => $fileReference->id);
        $fileStorage = FileStorage::where($where)->get(['id', 'file_reference_id']);

        $this->streamResponse($fileReference, $fileStorage);
        // return response();
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


    /**
     * Método que busca en la tabla almacen_a_achivos un registro en particular
     * usando para ello el PK (aar_id/AarId).
     *
     * @param String $key valor del PK del chunk a buscar.
     * @return Object AlmacenArchivos $almacenArchivos.
     */
    private function searchFileStorageByPK($id)
    {
        $where = array('id' => $id);
        $fileStorage = FileStorage::where($where)->first();

        return base64_decode($fileStorage->data_chunk);
    }

    /**
   * Método que trasmite desde el servidor Web cada chunk asociado a un archivo. Para ellos busca cada chunk
   * por separado en la base de datos, lo trasmite y limpia el buffer.
   *
   * @param $almacenArchivos Array, contiene todos los aar_id correspondientes a un indice en específico.
   * @return Chunks al buffer.
   */
    private function streamResponse($fileReference, $fileStorage)
    {
        header("Content-Type: ".$fileReference->mime);
        header('Content-Disposition: attachment; filename="'.$fileReference->name.'" ');
        // header('Content-length='.$fileReference->size);

        foreach ($fileStorage as $key => $value) {
            echo $this->searchFileStorageByPK($value->id);
            ob_flush();
            flush();
        }
    }

    private function file_get_contents_utf8($fn)
    {
        $content = file_get_contents($fn);
        return mb_convert_encoding(
            $content,
            'UTF-8',
            mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true)
        );
    }
}
