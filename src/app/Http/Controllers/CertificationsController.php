<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certification;

class CertificationsController extends Controller
{
    public function certUpload(Request $req) {
        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf,|max:2048'
        ]);

        $cert = new Certification();

        if($req->file()) {
            $certName = $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $certName, 'public');

            $cert->name = $req->file->getClientOriginalName();
            $cert->filepath = '/storage/' . $filePath;
            $cert->save();

            return redirect('/certifications')->with('success', 'File has been uploaded.')
                         ->with('file', $certName);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certs = Certification::all();

        return view('certifications.index')->with([
            'certs' => $certs
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Certification $cert)
    {
        $certs = Certification::find($id);

        header("Content-type: application/pdf");
        header("Content-length: " . filesize($cert->filepath));
        readfile($cert->filepath);

        return view('/cetifications')->with([
            'certs' => $certs
        ]);
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
