<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Carbon\Carbon;
use Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = Event::all();
        return view('events.index', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Event::create([
            'name' => $request->name,
            'tanggal' => $request->tanggal,
            'narasumber' => $request->narasumber,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
        ]);
        // if (Auth::user()->role->name == 'administrator') {
            return redirect()->route('events.index');
            # code...
        // } elseif(Auth::user()->role->name == 'direktur') {
        //     # code...
        //     return redirect()->route('direkturevents.index');
        // } else {
        //     return redirect()->route('itsupportevents.index');
        // }
        
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
        $get = Event::find($id);

        return view('events.edit', compact('get'));
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
        $update = Event::find($id);
        $update->name = $request->name;
        $update->tanggal = $request->tanggal;
        $update->narasumber = $request->narasumber;
        $update->deskripsi = $request->deskripsi;
        $update->link = $request->link;
        $update->save();

        // if (Auth::user()->role->name == 'administrator') {
            return redirect()->route('events.index');
            # code...
        // } elseif(Auth::user()->role->name == 'direktur') {
        //     # code...
        //     return redirect()->route('direkturevents.index');
        // } else {
        //     return redirect()->route('itsupportevents.index');
        // }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $get = Event::find($id);
        $get->delete();

        return redirect()->back();
    }
}
