<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Models\Absensi;
use App\Models\Cuti;
use App\Models\Diskusi;
use App\Models\Pegawai;
use App\Models\Peraturan;
use App\Models\Presensi_harian;
use App\Models\SlipGaji;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;
use Carbon\Carbon;
// use App\Models\Absensi;
// use Carbon\Carbon;

class StaffDashboardController extends Controller
{
    function __construct()
    {
        //$this->middleware('permission:menu-staff', ['all']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $id = $user->id;
        $intMonth = date('m');
        $year = date('Y');
        $hari = cal_days_in_month(CAL_GREGORIAN, $intMonth, date('Y')); 
            
        $bulan = intval(date('m'));
        $tahun = intval(date('Y'));
        $no_pegawai = $user->no_pegawai;

            

$results = DB::select('
    SELECT
        diskusi.no_pegawai AS no_pegawai,
        diskusi.konten_tanggal AS konten_tanggal,
        diskusi.konten_isi AS konten_isi,
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 1 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'1\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 2 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'2\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 3 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'3\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 4 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'4\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 5 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'5\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 6 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'6\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 7 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'7\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 8 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'8\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 9 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'9\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 10 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'10\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 11 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'11\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 12 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'12\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 13 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'13\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 14 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'14\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 15 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'15\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 16 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'16\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 17 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'17\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 18 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'18\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 19 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'19\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 20 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'20\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 21 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'21\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 22 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'22\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 23 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'23\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 24 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'24\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 25 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'25\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 26 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'26\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 27 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'27\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 28 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'28\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 29 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'29\',
        CASE WHEN DAYOFMONTH(diskusi.konten_tanggal) = 30 AND diskusi.konten_isi IS NOT NULL THEN \'isi\' END AS \'30\'

       
    FROM
        diskusi
    WHERE
        MONTH(diskusi.konten_tanggal) = ? 
        AND YEAR(diskusi.konten_tanggal) = ?
        AND diskusi.no_pegawai = ?
    ORDER BY
        diskusi.konten_tanggal DESC
', [$bulan, $tahun, $no_pegawai]);



$results_second = DB::table('view_konten_perbulan')
->select('no_pegawai as nip', 'konten_tanggal as tanggal')
->selectRaw('GROUP_CONCAT(`1`) as "1"')
->selectRaw('GROUP_CONCAT(`2`) as "2"')
->selectRaw('GROUP_CONCAT(`3`) as "3"')
->selectRaw('GROUP_CONCAT(`4`) AS "4"')
->selectRaw('GROUP_CONCAT(`5`) AS "5"')
->selectRaw('GROUP_CONCAT(`6`) AS "6"')
->selectRaw('GROUP_CONCAT(`7`) AS "7"')
->selectRaw('GROUP_CONCAT(`8`) AS "8"')
->selectRaw('GROUP_CONCAT(`9`) AS "9"')
->selectRaw('GROUP_CONCAT(`10`) AS "10"')
->selectRaw('GROUP_CONCAT(`11`) AS "11"')
->selectRaw('GROUP_CONCAT(`12`) AS "12"')
->selectRaw('GROUP_CONCAT(`13`) AS "13"')
->selectRaw('GROUP_CONCAT(`14`) AS "14"')
->selectRaw('GROUP_CONCAT(`15`) AS "15"')
->selectRaw('GROUP_CONCAT(`16`) AS "16"')
->selectRaw('GROUP_CONCAT(`17`) AS "17"')
->selectRaw('GROUP_CONCAT(`18`) AS "18"')
->selectRaw('GROUP_CONCAT(`19`) AS "19"')
->selectRaw('GROUP_CONCAT(`20`) AS "20"')
->selectRaw('GROUP_CONCAT(`21`) AS "21"')
->selectRaw('GROUP_CONCAT(`22`) AS "22"')
->selectRaw('GROUP_CONCAT(`23`) AS "23"')
->selectRaw('GROUP_CONCAT(`24`) AS "24"')
->selectRaw('GROUP_CONCAT(`25`) AS "25"')
->selectRaw('GROUP_CONCAT(`26`) AS "26"')
->selectRaw('GROUP_CONCAT(`27`) AS "27"')
->selectRaw('GROUP_CONCAT(`28`) AS "28"')
->selectRaw('GROUP_CONCAT(`29`) AS "29"')
->selectRaw('GROUP_CONCAT(`30`) AS "30"')
->selectRaw('GROUP_CONCAT(`31`) AS "31"')
->whereYear('konten_tanggal', $tahun)
->whereMonth('konten_tanggal', $bulan)
->where('no_pegawai', $no_pegawai)
->groupBy('no_pegawai')
->get();




    $jumtgl = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);


        $riwayatTdkHadir = Absensi::where('no_pegawai', $no_pegawai)
        ->whereMonth('tanggal_absen', intval($intMonth))
        ->whereYear('tanggal_absen', intval($year))
        ->where('info_masuk', '!=', 4)
        ->orderBy('tanggal_absen', 'desc')
        ->get();
        
        // dd($riwayatTdkHadir);


        $diskusis = Diskusi::where('no_pegawai', $user->no_pegawai)
        ->whereMonth('konten_tanggal', $intMonth)
        ->whereYear('konten_tanggal', $year)
        ->orderBy('created_at', 'desc')
        ->get();



        $id_peraturan = Peraturan::latest('id')->pluck('id')->first();

        $peraturan = Peraturan::find($id_peraturan);
        $batasTahunan = $peraturan->jml_cuti_tahunan;
        $batasBersama = $peraturan->jml_cuti_bersama;
        $batasPenting = $peraturan->jml_cuti_penting;
        $batasBesar = $peraturan->jml_cuti_besar;
        $batasSakit = $peraturan->jml_cuti_sakit;
        $batasHamil = $peraturan->jml_cuti_hamil;


        /*  Cuti Tahunan Pegawai  */

        $JanTahunan = 0;
        $FebTahunan = 0;
        $MarTahunan = 0;
        $AprTahunan = 0;
        $MayTahunan = 0;
        $JunTahunan = 0;
        $JulTahunan = 0;
        $AugTahunan = 0;
        $SepTahunan = 0;
        $OctTahunan = 0;
        $NovTahunan = 0;
        $DecTahunan = 0;

        $Tahunan = [
            '',
            $JanTahunan, $FebTahunan, $MarTahunan, $AprTahunan,
            $MayTahunan, $JunTahunan, $JulTahunan, $AugTahunan,
            $SepTahunan, $OctTahunan, $NovTahunan, $DecTahunan
        ];

        for ($i = 1; $i <= 12; $i++) {
            $Tahunan[$i] = Cuti::where('id_pegawai', $user->id)
                ->whereYear('tgl_mulai', date("Y"))
                ->whereMonth('tgl_mulai', $i)
                ->where('tipe_cuti', 'Tahunan')
                ->where('status', 'Disetujui HRD')
                ->count();
        }

        /*End Cuti Tahunan Pegawai*/


        /*  Cuti Bersama Pegawai  */

        $JanBersama = 0;
        $FebBersama = 0;
        $MarBersama = 0;
        $AprBersama = 0;
        $MayBersama = 0;
        $JunBersama = 0;
        $JulBersama = 0;
        $AugBersama = 0;
        $SepBersama = 0;
        $OctBersama = 0;
        $NovBersama = 0;
        $DecBersama = 0;

        $Bersama = [
            '',
            $JanBersama, $FebBersama, $MarBersama, $AprBersama,
            $MayBersama, $JunBersama, $JulBersama, $AugBersama,
            $SepBersama, $OctBersama, $NovBersama, $DecBersama
        ];

        for ($i = 1; $i <= 12; $i++) {
            $Bersama[$i] = Cuti::where('id_pegawai', $user->id)
                ->whereYear('tgl_mulai', date("Y"))
                ->whereMonth('tgl_mulai', $i)
                ->where('tipe_cuti', 'Bersama')
                ->where('status', 'Disetujui HRD')
                ->count();
        }

        /*End Cuti Bersama Pegawai*/

        /*  Cuti Penting Pegawai  */

        $JanPenting = 0;
        $FebPenting = 0;
        $MarPenting = 0;
        $AprPenting = 0;
        $MayPenting = 0;
        $JunPenting = 0;
        $JulPenting = 0;
        $AugPenting = 0;
        $SepPenting = 0;
        $OctPenting = 0;
        $NovPenting = 0;
        $DecPenting = 0;

        $Penting = [
            '',
            $JanPenting, $FebPenting, $MarPenting, $AprPenting,
            $MayPenting, $JunPenting, $JulPenting, $AugPenting,
            $SepPenting, $OctPenting, $NovPenting, $DecPenting
        ];

        for ($i = 1; $i <= 12; $i++) {
            $Penting[$i] = Cuti::where('id_pegawai', $user->id)
                ->whereYear('tgl_mulai', date("Y"))
                ->whereMonth('tgl_mulai', $i)
                ->where('tipe_cuti', 'Penting')
                ->where('status', 'Disetujui HRD')
                ->count();
        }

        /*End Cuti Penting Pegawai*/


        /*  Cuti Besar Pegawai  */

        $JanBesar = 0;
        $FebBesar = 0;
        $MarBesar = 0;
        $AprBesar = 0;
        $MayBesar = 0;
        $JunBesar = 0;
        $JulBesar = 0;
        $AugBesar = 0;
        $SepBesar = 0;
        $OctBesar = 0;
        $NovBesar = 0;
        $DecBesar = 0;

        $Besar = [
            '',
            $JanBesar, $FebBesar, $MarBesar, $AprBesar,
            $MayBesar, $JunBesar, $JulBesar, $AugBesar,
            $SepBesar, $OctBesar, $NovBesar, $DecBesar
        ];

        for ($i = 1; $i <= 12; $i++) {
            $Besar[$i] = Cuti::where('id_pegawai', $user->id)
                ->whereYear('tgl_mulai', date("Y"))
                ->whereMonth('tgl_mulai', $i)
                ->where('tipe_cuti', 'Besar')
                ->where('status', 'Disetujui HRD')
                ->count();
        }

        /*End Cuti Besar Pegawai*/

        /*  Cuti Sakit Pegawai  */

        $JanSakit = 0;
        $FebSakit = 0;
        $MarSakit = 0;
        $AprSakit = 0;
        $MaySakit = 0;
        $JunSakit = 0;
        $JulSakit = 0;
        $AugSakit = 0;
        $SepSakit = 0;
        $OctSakit = 0;
        $NovSakit = 0;
        $DecSakit = 0;

        $Sakit = [
            '',
            $JanSakit, $FebSakit, $MarSakit, $AprSakit,
            $MaySakit, $JunSakit, $JulSakit, $AugSakit,
            $SepSakit, $OctSakit, $NovSakit, $DecSakit
        ];

        for ($i = 1; $i <= 12; $i++) {
            $Sakit[$i] = Cuti::where('id_pegawai', $user->id)
                ->whereYear('tgl_mulai', date("Y"))
                ->whereMonth('tgl_mulai', $i)
                ->where('tipe_cuti', 'Sakit')
                ->where('status', 'Disetujui HRD')
                ->count();
        }

        /*End Cuti Sakit Pegawai*/

        /*  Cuti Hamil Pegawai  */

        $JanHamil = 0;
        $FebHamil = 0;
        $MarHamil = 0;
        $AprHamil = 0;
        $MayHamil = 0;
        $JunHamil = 0;
        $JulHamil = 0;
        $AugHamil = 0;
        $SepHamil = 0;
        $OctHamil = 0;
        $NovHamil = 0;
        $DecHamil = 0;

        $Hamil = [
            '',
            $JanHamil, $FebHamil, $MarHamil, $AprHamil,
            $MayHamil, $JunHamil, $JulHamil, $AugHamil,
            $SepHamil, $OctHamil, $NovHamil, $DecHamil
        ];

        for ($i = 1; $i <= 12; $i++) {
            $Hamil[$i] = Cuti::where('id_pegawai', $user->id)
                ->whereYear('tgl_mulai', date("Y"))
                ->whereMonth('tgl_mulai', $i)
                ->where('tipe_cuti', 'Hamil')
                ->where('status', 'Disetujui HRD')
                ->count();
        }

        /*End Cuti Hamil Pegawai*/

        /*Hitung Sisa Cuti*/

        $sisaTahunan = $batasTahunan - ($Tahunan[1] + $Tahunan[2] + $Tahunan[3] + $Tahunan[4] + $Tahunan[5] + $Tahunan[6] + $Tahunan[7] + $Tahunan[8] + $Tahunan[9] + $Tahunan[10] + $Tahunan[11] + $Tahunan[12]);
        $sisaBersama = $batasBersama - ($Bersama[1] + $Bersama[2] + $Bersama[3] + $Bersama[4] + $Bersama[5] + $Bersama[6] + $Bersama[7] + $Bersama[8] + $Bersama[9] + $Bersama[10] + $Bersama[11] + $Bersama[12]);
        $sisaPenting = $batasPenting - ($Penting[1] + $Penting[2] + $Penting[3] + $Penting[4] + $Penting[5] + $Penting[6] + $Penting[7] + $Penting[8] + $Penting[9] + $Penting[10] + $Penting[11] + $Penting[12]);
        $sisaBesar = $batasBesar - ($Besar[1] + $Besar[2] + $Besar[3] + $Besar[4] + $Besar[5] + $Besar[6] + $Besar[7] + $Besar[8] + $Besar[9] + $Besar[10] + $Besar[11] + $Besar[12]);
        $sisaSakit = $batasSakit - ($Sakit[1] + $Sakit[2] + $Sakit[3] + $Sakit[4] + $Sakit[5] + $Sakit[6] + $Sakit[7] + $Sakit[8] + $Sakit[9] + $Sakit[10] + $Sakit[11] + $Sakit[12]);
        $sisaHamil = $batasHamil - ($Hamil[1] + $Hamil[2] + $Hamil[3] + $Hamil[4] + $Hamil[5] + $Hamil[6] + $Hamil[7] + $Hamil[8] + $Hamil[9] + $Hamil[10] + $Hamil[11] + $Hamil[12]);

        /*End Hitung Sisa Cuti*/

        $alpha = Absensi::where('no_pegawai', $no_pegawai)
            ->whereMonth('tanggal_absen', intval($intMonth))
            ->whereYear('tanggal_absen', intval($year))
            ->where('info_masuk', 4)
            ->count();

        $checkData = Absensi::where('no_pegawai', $no_pegawai)
        ->whereMonth('tanggal_absen', intval($intMonth))
        ->whereYear('tanggal_absen', intval($year))
            ->count();

        $pegawai = Pegawai::find($id);
        $hadir = ($hari - $alpha) / $hari * 100;
        $persentaseHadir = number_format($hadir, 2);
        $TdkHadir = 100 - $persentaseHadir;
        $persentaseTdkHadir = number_format($TdkHadir, 2);
        $kehadiran = Absensi::where('no_pegawai', $no_pegawai)
            ->whereMonth('tanggal_absen', intval($intMonth))
            ->whereYear('tanggal_absen', intval($year))
            ->orderBy('tanggal_absen', 'desc')
            ->get();

        $months = [
            'January' => 1, 'Febuary' => 2, 'March' => 3,
            'April' => 4, 'May' => 5, 'June' => 6,
            'July' => 7, 'August' => 8, 'September' => 9,
            'October' => 10, 'November' => 11, 'December' => 12
        ];

        $cuti = Cuti::where('id_pegawai', $id)->orderBy('id', 'desc')->first();
        // dd($cuti);
        $bulanIni = $intMonth;

        /* Lama Kerja */
        $tgl_masuk = Auth::user()->tgl_masuk;
        $tgl_now = date("Y-m-d");

        $ts1 = strtotime($tgl_masuk);
        $ts2 = strtotime($tgl_now);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $lamaKerja = (($year2 - $year1) * 12) + ($month2 - $month1);

        $syarat_bulan_cuti_tahunan = $peraturan->syarat_bulan_cuti_tahunan;

        $syarat_bulan_cuti_besar = $peraturan->syarat_bulan_cuti_besar;
        /* End Lama Kerja */




        /* Slip Gaji */

        $JanJun = ['Jan' => '01', 'Feb' => '02', 'Mar' => '03', 'Apr' => '04', 'May' => '05', 'Jun' => '06'];
        $JulDec = ['Jul' => '07', 'Aug' => '08', 'Sep' => '09', 'Oct' => '10', 'Nov' => '11', 'Dec' => '12'];

        /* End Slip Gaji */
        // foreach ($results_second as $key => $value) {
        //     dd($key);
        // }


        // Ambil data slip gaji by user login    
        $gajiPokok = SlipGaji::where('no_pegawai', Auth::user()->no_pegawai)
                               ->first();
        
        // Ambil data absen by user login, dengan kondisi
        //     setelah tgl 26 ( karena tutup buku tgl 26)
        //     dan kita ambil by bulan dan tahun waktu itu
        $absen = Absensi::where('no_pegawai', Auth::user()->no_pegawai)
                        ->whereMonth('tanggal_absen', $intMonth)
                        ->whereYear('tanggal_absen', $year)
                        ->where('tanggal_absen', '>', Carbon::create(intval($year), intval($intMonth), 26))
                        ->get();
        
        // Menghitung absen setelah tgl 26 sampai hari ini               
        $totalAbsen = 26 - count($absen);
            
        // Kondisi jika total absen null (supaya tidak error)
        if (isset($totalAbsen)) {
            
            // Menghitung pendapatan dengan cara gaji pokok di kurangi total absen dari tgl 26
            $totalPendapatan = $gajiPokok->gaji_pokok/$totalAbsen;
        } else {

            // err handler
            $totalPendapatan = 0;
        }
      

        
        return view('staff.dashboard', [
            'pegawai' => $pegawai,
            'JanJun' => $JanJun,
            'JulDec' => $JulDec,
            'diskusis' => $diskusis,
            'totalPendapatan' => $totalPendapatan,
            'jmltgl' => $jumtgl,
            'results' => $results,
            'results_second' => $results_second,

            'riwayatTdkHadir' => $riwayatTdkHadir,
            'persentaseHadir' => $persentaseHadir,
            'persentaseTdkHadir' => $persentaseTdkHadir,
            'kehadiran' => $kehadiran,
            'checkData' => $checkData,

            'cuti' => $cuti,

            'months' => $months,
            'bulanIni' => $bulanIni,
            'tahunIni' => $year,

            'peraturan' => $peraturan,

            'sisaTahunan' => $sisaTahunan,
            'sisaBersama' => $sisaBersama,
            'sisaPenting' => $sisaPenting,
            'sisaBesar' => $sisaBesar,
            'sisaSakit' => $sisaSakit,
            'sisaHamil' => $sisaHamil,


            'lamaKerja' => $lamaKerja,

            'syarat_bulan_cuti_tahunan' => $syarat_bulan_cuti_tahunan,

            'syarat_bulan_cuti_besar' => $syarat_bulan_cuti_besar,



        ]);
    }


    public function presensi(Request $request)
    {
        //
        $user = Auth::user();
        $id = $user->id;
        $intMonth = $request->month;
        $year = date('Y');
        $hari = cal_days_in_month(CAL_GREGORIAN, $intMonth, date('Y'));

        $id_peraturan = Peraturan::latest('id')->pluck('id')->first();

        $peraturan = Peraturan::find($id_peraturan);
        $batasTahunan = $peraturan->jml_cuti_tahunan;
        $batasBersama = $peraturan->jml_cuti_bersama;
        $batasPenting = $peraturan->jml_cuti_penting;
        $batasBesar = $peraturan->jml_cuti_besar;
        $batasSakit = $peraturan->jml_cuti_sakit;
        $batasHamil = $peraturan->jml_cuti_hamil;


        /*  Cuti Tahunan Pegawai  */

        $JanTahunan = 0;
        $FebTahunan = 0;
        $MarTahunan = 0;
        $AprTahunan = 0;
        $MayTahunan = 0;
        $JunTahunan = 0;
        $JulTahunan = 0;
        $AugTahunan = 0;
        $SepTahunan = 0;
        $OctTahunan = 0;
        $NovTahunan = 0;
        $DecTahunan = 0;

        $Tahunan = [
            '',
            $JanTahunan, $FebTahunan, $MarTahunan, $AprTahunan,
            $MayTahunan, $JunTahunan, $JulTahunan, $AugTahunan,
            $SepTahunan, $OctTahunan, $NovTahunan, $DecTahunan
        ];

        for ($i = 1; $i <= 12; $i++) {
            $Tahunan[$i] = Cuti::where('id_pegawai', $user->id)
                ->whereYear('tgl_mulai', date("Y"))
                ->whereMonth('tgl_mulai', $i)
                ->where('tipe_cuti', 'Tahunan')
                ->where('status', 'Disetujui HRD')
                ->count();
        }

        /*End Cuti Tahunan Pegawai*/


        /*  Cuti Bersama Pegawai  */

        $JanBersama = 0;
        $FebBersama = 0;
        $MarBersama = 0;
        $AprBersama = 0;
        $MayBersama = 0;
        $JunBersama = 0;
        $JulBersama = 0;
        $AugBersama = 0;
        $SepBersama = 0;
        $OctBersama = 0;
        $NovBersama = 0;
        $DecBersama = 0;

        $Bersama = [
            '',
            $JanBersama, $FebBersama, $MarBersama, $AprBersama,
            $MayBersama, $JunBersama, $JulBersama, $AugBersama,
            $SepBersama, $OctBersama, $NovBersama, $DecBersama
        ];

        for ($i = 1; $i <= 12; $i++) {
            $Bersama[$i] = Cuti::where('id_pegawai', $user->id)
                ->whereYear('tgl_mulai', date("Y"))
                ->whereMonth('tgl_mulai', $i)
                ->where('tipe_cuti', 'Bersama')
                ->where('status', 'Disetujui HRD')
                ->count();
        }

        /*End Cuti Bersama Pegawai*/

        /*  Cuti Penting Pegawai  */

        $JanPenting = 0;
        $FebPenting = 0;
        $MarPenting = 0;
        $AprPenting = 0;
        $MayPenting = 0;
        $JunPenting = 0;
        $JulPenting = 0;
        $AugPenting = 0;
        $SepPenting = 0;
        $OctPenting = 0;
        $NovPenting = 0;
        $DecPenting = 0;

        $Penting = [
            '',
            $JanPenting, $FebPenting, $MarPenting, $AprPenting,
            $MayPenting, $JunPenting, $JulPenting, $AugPenting,
            $SepPenting, $OctPenting, $NovPenting, $DecPenting
        ];

        for ($i = 1; $i <= 12; $i++) {
            $Penting[$i] = Cuti::where('id_pegawai', $user->id)
                ->whereYear('tgl_mulai', date("Y"))
                ->whereMonth('tgl_mulai', $i)
                ->where('tipe_cuti', 'Penting')
                ->where('status', 'Disetujui HRD')
                ->count();
        }

        /*End Cuti Penting Pegawai*/


        /*  Cuti Besar Pegawai  */

        $JanBesar = 0;
        $FebBesar = 0;
        $MarBesar = 0;
        $AprBesar = 0;
        $MayBesar = 0;
        $JunBesar = 0;
        $JulBesar = 0;
        $AugBesar = 0;
        $SepBesar = 0;
        $OctBesar = 0;
        $NovBesar = 0;
        $DecBesar = 0;

        $Besar = [
            '',
            $JanBesar, $FebBesar, $MarBesar, $AprBesar,
            $MayBesar, $JunBesar, $JulBesar, $AugBesar,
            $SepBesar, $OctBesar, $NovBesar, $DecBesar
        ];

        for ($i = 1; $i <= 12; $i++) {
            $Besar[$i] = Cuti::where('id_pegawai', $user->id)
                ->whereYear('tgl_mulai', date("Y"))
                ->whereMonth('tgl_mulai', $i)
                ->where('tipe_cuti', 'Besar')
                ->where('status', 'Disetujui HRD')
                ->count();
        }

        /*End Cuti Besar Pegawai*/

        /*  Cuti Sakit Pegawai  */

        $JanSakit = 0;
        $FebSakit = 0;
        $MarSakit = 0;
        $AprSakit = 0;
        $MaySakit = 0;
        $JunSakit = 0;
        $JulSakit = 0;
        $AugSakit = 0;
        $SepSakit = 0;
        $OctSakit = 0;
        $NovSakit = 0;
        $DecSakit = 0;

        $Sakit = [
            '',
            $JanSakit, $FebSakit, $MarSakit, $AprSakit,
            $MaySakit, $JunSakit, $JulSakit, $AugSakit,
            $SepSakit, $OctSakit, $NovSakit, $DecSakit
        ];

        for ($i = 1; $i <= 12; $i++) {
            $Sakit[$i] = Cuti::where('id_pegawai', $user->id)
                ->whereYear('tgl_mulai', date("Y"))
                ->whereMonth('tgl_mulai', $i)
                ->where('tipe_cuti', 'Sakit')
                ->where('status', 'Disetujui HRD')
                ->count();
        }

        /*End Cuti Sakit Pegawai*/

        /*  Cuti Hamil Pegawai  */

        $JanHamil = 0;
        $FebHamil = 0;
        $MarHamil = 0;
        $AprHamil = 0;
        $MayHamil = 0;
        $JunHamil = 0;
        $JulHamil = 0;
        $AugHamil = 0;
        $SepHamil = 0;
        $OctHamil = 0;
        $NovHamil = 0;
        $DecHamil = 0;

        $Hamil = [
            '',
            $JanHamil, $FebHamil, $MarHamil, $AprHamil,
            $MayHamil, $JunHamil, $JulHamil, $AugHamil,
            $SepHamil, $OctHamil, $NovHamil, $DecHamil
        ];

        for ($i = 1; $i <= 12; $i++) {
            $Hamil[$i] = Cuti::where('id_pegawai', $user->id)
                ->whereYear('tgl_mulai', date("Y"))
                ->whereMonth('tgl_mulai', $i)
                ->where('tipe_cuti', 'Hamil')
                ->where('status', 'Disetujui HRD')
                ->count();
        }

        /*End Cuti Hamil Pegawai*/

        /*Hitung Sisa Cuti*/

        $sisaTahunan = $batasTahunan - ($Tahunan[1] + $Tahunan[2] + $Tahunan[3] + $Tahunan[4] + $Tahunan[5] + $Tahunan[6] + $Tahunan[7] + $Tahunan[8] + $Tahunan[9] + $Tahunan[10] + $Tahunan[11] + $Tahunan[12]);
        $sisaBersama = $batasBersama - ($Bersama[1] + $Bersama[2] + $Bersama[3] + $Bersama[4] + $Bersama[5] + $Bersama[6] + $Bersama[7] + $Bersama[8] + $Bersama[9] + $Bersama[10] + $Bersama[11] + $Bersama[12]);
        $sisaPenting = $batasPenting - ($Penting[1] + $Penting[2] + $Penting[3] + $Penting[4] + $Penting[5] + $Penting[6] + $Penting[7] + $Penting[8] + $Penting[9] + $Penting[10] + $Penting[11] + $Penting[12]);
        $sisaBesar = $batasBesar - ($Besar[1] + $Besar[2] + $Besar[3] + $Besar[4] + $Besar[5] + $Besar[6] + $Besar[7] + $Besar[8] + $Besar[9] + $Besar[10] + $Besar[11] + $Besar[12]);
        $sisaSakit = $batasSakit - ($Sakit[1] + $Sakit[2] + $Sakit[3] + $Sakit[4] + $Sakit[5] + $Sakit[6] + $Sakit[7] + $Sakit[8] + $Sakit[9] + $Sakit[10] + $Sakit[11] + $Sakit[12]);
        $sisaHamil = $batasHamil - ($Hamil[1] + $Hamil[2] + $Hamil[3] + $Hamil[4] + $Hamil[5] + $Hamil[6] + $Hamil[7] + $Hamil[8] + $Hamil[9] + $Hamil[10] + $Hamil[11] + $Hamil[12]);

        /*End Hitung Sisa Cuti*/
        $no_pegawai = $user->no_pegawai;
        $alpha = Absensi::where('no_pegawai', $no_pegawai)
            ->whereMonth('tanggal_absen', intval($intMonth))
            ->whereYear('tanggal_absen', intval($year))
            ->where('info_masuk', 4)
            ->count();

        $checkData = Absensi::where('no_pegawai', $no_pegawai)
            ->whereMonth('tanggal_absen', intval($intMonth))
            ->whereYear('tanggal_absen', intval($year))
            ->count();


        $pegawai = Pegawai::find($id);
        $hadir = ($hari - $alpha) / $hari * 100;
        $persentaseHadir = number_format($hadir, 2);
        $TdkHadir = 100 - $persentaseHadir;
        $persentaseTdkHadir = number_format($TdkHadir, 2);
        $kehadiran = Absensi::where('no_pegawai', $no_pegawai)
            ->whereMonth('tanggal_absen', intval($intMonth))
            ->whereYear('tanggal_absen', intval($year))
            ->orderBy('tanggal_absen', 'desc')
            ->get();

        $months = [
            'January' => 1, 'Febuary' => 2, 'March' => 3,
            'April' => 4, 'May' => 5, 'June' => 6,
            'July' => 7, 'August' => 8, 'September' => 9,
            'October' => 10, 'November' => 11, 'December' => 12
        ];

        $cuti = Cuti::where('id_pegawai', $id)->orderBy('created_at', 'desc')->first();
        // dd($cuti);
        $bulanIni = $intMonth;

        /* Lama Kerja */
        $tgl_masuk = Auth::user()->tgl_masuk;
        $tgl_now = date("Y-m-d");

        $ts1 = strtotime($tgl_masuk);
        $ts2 = strtotime($tgl_now);

        $year1 = date('Y', $ts1);
        $year2 = date('Y', $ts2);

        $month1 = date('m', $ts1);
        $month2 = date('m', $ts2);

        $lamaKerja = (($year2 - $year1) * 12) + ($month2 - $month1);

        $syarat_bulan_cuti_tahunan = $peraturan->syarat_bulan_cuti_tahunan;

        $syarat_bulan_cuti_besar = $peraturan->syarat_bulan_cuti_besar;
        /* End Lama Kerja */

        return view('staff.dashboard', [
            'pegawai' => $pegawai,
            'persentaseHadir' => $persentaseHadir,
            'persentaseTdkHadir' => $persentaseTdkHadir,
            'kehadiran' => $kehadiran,
            'cuti' => $cuti,
            'checkData' => $checkData,

            'months' => $months,
            'bulanIni' => $bulanIni,
            'tahunIni' => $year,

            'peraturan' => $peraturan,

            'sisaTahunan' => $sisaTahunan,
            'sisaBersama' => $sisaBersama,
            'sisaPenting' => $sisaPenting,
            'sisaBesar' => $sisaBesar,
            'sisaSakit' => $sisaSakit,
            'sisaHamil' => $sisaHamil,

            'lamaKerja' => $lamaKerja,

            'syarat_bulan_cuti_tahunan' => $syarat_bulan_cuti_tahunan,

            'syarat_bulan_cuti_besar' => $syarat_bulan_cuti_besar,

        ]);
    }

    public function openFile($data)
    {

        $month = Crypt::decryptString($data);
        $path = public_path() . '\slip_gaji';
        $fileName = '\\' . Auth::user()->id . '_' . $month . '-' . date('Y') . '.pdf';
        $pathToFile = $path . $fileName;
        return response()->file($pathToFile);
        // dd($path . $fileName);
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
        //
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
        //
    }
    
    public function showAbsensi()
    {
        //
        $user = Auth::user();
        $id = $user->id;

        $pegawai = Pegawai::where('id', $id)->first();
        $sevenDaysAgo = Carbon::now()->subDays(3)->toDateString();
        // $startDate = Carbon::create(2024, 2, 1)->toDateString();
        $startDate = Carbon::now()->subMonth()->startOfMonth()->toDateString();
        if ($pegawai) {
            // If Pegawai record found, retrieve Absensi records based on the no_pegawai value
            
            $absensiRecords = Absensi::select(
                'tanggal_absen',
                DB::raw("DATE_FORMAT(absen_masuk, '%H:%i:%s') as absen_masuk"),
                DB::raw("DATE_FORMAT(absen_keluar, '%H:%i:%s') as absen_keluar"),
                'info_masuk',
               'info_keluar'
            )->where('no_pegawai', $pegawai->no_pegawai)
            ->where('tanggal_absen', '>=', $startDate) // Filter records for the last 7 days
            ->orderBy('tanggal_absen', 'desc') // Order by tanggal_absen in descending order
            ->get();
        } else {
            // Handle the case where no Pegawai record is found for the current user
            $absensiRecords = collect(); // An empty collection
        }

        $currentUserId = $id;
        $currentNoPegawai = $pegawai->no_pegawai;

        

        return view('staff.dashboard', [
            'absensiRecords' => $absensiRecords,
            'currentUserId' => $currentUserId,
            'currentNoPegawai' => $currentNoPegawai,
            'pegawai' => $pegawai,
            



        ]);


    }
}
