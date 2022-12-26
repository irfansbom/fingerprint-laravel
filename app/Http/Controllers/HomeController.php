<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        // echo 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']. "/assets/fingerprint/src/core/Database.php";

        // var_dump(realpath(dirname(__FILE__)."/../assets/fingerprint/src/core/querydb.php" ));
        // require_once url('/') . '/assets/fingerprint/src/core/querydb.php';
        // require_once __DIR__. 'assets\fingerprint\src\core\querydb.php';

        return view('index');
    }
}
