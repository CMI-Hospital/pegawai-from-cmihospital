@extends('layout.base')

@section('title', 'Dashboard')


@section('content_header')
    <div class="page-header page-header-default">

        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-user position-left"></i> <span class="text-semibold">Menu Staff</span>
                    - Dashboard Staff</h4>
            </div>

        </div>

    </div>
@endsection

@section('content')
<div class="row"> 
    <div class="col-md-12">
        <div class="panel bg-info">
            <div class="panel-heading">
                <em>
                    <h6>Berikut adalah dashboard untuk <b>Staff</b> yang berisi informasi mengenai kegiatan anda yang
                        terekam di dalam sistem seperti Persentase Kehadiran, Data Kehadiran, Pengajuan Cuti Terakhir, dan
                        lainya.</h6>
                </em>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    </div>
    
    <div class="row">    
    <div class="col-md-6">
        <div class="panel">

    <?php
// Set default timezone
date_default_timezone_set('Asia/Jakarta');

// Dapatkan tahun, bulan, dan hari saat ini
// $tahun = 2024;
// $bulan = 2;
// $hari = date('j');

// // Dapatkan jumlah hari dalam bulan saat ini
// $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
// Get the current date
$currentDate = new DateTime('now');

// Subtract one month from the current date
$currentDate->sub(new DateInterval('P1M'));

// Get the year and month of the previous month
$tahun = $currentDate->format('Y');
$bulan = $currentDate->format('m');
$hari = $currentDate->format('j');

// Calculate the number of days in the previous month
$jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

// Dapatkan hari pertama dalam bulan ini
$hariPertama = date('w', strtotime($tahun . '-' . $bulan . '-01'));

// Tentukan nama bulan dan hari
$namaBulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$namaHari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

// Output tabel kalender
echo '<div class="panel-heading"><h5 class="panel-title">Absen Masuk Bulan '. $namaBulan[$bulan-1] . ' ' . $tahun .'</h5></div>';
echo '<table class="table" border=1>';
echo '<thead>';
echo '<tr>';
foreach ($namaHari as $hariNama) {
    echo '<th class="text-center" >' . $hariNama . '</th>';
}
echo '</tr>';
echo '</thead>';
echo '<tbody>';
echo '<tr>';
// Output sel kosong sampai hari pertama dalam bulan
for ($i = 0; $i < $hariPertama; $i++) {
    echo '<td></td>';
}
// Output sel untuk setiap hari dalam bulan


for ($nomorHari = 1; $nomorHari <= $jumlahHari; $nomorHari++) {
    $sudah = False; // Initialize $sudah as False at the beginning of each iteration
    $hariDalamMinggu = date('w', strtotime($tahun . '-' . $bulan . '-' . $nomorHari));
    $tgl = ""; // Initialize $tgl as an empty string at the beginning of each iteration

    foreach ($absensiRecords as $record) {
        // Extract the day (DD) from the yyyy-mm-dd format
        $tgl_record = substr($record->tanggal_absen, 8, 2);
        $bln_record = substr($record->tanggal_absen, 5, 2);
        // echo $bln_record . "-" . $bulan;

        if ($tgl_record == $nomorHari && $bln_record == $bulan) {
            $sudah = True; // Set $sudah to True if a record matches the current day
            if ($record->info_masuk == 0) {
                echo '<td class="text-center bg-grey">' . $nomorHari . '</td>';
            } elseif ($record->info_masuk == 1) {
                echo '<td class="text-center bg-success">' . $nomorHari . '</td>';
            } elseif ($record->info_masuk == 2) {
                echo '<td class="text-center bg-info">' . $nomorHari . '</td>';
            } elseif ($record->info_masuk == 3) {
                echo '<td class="text-center bg-danger">' . $nomorHari . '</td>';
            } else {
                echo '<td class="text-center bg-warning">' . $nomorHari . '</td>';
            }
            break; // Exit the loop after finding a matching record
        }
    }

    if (!$sudah) {
        // If no record matches the current day, display an empty cell
        echo '<td class="text-center">' . $nomorHari . '</td>';
    }

    // Check if it's the end of the week (Saturday) to start a new row
    if ($hariDalamMinggu == 6) {
        echo '</tr><tr>';
    }
}
// Output sel kosong setelah hari terakhir dalam bulan
for ($i = $hariDalamMinggu; $i < 6; $i++) {
    echo '<td></td>';
}
echo '</tr>';
echo '</tbody>';
echo '</table>';
?>
</div>
</div>
<div class="col-md-6">
<div class="panel">

<?php
// Set default timezone
date_default_timezone_set('Asia/Jakarta');

// Dapatkan tahun, bulan, dan hari saat ini
// $tahun = 2024;
// $bulan = 2;
// $hari = date('j');

// // Dapatkan jumlah hari dalam bulan saat ini
// $jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
// Get the current date
$currentDate = new DateTime('now');

// Subtract one month from the current date
$currentDate->sub(new DateInterval('P1M'));

// Get the year and month of the previous month
$tahun = $currentDate->format('Y');
$bulan = $currentDate->format('m');
$hari = $currentDate->format('j');

// Calculate the number of days in the previous month
$jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

// Dapatkan hari pertama dalam bulan ini
$hariPertama = date('w', strtotime($tahun . '-' . $bulan . '-01'));

// Tentukan nama bulan dan hari
$namaBulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$namaHari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

// Output tabel kalender
echo '<div class="panel-heading"><h5 class="panel-title">Absen Pulang Bulan '. $namaBulan[$bulan-1] . ' ' . $tahun .'</h5></div>';
echo '<table class="table" border=1>';
echo '<thead>';
echo '<tr>';
foreach ($namaHari as $hariNama) {
    echo '<th class="text-center" >' . $hariNama . '</th>';
}
echo '</tr>';
echo '</thead>';
echo '<tbody>';
echo '<tr>';
// Output sel kosong sampai hari pertama dalam bulan
for ($i = 0; $i < $hariPertama; $i++) {
    echo '<td></td>';
}
// Output sel untuk setiap hari dalam bulan


for ($nomorHari = 1; $nomorHari <= $jumlahHari; $nomorHari++) {
    $sudah = False; // Initialize $sudah as False at the beginning of each iteration
    $hariDalamMinggu = date('w', strtotime($tahun . '-' . $bulan . '-' . $nomorHari));
    $tgl = ""; // Initialize $tgl as an empty string at the beginning of each iteration

    foreach ($absensiRecords as $record) {
        // Extract the day (DD) from the yyyy-mm-dd format
        $tgl_record = substr($record->tanggal_absen, 8, 2);
        $bln_record = substr($record->tanggal_absen, 5, 2);
        // echo $bln_record . "-" . $bulan;

        if ($tgl_record == $nomorHari && $bln_record == $bulan) {
            $sudah = True; // Set $sudah to True if a record matches the current day
            if ($record->info_keluar == 0) {
                echo '<td class="text-center bg-grey">' . $nomorHari . '</td>';
            } elseif ($record->info_keluar == 1) {
                echo '<td class="text-center bg-success">' . $nomorHari . '</td>';
            } elseif ($record->info_keluar == 2) {
                echo '<td class="text-center bg-info">' . $nomorHari . '</td>';
            } elseif ($record->info_keluar == 3) {
                echo '<td class="text-center bg-danger">' . $nomorHari . '</td>';
            } else {
                echo '<td class="text-center bg-warning">' . $nomorHari . '</td>';
            }
            break; // Exit the loop after finding a matching record
        }
    }

    if (!$sudah) {
        // If no record matches the current day, display an empty cell
        echo '<td class="text-center">' . $nomorHari . '</td>';
    }

    // Check if it's the end of the week (Saturday) to start a new row
    if ($hariDalamMinggu == 6) {
        echo '</tr><tr>';
    }
}
// Output sel kosong setelah hari terakhir dalam bulan
for ($i = $hariDalamMinggu; $i < 6; $i++) {
    echo '<td></td>';
}
echo '</tr>';
echo '</tbody>';
echo '</table>';
?>


    </div>
</div>
    </div>
    <div class="row">    
    <div class="col-md-6">
    <div class="panel">
           
    <?php
$currentDate = new DateTime('now');

// Subtract one month from the current date
// $currentDate->sub(new DateInterval('P1M'));

// Get the year and month of the previous month
$tahun = $currentDate->format('Y');
$bulan = $currentDate->format('m');
$hari = $currentDate->format('j');

// Calculate the number of days in the previous month
$jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

// Dapatkan hari pertama dalam bulan ini
$hariPertama = date('w', strtotime($tahun . '-' . $bulan . '-01'));

// Tentukan nama bulan dan hari
$namaBulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$namaHari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

// Output tabel kalender
echo '<div class="panel-heading"><h5 class="panel-title">Absen Masuk Bulan '. $namaBulan[$bulan-1] . ' ' . $tahun .'</h5></div>';
echo '<table class="table" border=1>';
echo '<thead>';
echo '<tr>';
foreach ($namaHari as $hariNama) {
    echo '<th class="text-center" >' . $hariNama . '</th>';
}
echo '</tr>';
echo '</thead>';
echo '<tbody>';
echo '<tr>';
// Output sel kosong sampai hari pertama dalam bulan
for ($i = 0; $i < $hariPertama; $i++) {
    echo '<td></td>';
}
// Output sel untuk setiap hari dalam bulan


for ($nomorHari = 1; $nomorHari <= $jumlahHari; $nomorHari++) {
    $sudah = False; // Initialize $sudah as False at the beginning of each iteration
    $hariDalamMinggu = date('w', strtotime($tahun . '-' . $bulan . '-' . $nomorHari));
    $tgl = ""; // Initialize $tgl as an empty string at the beginning of each iteration

    foreach ($absensiRecords as $record) {
        // Extract the day (DD) from the yyyy-mm-dd format
        $tgl_record = substr($record->tanggal_absen, 8, 2);
        $bln_record = substr($record->tanggal_absen, 5, 2);
        // echo $bln_record . "-" . $bulan;

        if ($tgl_record == $nomorHari && $bln_record == $bulan) {
            $sudah = True; // Set $sudah to True if a record matches the current day
            if ($record->info_masuk == 0) {
                echo '<td class="text-center bg-grey">' . $nomorHari . '</td>';
            } elseif ($record->info_masuk == 1) {
                echo '<td class="text-center bg-success">' . $nomorHari . '</td>';
            } elseif ($record->info_masuk == 2) {
                echo '<td class="text-center bg-info">' . $nomorHari . '</td>';
            } elseif ($record->info_masuk == 3) {
                echo '<td class="text-center bg-danger">' . $nomorHari . '</td>';
            } else {
                echo '<td class="text-center bg-warning">' . $nomorHari . '</td>';
            }
            break; // Exit the loop after finding a matching record
        }
    }

    if (!$sudah) {
        // If no record matches the current day, display an empty cell
        echo '<td class="text-center">' . $nomorHari . '</td>';
    }

    // Check if it's the end of the week (Saturday) to start a new row
    if ($hariDalamMinggu == 6) {
        echo '</tr><tr>';
    }
}
// Output sel kosong setelah hari terakhir dalam bulan
for ($i = $hariDalamMinggu; $i < 6; $i++) {
    echo '<td></td>';
}
echo '</tr>';
echo '</tbody>';
echo '</table>';
?>
</div>
</div>
<div class="col-md-6">
<div class="panel">           
                
            
<?php
$currentDate = new DateTime('now');

// Subtract one month from the current date
// $currentDate->sub(new DateInterval('P1M'));

// Get the year and month of the previous month
$tahun = $currentDate->format('Y');
$bulan = $currentDate->format('m');
$hari = $currentDate->format('j');

// Calculate the number of days in the previous month
$jumlahHari = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

// Dapatkan hari pertama dalam bulan ini
$hariPertama = date('w', strtotime($tahun . '-' . $bulan . '-01'));

// Tentukan nama bulan dan hari
$namaBulan = array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$namaHari = array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

// Output tabel kalender;
echo '<div class="panel-heading"><h5 class="panel-title">Absen Pulang Bulan '. $namaBulan[$bulan-1] . ' ' . $tahun .'</h5></div>';
echo '<table class="table" border=1>';
echo '<thead>';
echo '<tr>';
foreach ($namaHari as $hariNama) {
    echo '<th class="text-center" >' . $hariNama . '</th>';
}
echo '</tr>';
echo '</thead>';
echo '<tbody>';
echo '<tr>';
// Output sel kosong sampai hari pertama dalam bulan
for ($i = 0; $i < $hariPertama; $i++) {
    echo '<td></td>';
}
// Output sel untuk setiap hari dalam bulan


for ($nomorHari = 1; $nomorHari <= $jumlahHari; $nomorHari++) {
    $sudah = False; // Initialize $sudah as False at the beginning of each iteration
    $hariDalamMinggu = date('w', strtotime($tahun . '-' . $bulan . '-' . $nomorHari));
    $tgl = ""; // Initialize $tgl as an empty string at the beginning of each iteration

    foreach ($absensiRecords as $record) {
        // Extract the day (DD) from the yyyy-mm-dd format
        $tgl_record = substr($record->tanggal_absen, 8, 2);
        $bln_record = substr($record->tanggal_absen, 5, 2);
        // echo $bln_record . "-" . $bulan;

        if ($tgl_record == $nomorHari && $bln_record == $bulan) {
            $sudah = True; // Set $sudah to True if a record matches the current day
            if ($record->info_keluar == 0) {
                echo '<td class="text-center bg-grey">' . $nomorHari . '</td>';
            } elseif ($record->info_keluar == 1) {
                echo '<td class="text-center bg-success">' . $nomorHari . '</td>';
            } elseif ($record->info_keluar == 2) {
                echo '<td class="text-center bg-info">' . $nomorHari . '</td>';
            } elseif ($record->info_keluar == 3) {
                echo '<td class="text-center bg-danger">' . $nomorHari . '</td>';
            } else {
                echo '<td class="text-center bg-warning">' . $nomorHari . '</td>';
            }
            break; // Exit the loop after finding a matching record
        }
    }

    if (!$sudah) {
        // If no record matches the current day, display an empty cell
        echo '<td class="text-center">' . $nomorHari . '</td>';
    }

    // Check if it's the end of the week (Saturday) to start a new row
    if ($hariDalamMinggu == 6) {
        echo '</tr><tr>';
    }
}
// Output sel kosong setelah hari terakhir dalam bulan
for ($i = $hariDalamMinggu; $i < 6; $i++) {
    echo '<td></td>';
}
echo '</tr>';
echo '</tbody>';
echo '</table>';
?>


    </div>
    </div>
</div>
    <div class="row">    
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h5 class="panel-title">Keterangan Warna Absensi Masuk</h5>
                </div>
                <table border=1 class="table"> 
                    <tr><td class="bg-success" style="width:10%;">...</td><td style="width:90%;">Masuk tepat waktu</td></tr>
                    <tr><td class="bg-grey">...</td><td>Kode 0</td></tr>
                    <tr><td class="bg-danger">...</td><td>Terlambat</td></tr>
                    <tr><td class="bg-warning">...</td><td>Kode -</td></tr>
                    <tr><td class="bg-info">...</td><td>Kode 2</td></tr>
                    <tr><td class="">...</td><td>Tidak absen</td></tr>        
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-heading">
                    <h5 class="panel-title">Keterangan Warna Absensi Pulang</h5>
                </div>
                <table border=1 class="table"> 
                    <tr><td class="bg-success" style="width:10%;">...</td><td style="width:90%;">Pulang tepat waktu</td></tr>
                    <tr><td class="bg-grey">...</td><td>Kode 0</td></tr>
                    <tr><td class="bg-danger">...</td><td>Belum Absen Pulang</td></tr>
                    <tr><td class="bg-warning">...</td><td>Kode -</td></tr>
                    <tr><td class="bg-info">...</td><td>Kode 2</td></tr>
                    <tr><td class="">...</td><td>-</td></tr>        
                </table>
            </div>
        </div>
    </div>
    
   
            <?php
            

            ?>
            <div class="panel-body">
                <div class="table-responsive pre-scrollable" style="height:235px">
                <!-- {{ $currentUserId }} - {{ $currentNoPegawai }} -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Kode Masuk</th>
                                <th>Jam Pulang</th>
                                <th>Kode Pulang</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($absensiRecords as $record)
                        <tr>
                            @if($record->info_masuk != 1 || $record->info_keluar != 1)
                                <td>{{ $record->tanggal_absen }}</td>
                                <td>{{ $record->absen_masuk }}</td>
                                <td>{{ $record->info_masuk }}</td>
                                <td>{{ $record->absen_keluar }}</td>
                                <td>{{ $record->info_keluar }}</td>
                                <td></td>
                            @endif
                        </tr>
                        @endforeach
                            <?php
                           
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        </div>
        <!-- <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">Kebijakan & Peraturan Kantor </h5>
            </div>
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col-md-3">
                        <div class="content-group">
                            <h5 class="text-semibold no-margin"><i class="fa fa-clock-o position-left text-slate"></i>
                                {{ date('H:i', strtotime($peraturan->jam_masuk)) }}
                            </h5>
                            <span class="text-muted text-size-small">Jam Masuk</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="content-group">
                            <h5 class="text-semibold no-margin"><i
                                    class="fa fa-clock-o position position-left text-slate"></i>
                                {{ date('H:i', strtotime($peraturan->jam_plg)) }}
                            </h5>
                            <span class="text-muted text-size-small">Jam Pulang</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="content-group">
                            <h5 class="text-semibold no-margin"><i class="fa fa-hourglass-1 position-left text-slate"></i>
                                {{ $peraturan->syarat_bulan_cuti_tahunan }} Bln
                            </h5>
                            <span class="text-muted text-size-small">Durasi Kerja untuk Cuti Tahunan</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="content-group">
                            <h5 class="text-semibold no-margin"><i class="fa fa-hourglass position-left text-slate"></i>
                                {{ $peraturan->syarat_bulan_cuti_besar }} Bln
                            </h5>
                            <span class="text-muted text-size-small">Durasi Kerja untuk Cuti Besar</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="panel">
            <div class="panel-heading">
                <h5 class="panel-title">Sisa Cuti Tahun Ini </h5>
            </div>
            <div class="container-fluid">
                <div class="row text-center">
                    @if (Auth::user()->jk == 'Wanita')
                        <div class="col-md-2">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i
                                        class="fa fa-calendar-check-o position-left text-slate"></i>
                                @if ($lamaKerja < $syarat_bulan_cuti_tahunan) 0 @else
                                        {{ $sisaTahunan }} @endif
                                </h5>
                                <span class="text-muted text-size-small">Tahunan</span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i
                                        class="fa fa-calendar-check-o position-left text-slate"></i>
                                    {{ $sisaBersama }}
                                </h5>
                                <span class="text-muted text-size-small">Bersama</span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i
                                        class="fa fa-calendar-check-o position-left text-slate"></i>
                                    {{ $sisaPenting }}
                                </h5>
                                <span class="text-muted text-size-small">Penting</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i
                                        class="fa fa-calendar-check-o position-left text-slate"></i>
                                @if ($lamaKerja < $syarat_bulan_cuti_besar) 0 @else
                                        {{ $sisaBesar }} @endif
                                </h5>
                                <span class="text-muted text-size-small">Besar</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i
                                        class="fa fa-calendar-check-o position-left text-slate"></i>
                                    {{ $sisaSakit }}
                                </h5>
                                <span class="text-muted text-size-small">Sakit</span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i
                                        class="fa fa-calendar-check-o position-left text-slate"></i>
                                    {{ $sisaHamil }}
                                </h5>
                                <span class="text-muted text-size-small">Hamil</span>
                            </div>
                        </div>
                    @else
                        <div class="col-md-3">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i
                                        class="fa fa-calendar-check-o position-left text-slate"></i>
                                @if ($lamaKerja < $syarat_bulan_cuti_tahunan) 0 @else
                                        {{ $sisaTahunan }} @endif
                                </h5>
                                <span class="text-muted text-size-small">Tahunan</span>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i
                                        class="fa fa-calendar-check-o position-left text-slate"></i>
                                    {{ $sisaBersama }}
                                </h5>
                                <span class="text-muted text-size-small">Bersama</span>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i
                                        class="fa fa-calendar-check-o position-left text-slate"></i>
                                    {{ $sisaPenting }}
                                </h5>
                                <span class="text-muted text-size-small">Penting</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i
                                        class="fa fa-calendar-check-o position-left text-slate"></i>
                                @if ($lamaKerja < $syarat_bulan_cuti_besar) 0 @else
                                        {{ $sisaBesar }} @endif
                                </h5>
                                <span class="text-muted text-size-small">Besar</span>
                            </div>
                        </div>
                        <div class="col-md-">
                            <div class="content-group">
                                <h5 class="text-semibold no-margin"><i
                                        class="fa fa-calendar-check-o position-left text-slate"></i>
                                    {{ $sisaSakit }}
                                </h5>
                                <span class="text-muted text-size-small">Sakit</span>
                            </div>
                        </div>

                    @endif
                </div>
            </div>

        </div> -->

    </div>


@endsection
@section('custom_script')

    <script>
        var oilCanvas = document.getElementById("chartData");

        Chart.defaults.global.defaultFontColor = 'black';
        Chart.defaults.global.defaultFontSize = 13;

        var inputData = {
            labels: [
                "Hadir",
                "Tidak Hadir",
            ],
            datasets: [{
                data: [{{ $persentaseHadir }}, {{ $persentaseTdkHadir }}],
                backgroundColor: [
                    "navy",
                    "red",
                ]
            }]
        };

        var pieChart = new Chart(oilCanvas, {
            type: 'pie',
            data: inputData
        });
    </script>


@endsection
