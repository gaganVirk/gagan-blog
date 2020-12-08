<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCertification;
use Illuminate\Http\Request;
use App\Models\Certification;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class CertificationsController extends Controller
{
    public function certUpload(StoreCertification $request, User $user) {
       
        $user->with('Upload certs');
        $cert = new Certification();

        if($request->file() && $request->validated()) {
            
            $file = $request->file('file');
            $partialUrl = Storage::disk('s3')->put('certifications', $file, 'public');
            $fullUrl = config('app.url') .'/'. $partialUrl;

            $cert->name = $file->getClientOriginalName();
            $cert->filePath = $fullUrl;
            $cert->save();
            // $certName = $request->file->getClientOriginalName();
            // $filePath = $request->file('file')->storeAs('uploadedCert', $certName, 'public');

            // $cert->name = $request->file->getClientOriginalName();
            // $cert->filepath = '/storage/' . $filePath;
            // $cert->save();

            return redirect('/certifications')->with('success', 'File has been uploaded.')
                         ->with('file', $cert->name);
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
