<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\MahasiswaCarouselItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminHomeController extends Controller
{
    public function index()
    {
        return view('admin.layouts.app');
    }

    public function indexLanding()
    {
        $carousels = MahasiswaCarouselItem::all();
        return view('admin.landingmanagement.index', compact('carousels'));
    }
    
    public function createWisudawan()
    {
        return view('admin.wisudawan.create');
    }

    public function storeWisudawan(Request $request)
    {
        $mhs = new MahasiswaCarouselItem();

        if($request->hasFile('image')) {
            $image = $request->image;
            $imgUrl = $image->storePubliclyAs('/image/carousel', time().$image->getClientOriginalName(), 'public');

            $mhs->image = Storage::url($imgUrl);
        }

        $mhs->mhs_name = $request->mhs_name;
        // $mhs->quote = $request->quote;
        $mhs->jurusan = $request->jurusan;
        $mhs->tingkat = $request->tingkat;
        $mhs->save();

        return redirect(route('admin.landing'));
    }

    public function deleteWisudawan($id)
    {
        MahasiswaCarouselItem::findOrFail($id)->delete();

        return redirect()->back();
    }
}
