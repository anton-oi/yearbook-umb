<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\EventCover;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->paginate();
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
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
            'title' => 'required',
            'date' => 'required',
        ]);

        if($validate->fails()) {
            return back()->with('errors', $validate->errors());
        }

        $event = Event::create([
            'title' => request('title'),
            'date' => request('date'),
            'location' => request('location'),
        ]);
        $covers = request()->file('covers');

        foreach ($covers as $cover) {
            $newFileName = time().'.'.$cover->extension();
            $imgUrl = $cover->storePubliclyAs('/image/event', time().$cover->getClientOriginalName(), 'public');

            EventCover::create([
                'url' => Storage::url( $imgUrl),
                'event_id' => $event->id
            ]);
        }
        return redirect(route('admin.events.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Event::findOrFail($id)->delete($id);
        return back()->with('status', 'Event has been deleted!');
    }
}
