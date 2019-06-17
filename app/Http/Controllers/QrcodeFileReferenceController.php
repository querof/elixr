<?php

namespace App\Http\Controllers;

use App\QrCodeFileReference;
use App\Qrcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class QrCodeFileReferenceController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $qrcodefileReference = new QrCodeFileReference();
        $qrcodefileReference->qrcodes_id = $request->qrcodeId;
        $qrcodefileReference->file_references_id = $request->fileReferenceId;
        $qrcodefileReference->save();

        return Redirect::to('qrcodeFileReference/'.$request->qrcodeId.'/edit')->with('success', 'Great! qrcodeFileReference created successfully.');
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

        $qrcode = Qrcode::where($where)->first();

        $data['qrcodeId'] = $id;
        $data['qrcodeName'] = $qrcode->title;



        $data['qrcodeFileReference_info']  =  $users = DB::select('select `qrfr`.`id`, `qrfr`.`qrcodes_id` as `qrid`, `fr`.`id` as `frid`, `fr`.`name`
                                                            					   from `qr_code_file_references` as `qrfr`
                                                            					   ,`file_references` as `fr` where `fr`.`id` = `qrfr`.`file_references_id`
                                                            					   and `qrfr`.`qrcodes_id` = ?
                                                                                   union
                                                            select null, null, `fr`.`id`,   `fr`.`name`
                                                            					   from `file_references` as `fr`', [$id]);

        return view('qrcodeFileReference.list', $data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $where = array('id' => $id);

        $qrcodeFileReference = QrCodeFileReference::where($where)->first();
        $qrcodeId= $qrcodeFileReference->qrcodes_id;

        QrCodeFileReference::where('id', $id)->delete();

        return Redirect::to('qrcodeFileReference/'.$qrcodeId.'/edit')->with('success', 'Qrcode File reference deleted successfully');
        ;
    }
}
