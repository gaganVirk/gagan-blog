<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertification;
use Illuminate\Http\Request;
use App\Models\Certification;
use App\Models\User;

class CertificationsController extends Controller
{
    public function certUpload(StoreCertification $req, User $user) {
       
        $user->with('Upload certs');
        $cert = new Certification();

        if($req->file() && $req->validated()) {
            $certName = $req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploadedCert', $certName, 'public');

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
        dd('test');
        $certs = Certification::find($id);

        // header("Content-type: application/pdf");
        // header("Content-length: " . filesize($cert->filepath));
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
