<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskusi;
use App\Models\Pegawai; // Add Pegawai model import
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DiskusiController extends Controller
{
    // public function index()
    // {
    //     $diskusis = Diskusi::with('pegawai')->get(); // Eager load Pegawai model
    //     return view('diskusi.index', compact('diskusis'));
    // }
    
    public function index()
    {
        // Retrieve diskusis with pegawai information
        $diskusis = Diskusi::with('pegawai')
                    ->where('konten_tanggal', '>=', now()->subMonths(4)->toDateString()) // Filter for last 4 months
                    ->orderBy('created_at', 'desc') // Order by konten_tanggal in descending order
                    ->get();
        
        $loggedUserNoPegawai = Auth::user()->no_pegawai;

        return view('diskusi.index', compact('diskusis', 'loggedUserNoPegawai'));
    }

    public function store(Request $request)
{
    $request->validate([
        'konten_isi' => 'required|string',
        // Add more validation rules as needed
    ]);

    $diskusi = new Diskusi();
    $diskusi->konten_tanggal = now()->toDateString(); // Set konten_tanggal to current date
    $diskusi->konten_jam = $request->konten_jam;
    $diskusi->konten_isi = $request->konten_isi;
    $diskusi->no_pegawai = $request->no_pegawai;
    // You need to set other fields as per your requirements

    $diskusi->save();

    return redirect()->route('diskusi.index')->with('success', 'Comment added successfully.');
}
public function list(Request $request)
    {
        // Check if there is an authenticated user
        if (auth()->check()) {
            $user = auth()->user();
            

           // Retrieve the current user's Pegawai record
            $pegawai = Pegawai::where('id', $user->id)->first();
            
            if ($pegawai) {
                // Retrieve the konten where the current user's no_pegawai matches Konten.no_pegawai
                $kontenawal = Diskusi::where('no_pegawai', $pegawai->no_pegawai)
                 ->orderBy('konten_tanggal', 'desc')
                 ->get();
                
                // You can now use $konten for further processing
            } else {
                // Handle the case where the user does not have a corresponding Pegawai record
            }
          

            // Retrieve the current user's konten
            $user = auth()->user();
            // Calculate the start and end dates for the range (from February 27th until March 26th)
            $start_date = \Carbon\Carbon::now()->subMonth()->startOfMonth()->addDays(26);
            $end_date = \Carbon\Carbon::now()->startOfMonth()->addDays(25);
            $start_date_formatted = $start_date->format('Y-m-d');
            $end_date_formatted = $end_date->format('Y-m-d');
            
            $dates = [];
            $currentDate = $start_date;
            while ($currentDate <= $end_date) {
                $dates[] = $currentDate->format('Y-m-d');
                $currentDate->addDay();
            }
            $totalDays = count($dates);
            
            $konten = \App\Models\Diskusi::where('no_pegawai', $user->no_pegawai)
                ->where('konten_tanggal', '>=', $start_date_formatted)
                ->where('konten_tanggal', '<=', $end_date_formatted)
                ->get();
            
            // Calculate konten for each day and total konten
            $kontenPerDay = [];
            $totalKonten = $konten->count();
            
            $totalDaysWithKonten = 0;
            
            foreach ($dates as $date) {
                $kontenPerDay[$date] = \App\Models\Diskusi::where('no_pegawai', $user->no_pegawai)
                                                            ->where('konten_tanggal', $date)
                                                            ->get();
                $hasKonten = \App\Models\Diskusi::where('no_pegawai', $user->no_pegawai)
                                                ->where('konten_tanggal', $date)
                                                ->exists();
                
                
                if ($hasKonten) {
                    $totalDaysWithKonten++;
                }
                
                $kontenPerDay[$date] = $hasKonten;
            }
            $totalDaysWithoutKonten = $totalDays - $totalDaysWithKonten;
            
            return view('diskusi.list', compact('kontenawal', 'konten', 'kontenPerDay', 'totalKonten', 'totalDaysWithKonten', 'totalDaysWithoutKonten', 'totalDays', 'dates', 'start_date', 'end_date'));
        }else{
            // Redirect to login or handle as needed when there is no authenticated user
        return redirect()->route('login');
        }
        

        
    }
    
    public function manage(Request $request)
    {
        // Check if there is an authenticated user
        if (auth()->check()) {
            $user = auth()->user();
            $role_id = $user->id_role;
            $pegawaiList = Pegawai::whereIn('id_role', [2, 3])
                      ->orderBy('nama', 'asc')
                      ->get();
                      
            // Fetch the work reports based on the submitted filters
            $query = Diskusi::query()->with('pegawai');

            if ($request->filled('no_pegawai')) {
                $query->where('no_pegawai', $request->input('no_pegawai'));
            }

            if ($request->filled('konten_tanggal')) {
                $query->whereDate('konten_tanggal', $request->input('konten_tanggal'));
            }else{
                $query->whereDate('konten_tanggal', now());
            }
            
            $query->orderBy('konten_tanggal', 'desc')->orderBy('konten_jam', 'desc');
            

           $kontenawal = $query->get();
          
          
          
          
          
          
          
          

            // Retrieve the current user's konten
            $user = auth()->user();
            // Calculate the start and end dates for the range (from February 27th until March 26th)
            $start_date = \Carbon\Carbon::now()->subMonth()->startOfMonth()->addDays(26);
            $end_date = \Carbon\Carbon::now()->startOfMonth()->addDays(25);
            $start_date_formatted = $start_date->format('Y-m-d');
            $end_date_formatted = $end_date->format('Y-m-d');
            
            $dates = [];
            $currentDate = $start_date;
            while ($currentDate <= $end_date) {
                $dates[] = $currentDate->format('Y-m-d');
                $currentDate->addDay();
            }
            $totalDays = count($dates);
            
            $konten = \App\Models\Diskusi::where('no_pegawai', $user->no_pegawai)
                ->where('konten_tanggal', '>=', $start_date_formatted)
                ->where('konten_tanggal', '<=', $end_date_formatted)
                ->get();
            
            // Calculate konten for each day and total konten
            $kontenPerDay = [];
            $totalKonten = $konten->count();
            
            $totalDaysWithKonten = 0;
            
            foreach ($dates as $date) {
                $kontenPerDay[$date] = \App\Models\Diskusi::where('no_pegawai', $user->no_pegawai)
                                                            ->where('konten_tanggal', $date)
                                                            ->get();
                $hasKonten = \App\Models\Diskusi::where('no_pegawai', $user->no_pegawai)
                                                ->where('konten_tanggal', $date)
                                                ->exists();
                
                
                if ($hasKonten) {
                    $totalDaysWithKonten++;
                }
                
                $kontenPerDay[$date] = $hasKonten;
            }
            $totalDaysWithoutKonten = $totalDays - $totalDaysWithKonten;
            
            return view('diskusi.manage', compact('kontenawal', 'pegawaiList', 'konten', 'kontenPerDay', 'totalKonten', 'totalDaysWithKonten', 'totalDaysWithoutKonten', 'totalDays', 'dates', 'start_date', 'end_date'));
        }else{
            // Redirect to login or handle as needed when there is no authenticated user
        return redirect()->route('login');
        }
        

        
    }
}
