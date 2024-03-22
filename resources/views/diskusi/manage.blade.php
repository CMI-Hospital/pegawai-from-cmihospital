@extends('layout.base')

@section('content')
    <div class="container">
        <h2>Menejemen Konten</h2>
        
        <!-- Display form for filtering work reports -->
            <form class="mb-3" action="{{ route('diskusi.manage') }}" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <label for="no_pegawai" class="form-label">Nama Pegawai:</label>
                        <select class="form-select" name="no_pegawai" id="no_pegawai">
                            <!-- Populate dropdown with employee names -->
                            @foreach($pegawaiList as $pegawai)
                                <option value="{{ $pegawai->no_pegawai }}">{{ $pegawai->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="konten_tanggal" class="form-label">Tanggal:</label>
                        <input class="form-control" type="date" name="konten_tanggal" id="konten_tanggal">
                    </div>
                    <div class="col-md-2 align-self-end">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="https://pegawai.cmihospital.com/manage/diskusi" class="btn btn-warning">Reset</a>
                    </div>
                </div>
            </form>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width:5%">#</th>
                    <th style="width:10%">Tanggal</th>
                    <th style="width:15%">Nama</th>
                    <th style="width:60%">Isi Konten</th>
                    <th style="width:5%">Sudah dicek?</th>
                    <th style="width:5%">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $rowNumber = 1; @endphp
                @foreach ($kontenawal as $kontens)
                    <tr>
                        <td>{{ $rowNumber }}</td>
                        <td>{{ \Carbon\Carbon::parse($kontens->konten_tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $kontens->pegawai->nama }}</td>
                        <td>{{ $kontens->konten_isi }}</td>
                        <td>{{ $kontens->konten_cek }}</td>
                        <td>
                            <!-- Your action buttons here -->
                        </td>
                    </tr>
                    @php $rowNumber++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>

   
@endsection
