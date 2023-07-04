<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminYearbookController extends Controller
{
    public function index()
    {
        $pdfs = pdf::orderBy('created_at', 'desc')->paginate();
        return view('admin.yearbook.index', compact('pdfs'));
    }

    public function create()
    {
        return view('admin.yearbook.create');
    }

    public function edit($id)
    {
        $pdf = pdf::findOrFail($id);
        return view('admin.yearbook.edit', compact('pdf'));
    }

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

        $newFileName = time().'.'.request('cover')->extension();
        $coverUrl = request('cover')->storePubliclyAs('/image/pdf-cover', time().request('cover')->getClientOriginalName(), 'public');

        pdf::create([
            'name' => $request->name,
            'cover' => Storage::url($coverUrl),
            'url'  => $newFileName,
            'uploaded_by' => Auth::user()->id
        ]);

        $file->storeAs('/public/pdf/', $newFileName);

        return redirect(route('admin.yearbook.index'));
    }

    public function update($id, Request $request)
    {
        $pdf = pdf::findOrFail($id);

        if(request()->has('pdf')) {
            Storage::delete('storage/pdf/'.$pdf->url);
            $file = $request->file('pdf');
            $newFileName = time().'.pdf';
            $file->storeAs('/public/pdf/', $newFileName);

            $pdf->update([
                'url'  => $newFileName,
            ]);
        }

        if(request()->has('cover')) {
            $newFileName = time().'.'.request('cover')->extension();
            $coverUrl = request('cover')->storePubliclyAs('/image/pdf-cover', time().request('cover')->getClientOriginalName(), 'public');
            Storage::delete($pdf->cover);

            $pdf->update([
                'cover' => Storage::url($coverUrl),
            ]);
        }



        $pdf->update([
            'name' => $request->name,
            'uploaded_by' => Auth::user()->id
        ]);


        return redirect(route('admin.yearbook.index'));
    }

    public function destroy($id)
    {
        pdf::findOrFail($id)->delete($id);
        return back()->with('status', 'Dokumen berhasil dihapus');
    }
}
