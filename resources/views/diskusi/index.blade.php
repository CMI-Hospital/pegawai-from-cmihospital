@extends('layout.base')

@section('content')
    <div class="container">
        <h1 class="mt-5 mb-4">Halaman Konten</h1>

        <div class="row">
            <div class="col-md-12">
                <!-- Form for adding new diskusi -->
                <form action="{{ route('diskusi.store') }}" method="POST" class="mb-4">
                    @csrf
                    <input type="hidden" name="konten_tanggal" value="{{ now()->toDateString() }}">
                    <input type="hidden" name="no_pegawai" value="{{ $loggedUserNoPegawai }}">
                    <input type="hidden" name="konten_jam" id="konten_jam" class="form-control">
                    <div class="form-group">
                        <label for="konten_isi">Tambah Konten Baru</label>
                        <textarea name="konten_isi" id="konten_isi" rows="3" class="form-control"></textarea>
                    </div>
                    <!-- Add input fields for other columns as needed -->
                    <button type="submit" class="btn btn-primary">Tambah Konten</button>
                </form>
                <script>
                    // Function to get the current time in Bandung time zone
                    function getCurrentTime() {
                        // Create a new Date object
                        var now = new Date();
                        
                        // Get the time zone offset for Bandung (Waktu Indonesia Barat)
                        var offset = 7; // Bandung time zone is UTC+7
                        
                        // Adjust the hours according to the time zone offset
                        now.setUTCHours(now.getUTCHours() + offset);
                        
                        // Format the time as HH:MM:SS (e.g., 08:30:00)
                        var hours = ('0' + now.getUTCHours()).slice(-2);
                        var minutes = ('0' + now.getUTCMinutes()).slice(-2);
                        var seconds = ('0' + now.getUTCSeconds()).slice(-2);
                        
                        // Return the formatted time
                        return hours + ':' + minutes + ':' + seconds;
                    }
                
                    // Set the value of the hidden input field to the current time in Bandung time zone
                    document.addEventListener('DOMContentLoaded', function() {
                        var kontenJamInput = document.getElementById('konten_jam');
                        kontenJamInput.value = getCurrentTime();
                    });
                </script>
                <div class="list-group">
                    <!-- Display all diskusis -->
                    @foreach ($diskusis as $diskusi)
                        <div class="list-group-item">
                            <p class="mb-1">{{ $diskusi->konten_isi }}</p>
                            <small class="text-muted">
                                @if ($diskusi->pegawai)
                                    By: {{ $diskusi->pegawai->nama }} 
                                    ({{ $diskusi->konten_tanggal->format('Y-m-d') }})
                                @endif
                            </small>
                        </div>
                    @endforeach
                </div>
                
            </div>

            <div class="col-md-4">
                
            </div>
        </div>
    </div>
@endsection
