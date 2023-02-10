<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Iman\Streamer\VideoStreamer;

class HomeController extends Controller
{
    public function index(){
//        $video_path = 'my_video_path';
//
//        $tmp = new \App\VideoStream($video_path);
//        $tmp->start();
//        $path = public_path('video.vid.mp4');
//        VideoStreamer::streamFile($path);
        return view('client.home.index');
    }
}
