@extends('layout.base')

@section('content')
    <div class="container">
        <h2>List Konten Dua Bulan Terakhir</h2>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Isi Konten</th>
                    <!--<th>Sudah dicek?</th>-->
                    <!--<th>Action</th>-->
                </tr>
            </thead>
            <tbody>
                @php $rowNumber = 1; @endphp
                @foreach ($kontenawal as $kontens)
                    <tr>
                        <td>{{ $rowNumber }}</td>
                        <td>{{ date('Y-m-d', strtotime($kontens->konten_tanggal)) }}</td>
                        <td>{{ $kontens->konten_jam }}</td>
                        <td>{{ $kontens->konten_isi }}</td>
                        <!--<td>{{ $kontens->konten_cek }}</td>-->
                        <!--<td>-->
                            <!-- Your action buttons here -->
                        <!--</td>-->
                    </tr>
                    @php $rowNumber++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>

    <!--<div class="container mt-5">-->
    <!--    <h2>Konten Report</h2>-->
    <!--    <p>Total Konten: {{ $totalKonten }}</p>-->
    <!--    <p>Total Hari: {{ $totalDays }}</p>-->
    <!--    <p>Total Hari yang sudah buat konten: {{ $totalDaysWithKonten }}</p>-->
    <!--    <p>Total Hari yang belum buat konten: {{ $totalDaysWithoutKonten }}</p>-->
    <!--    <table class="table table-striped">-->
    <!--        <thead>-->
    <!--            <tr>-->
    <!--                <th>Tanggal</th>-->
    <!--                <th>Sudah buat konten?</th>-->
    <!--            </tr>-->
    <!--        </thead>-->
    <!--        <tbody>-->
    <!--            @foreach ($kontenPerDay as $kontenPerDays => $hasKonten)-->
    <!--                <tr>-->
    <!--                    <td>{{ $kontenPerDays }}</td>-->
    <!--                    <td>{{ $hasKonten ? 'Iya' : 'Tidak' }}</td>-->
    <!--                </tr>-->
    <!--            @endforeach-->
    <!--        </tbody>-->
    <!--    </table>-->
    <!--</div>-->

@endsection
