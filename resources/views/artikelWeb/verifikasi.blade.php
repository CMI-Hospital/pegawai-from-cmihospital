@extends('layout.base')


@section('title', 'Riwayat Cuti')


@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-user"></i> <span class="text-semibold">Menu HRD</span>
                    - Verifikasi Artikel</h4>
            </div>

        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="panel bg-info">
            <div class="panel-heading">
                <em>
                    <h6>Pada halaman ini terdapat Data Artikel anda tahun ini. semua Data Artikel dari
                        yang manual
                        <b> Bisa dirubah untuk tahun data artikel dengan mengklik icon </b> <i class=" icon-more2"></i>
                    </h6>
                </em>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>

            </div>
        </div>

    </div>
    <div class="row">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">List Verifikasi Data Artikel Tahun {{ $thisYear }}</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class=" icon-more2"></i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="" data-toggle="modal" data-target="#modal_form_tahun"> <i
                                            class=" icon-calendar"></i>
                                        Pilih Tahun </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="panel-body table-responsive">
                <table class="table datatable-basic table-bordered table-striped table-hover ">
                    <thead class="bg-primary">
                        <tr>
                            <th>No</th>
                            <th>Id Artikel</th>
                            <th>Judul Artikel</th>
                            <th>Date Created</th>
                            <th>Verifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @if ($artikel->count())
                            @foreach ($artikel as $key => $p)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $p->id_artikel }}</td>
                                    <td>{{ $p->judul_id }}</td>
                                    <td>{{ date('d-M-Y', strtotime($p->created_at)) }}</td>
                                    <td>
                                        @if ($p->status_publish == 1)
                                        <button class="btn btn-sm btn-danger" onclick="returnVerifikasi({{ $p->id }})">UnVerifikasi</button>
                                        @else
                                        <button class="btn btn-sm btn-success" onclick="verifikasi({{ $p->id }})">Verifikasi</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /basic datatable -->


    <!-- cutiSakit form modal -->
    <div id="modal_form_tahun" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('artikelWeb.artikelFilterByDate') }}" method="POST">

                    {{ csrf_field() }}

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tahun </label>
                            <input name="tahun" type="text" class="form-control"
                                placeholder="Masukan Tahun Contoh = '2012' tanpa tanda petik">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /vertical form modal -->

@endsection

@section('custom_script')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    
    function verifikasi(id) {
        var condition = confirm("Yakin ingin menverifikasi artikel?");
        
        if (condition) {

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/verifikasi/' + id,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        alert('Berhasil verifikasi!')
                        location.reload()
                        console.log(response);  
                    },
                    error: function(xhr, status, error) {
                        alert('Gagal verifikasi!')
                        location.reload()
                        console.error(xhr.responseText);
                    }
                });
                 
        } else {
                alert("Tidak Jadi Konfirmasi");
                   
        }
    }



    function returnVerifikasi(id) {
        var condition = confirm("Yakin ingin meng unverifikasi artikel?");
        
        if (condition) {

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: '/unverifikasi/' + id,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        alert('Berhasil un verifikasi!')
                        location.reload()
                        console.log(response);  
                    },
                    error: function(xhr, status, error) {
                        alert('Gagal un verifikasi!')
                        location.reload()
                        console.error(xhr.responseText);
                    }
                });
                 
        } else {
                alert("Tidak Jadi Konfirmasi");
                   
        }
    }



</script>
@endsection
