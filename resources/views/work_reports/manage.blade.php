@extends('layout.base')

@section('content')
    <div class="container">
        <h2>Menejemen Laporan Kerja</h2>

      
            <!-- Display form for filtering work reports -->
            <form class="mb-3" action="{{ route('work-reports.index') }}" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <label for="nama_pegawai" class="form-label">Nama Pegawai:</label>
                        <select class="form-select" name="nama_pegawai" id="nama_pegawai">
                            <!-- Populate dropdown with employee names -->
                            @foreach($pegawaiList as $pegawai)
                                <option value="{{ $pegawai->id }}">{{ $pegawai->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="work_date" class="form-label">Tanggal:</label>
                        <input class="form-control" type="date" name="work_date" id="work_date">
                    </div>
                    <div class="col-md-2 align-self-end">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        

        <table class="table">
            <thead>
                <tr>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Keterangan</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workReports as $workReport)
                    @if (request()->has('work_date'))
                        @if ($workReport->work_date == request('work_date'))
                            <tr>
                                <td>{{ $workReport->start_time }}</td>
                                <td>{{ $workReport->end_time }}</td>
                                <td>{{ $workReport->work_description }}</td>
                                <td>{{ $workReport->work_date }}</td>
                                <td>{{ $workReport->pegawai->nama }}</td>
                                <td>
                                    @if (auth()->check() && auth()->user()->id == $workReport->pegawai_id)
                                        <a href="{{ route('work-reports.edit', $workReport->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <!-- Add delete button if needed -->
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @else
                        <tr>
                            <td>{{ $workReport->start_time }}</td>
                            <td>{{ $workReport->end_time }}</td>
                            <td>{{ $workReport->work_description }}</td>
                            <td>{{ $workReport->work_date }}</td>
                            <td>{{ $workReport->pegawai->nama }}</td>
                            <td>
                                @if (auth()->check() && auth()->user()->id == $workReport->pegawai_id)
                                    <a href="{{ route('work-reports.edit', $workReport->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <!-- Add delete button if needed -->
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection