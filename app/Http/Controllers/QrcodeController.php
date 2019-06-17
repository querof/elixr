<?php

namespace App\Http\Controllers;

use App\Qrcode;
use Illuminate\Http\Request;
use Redirect;

class QrcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['qrcode'] = Qrcode::paginate(10);

        return view('qrcode.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qrcode.create');
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
          'title' => 'required|max:50',
          'description' => 'required|max:255',
      ]);

        Qrcode::create($request->all());

        return Redirect::to('qrcode')->with('success', 'Great! Qrcode created successfully.');
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
        $data['qrcode_info'] = Qrcode::where($where)->first();

        return view('qrcode.edit', $data);
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
          'title' => 'required|max:50',
          'description' => 'required|max:255',
      ]);

        $update = ['title' => $request->title, 'description' => $request->description];
        Qrcode::where('id', $id)->update($update);

        return Redirect::to('qrcode')->with('success', 'Great! Qrcode updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Qrcode::where('id', $id)->delete();

        return Redirect::to('qrcode')->with('success', 'Qrcode deleted successfully');
    }
}
