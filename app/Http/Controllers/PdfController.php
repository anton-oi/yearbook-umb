<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pdfs = pdf::orderBy('created_at', 'desc')->where('created_at','>',Carbon::now()->subMonths(3))->paginate(10);
        return view('pdf.index', compact('pdfs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pdf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'pdf' => 'required|mimes:pdf',
        ]);

        if($validate->fails()) {
            return back()->with('status', 'Dokumen harus berformat PDF');
        }
        $file = $request->file('pdf');
        $newFileName = time().'.pdf';

        pdf::create([
            'name' => $request->name,
            'url'  => $newFileName,
            'uploaded_by' => Auth::user()->id
        ]);

        $file->storeAs('/public/pdf/', $newFileName);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pdf.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        pdf::findOrFail($id)->delete($id);
        return back()->with('status', 'Dokumen berhasil dihapus');
    }

    public function download(Request $request)
    {
        if($request->password != 'Wisuda2021-1') return response()->json(['message' => 'Invalid password'], 400);
        $headers = array('Content-Type'=> 'application/pdf');
        return Storage::url('public/pdf/'.$request->file);
    }
}
