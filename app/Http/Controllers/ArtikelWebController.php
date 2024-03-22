<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Artikel;
use App\Models\ArtikelWeb;
use App\Models\Cuti;
use Illuminate\Http\Request;
use App\Models\Diskusi;
use App\Models\KategoryArtikel;
use App\Models\Pegawai; // Add Pegawai model import
use App\Models\SubKategoryArtikel;
use Illuminate\Support\Str;
use App\Models\SubKategoryAtikel;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArtikelWebController extends Controller
{
    // public function index()
    // {
    //     $diskusis = Diskusi::with('pegawai')->get(); // Eager load Pegawai model
    //     return view('artikelWeb.index', compact('diskusis'));
    // }
        

    public function artikelFilter()
    {
        //
        $user = Auth::user();
        $thisYear = date('Y');

        $artikel = ArtikelWeb::whereYear('created_at', $thisYear)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('artikelWeb.index', [
            'artikel' =>$artikel,
            'thisYear' => $thisYear,
        ]);
    }


    public function artikelFilterByDate(Request $request)
    {
        //
        $user = Auth::user();
        $thisYear = $request->tahun;

       $artikel = ArtikelWeb::whereYear('created_at', $thisYear)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('artikelWeb.index', [
            'artikel' =>$artikel,

            'thisYear' => $thisYear,

        ]);
    }


    public function create()
    {
        $data['user'] = User::all();
        $data['kategori'] = KategoryArtikel::all();
        $data['sub_kategori'] = SubKategoryArtikel::all();
      
        return view('artikelWeb.create', $data);
    }

    public function store(Request $request)
    {

        $data_artikel = ArtikelWeb::orderBy('created_at', 'desc')->first();
        $id_artikel = 'ARTIKEL-'. date('Y-m-d').'-'.substr($data_artikel->id_artikel, 19) + 1;


        $image1 = $request->file('gambar1');
        $imageName1 = substr($data_artikel->id_artikel, 19) + 1 . '-' . $image1->getClientOriginalName();
        $request->file('gambar1')->storeAs('article_images', $imageName1.'.jpg');
        $imagePath1 = 'article_images/' . $imageName1;


        $image2 = $request->file('gambar2');
        $imageName2 = substr($data_artikel->id_artikel, 19) + 1 . '-' . $image2->getClientOriginalName();
        $request->file('gambar2')->storeAs('article_images', $imageName2.'.jpg');
        $imagePath2 = 'article_images/' . $imageName2;

        
       
        $artikel = new ArtikelWeb();
        $artikel->id_artikel = $id_artikel;
        $artikel->judul_id = $request->judul_bahasa;
        $artikel->judul_en = $request->judul_english;
        $artikel->gambar_artikel1 = $imagePath1;
        $artikel->gambar_artikel2 = $imagePath2;
        $artikel->info_gambar1 = $request->infoGambar_1;
        $artikel->info_gambar2 = $request->infoGambar_2;
        $artikel->isi_artikel_id1 = $request->isiArtikel_1;
        $artikel->isi_artikel_id2 =  $request->isiArtikel_2;
        $artikel->isi_artikel_en1 = $request->isiArtikelEn_1;
        $artikel->isi_artikel_en2 =  $request->isiArtikelEn_2;
        $artikel->keyword =  $request->keyword;
        $artikel->slug1 = $request->slug1;
        $artikel->slug2 = $request->slug2;
        $artikel->tagar = $request->tagar;
        $artikel->id_kategori = $request->kategori;
        $artikel->id_sub_kategori = $request->sub_kategori;
        $artikel->status_publish = $request->publish_status;
        $artikel->date_publish = date('Y-m-d H:i:s');
        $artikel->id_user = Auth::user()->id;
        $artikel->id_penulis_artikel = $request->penulis;
        
        $artikel->save();

        return redirect()->route('artikelWeb.create')->with('success', 'Comment added successfully.');
    }
   
}