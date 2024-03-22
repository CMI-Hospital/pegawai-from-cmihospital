@extends('layout.base')

@section('content')
    <div class="container">
        <h2>Halaman Edit Laporan Kerja</h2>
        <form action="{{ route('work-reports.update', $workReport->id) }}" method="post" class="mt-4">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="start_time">Waktu Mulai:</label>
                <select name="start_time" id="start_time" class="form-control" required>
                    @for ($hour = 8; $hour <= 17; $hour++)
                        @php
                            $time = sprintf('%02d:00', $hour);
                        @endphp
                        <option value="{{ $time }}" {{ $workReport->start_time === $time ? 'selected' : '' }}>{{ $time }}</option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label for="end_time">Waktu Selesai:</label>
                <select name="end_time" id="end_time" class="form-control" required>
                    @for ($hour = 8; $hour <= 17; $hour++)
                        @php
                            $time = sprintf('%02d:00', $hour);
                        @endphp
                        <option value="{{ $time }}" {{ $workReport->end_time === $time ? 'selected' : '' }}>{{ $time }}</option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label for="work_description">Keterangan:</label>
                <textarea name="work_description" id="work_description" class="form-control" rows="4" required>{{ $workReport->work_description }}</textarea>
            </div>

            <div class="form-group">
                <label for="work_date"></label>
                <input type="date" name="work_date" id="work_date" value="{{ $workReport->work_date }}" class="form-control" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection