<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AbsenController extends Controller
{
    public function index()
    {
        // echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']. "/assets/fingerprint/src/core/Database.php";

        // var_dump(realpath(dirname(__FILE__)."/../assets/fingerprint/src/core/querydb.php" ));
        // require_once url('/') . '/assets/fingerprint/src/core/querydb.php';
        // require_once __DIR__. 'assets\fingerprint\src\core\querydb.php';

        return view('absen.index');
    }

    public function create(){
        return view('absen.create');
    }

    public function savefingerimage(Request $request){
        $data = $request->all();
        $img = $data['sampledata'][0];
        // list($type, $data) = explode(';', $data['sampledata']);
        // list(, $data)      = explode(',', $data);
        // dump($img);
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        // $data = base64_decode($data['sampledata']);

        Storage::disk('public')->put('a.png', $data);
        // $path = public_path().'img/designs/' . $png_url;

        // Image::make(file_get_contents($data->base64_image))->save($path);
        // list($type, $data) = explode(';', $data);
        // list(, $data)      = explode(',', $data);
        // $data = base64_decode($data);
        // $request->image->move(public_path('assets/fingerimage'), 'a.png');
        // file_put_contents(url('assets/fingerimage/a.png'), $data);
        // Storage::put($data, $path);
        return response($data , 200);
    }
}
