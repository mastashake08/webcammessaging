<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\VideoMessage;
use App\Http\Requests;
use Twilio;
class VideoMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      $location = 'videos/'.str_random(10).'.mp4';
      $video = VideoMessage::Create([
        'user_id' => $request->user()->id,
        'phone' => $request->phone,
        'slug' => str_random(6),
        'location' => $location
        ]);
        //
        Storage::put(
           $location,
           file_get_contents($request->file('video')->getRealPath())
       );
       $message = "{$request->user()->name} has sent you a webcam message, view it directly on your phone here https://webcammessaging.com/video/{$video->id}";
       Twilio::message($request->phone, $message);
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
        //$stream = new \App\VideoStream(storage_path('app/').VideoMessage::find($id)->location);
        //$stream->start(); 
        //return view('watch')->with(['video' => VideoMessage::find($id)]);
        echo asset('videos/'.VideoMessage::find($id)->location);
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
