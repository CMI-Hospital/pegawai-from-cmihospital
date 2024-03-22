@extends('layout.base')


@section('title', 'Tambah Data Role')


@section('content_header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-hat"></i> <span class="text-semibold">Data Role</span>
                    - Tambah Data Role</h4>
            </div>

        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li> <a href="{{ route('divisi.index') }}"> <i class="active icon-home2 position-left"></i> List Data
                        Role
                    </a>
                </li>
                <li class="active">Tambah Data Role</li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="panel bg-info">
        <div class="panel-heading">
            <em>
                <h6> Halaman ini berguna apabila anda ingin menambah data Role baru, selalu <b>cross-check</b> dengan HRD
                    megenai daftar Role di dalam perusahaan.</h6>
            </em>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="close"></a></li>
                </ul>
            </div>

        </div>
    </div>

    <form method="post" enctype="multipart/form-data" action="{{ route('divisi.store') }}">

        {{ csrf_field() }}

        <div class="panel panel-flat">
            <div class="panel-body">
                <div class="form-group">
                    <label for="">Role</label>
                    <input type="text" name="nm_divisi" class="form-control" placeholder="Nama Role . . . "
                        value="{{ old('nm_divisi') }}">

                    @if ($errors->has('nm_divisi'))
                        <div class="text-danger">
                            {{ $errors->first('nm_divisi') }}
                        </div>
                    @endif
                </div>


                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary">Submit form <i
                            class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    </form>
    <!-- /2 columns form -->

@endsection
