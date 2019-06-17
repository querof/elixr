<?php

namespace App\Http\Controllers;

use App\FileStorage;
use App\FileReference;
use Illuminate\Http\Request;

class FileStorageController extends Controller
{


    /**
     * Upload the files, and store in the database.
     *
     * @param  Illuminate\Http\Request;
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
     * Return file to be download.
     *
     * @param  Integer  $fileReferenceId.
     * @return \Illuminate\Http\Response
     */
    public function download($fileReferenceId)
    {
        $where = array('id' => $fileReferenceId);
        $fileReference = FileReference::where($where)->first();

        $where = array('file_reference_id' => $fileReference->id);
        $fileStorage = FileStorage::where($where)->get(['id', 'file_reference_id']);

        $this->streamResponse($fileReference, $fileStorage);
    }


    /**
     * Return one chunk at time, by pk
     *
     * @param Integer $id. Pk of fileStorage.
     * @return Binary.
     */
    private function searchFileStorageByPK($id)
    {
        $where = array('id' => $id);
        $fileStorage = FileStorage::where($where)->first();

        return base64_decode($fileStorage->data_chunk);
    }

    /**
   * Method that send file chunks throug the buffer(chunk by chunk).
   *
   * @param $fileReference. FileReference Object.
   * @param $fileStorage. FileStorage Object.
   * @return binary Chunks in buffer.
   */
    private function streamResponse($fileReference, $fileStorage)
    {
        header("Content-Type: ".$fileReference->mime);
        header('Content-Disposition: attachment; filename="'.$fileReference->name.'" ');

        foreach ($fileStorage as $key => $value) {
            echo $this->searchFileStorageByPK($value->id);
            ob_flush();
            flush();
        }
    }
}
