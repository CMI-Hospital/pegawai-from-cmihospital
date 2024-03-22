<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function checkConnection()
    {
        $statuss = 'awal';
        try {
            DB::connection()->getPdo();
            $statuss = 'Database connection is successful.';
        } catch (\Exception $e) {
            $statuss = 'Database connection failed. Error: ' . $e->getMessage();
        }
        
        $statuss = $statuss . "nice!";

        //return view('login.result')->with('status', $status);
        return view('login.result', compact('statuss'));
    }
}
