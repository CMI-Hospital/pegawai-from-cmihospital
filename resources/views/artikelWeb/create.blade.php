@extends('layout.base')

@section('content_header')
    <div class="page-header page-header-default">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-pencil7"></i> <span class="text-semibold">Input Artikel</span></h4>
            </div>

        </div>
    </div>
@endsection

@section('content')

    <form method="post" enctype="multipart/form-data" action="{{ route('artikelWeb.store') }}">

        {{ csrf_field() }}

        <div class="panel panel-flat">
            <div class="panel-body">
                <div class="row">
                    <h4>Kontributor</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Penulis</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <select name="penulis" class="form-control select2" id="" required>
                                <option value="">Silahkan Pilih</option>
                                @foreach ($user as $p)
                                 <option value="{{ $p->id }}">{{ $p->name }}</option>
                                @endforeach
                             
                            </select>
                            <i class="text-info">*Penulis Kontributor Artikel</i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Kategori</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <select name="kategori" class="form-control select2" id="" required>
                                <option value="">Silahkan Pilih</option>
                                @foreach ($kategori as $k)
                                 <option value="{{ $k->id_kategori }}">{{ $k->nama_kategori }}</option>
                                @endforeach
                             
                            </select>
                            <i class="text-info">*Kategori Artikel</i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Sub Kategori</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <select name="sub_kategori" class="form-control select2" id=""required>
                                <option value="">Silahkan Pilih</option>
                                @foreach ($sub_kategori as $sp)
                                 <option value="{{ $sp->id_sub_kategori }}">{{ $sp->nama_sub_kategori }}</option>
                                @endforeach
                             
                            </select>
                            <i class="text-info">*Sub Kategori Artikel</i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Publish Status</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <select name="publish_status" class="form-control select2" id="" required>
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                             
                            </select>
                            <i class="text-info">*Di Tampilkan/Sembunyikan dari Website</i>
                        </div>
                    </div>
                </div>


                {{-- <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary">Submit form <i
                            class="icon-arrow-right14 position-right"></i></button>
                </div> --}}
            </div>
        </div>






        <div class="panel panel-flat">
            <div class="panel-body">
                <div class="row">
                    <h4>Judul</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Judul (Bahasa)</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="judul_bahasa" class="form-control" placeholder="Masukan Judul" required>
                            <i class="text-info">*Judul Menggunakan Bahasa Indonesia</i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Judul (English)</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="judul_english" class="form-control" placeholder="Input Title" required>
                            <i class="text-info">*Judul Menggunakan Bahasa Inggris</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-flat">
            <div class="panel-body">
                <div class="row">
                    <h4>Artikel Mencangkup Teks Dan Gambar Dengan 2 Bagian</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Gambar(1) Artikel</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <img class="img-preview1 img-fluid mb-3 col-sm-5">
                            <input class="form-control " type="file" id="gambar1" name="gambar1" onchange="previewImage1()" required>
                            <i class="text-info">*Pilih Gambar / Foto Dengan Maksimal Upload 2 Mbyte</i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Alt Tag Gambar/Info Gambar (1) </h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" name="infoGambar_1" class="form-control" placeholder="Info gambar 1" required>
                            <i class="text-info">*Isi dengan tag/text yang bisa menaikan SEO agar pencarian di google tinggi</i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Isi Artikel (1)</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="mb-3">
                                <input id="isiArtikel_1" type="hidden" name="isiArtikel_1" required>
                                <trix-editor input="isiArtikel_1"></trix-editor>
                              </div>
                            <i class="text-info">*Isi artikel dengan menggunakan bahasa Indonesia</i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Isi Artikel English(1)</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="mb-3">
                                <input id="isiArtikelEn_1" type="hidden" name="isiArtikelEn_1" required>
                                <trix-editor input="isiArtikelEn_1"></trix-editor>
                              </div>
                            <i class="text-info">*Isi artikel dengan menggunakan bahasa Ingris</i>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Gambar(2) Artikel</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <img class="img-preview2 img-fluid mb-3 col-sm-5">
                            <input class="form-control " type="file" id="gambar2" name="gambar2" onchange="previewImage2()" required>
                            <i class="text-info">*Pilih Gambar / Foto Dengan Maksimal Upload 2 Mbyte</i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Alt Tag Gambar/Info Gambar (2) </h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="infoGambar_2" placeholder="Info gambar 1" required>
                            <i class="text-info">*Isi dengan tag/text yang bisa menaikan SEO agar pencarian di google tinggi</i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Isi Artikel (2)</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="mb-3">
                                <input id="isiArtikel_2" type="hidden" name="isiArtikel_2" required>
                                <trix-editor input="isiArtikel_2"></trix-editor>
                              </div>
                            <i class="text-info">*Isi artikel dengan menggunakan bahasa Indonesia</i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Isi Artikel English (2)</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="mb-3">
                                <input id="isiArtikelEn_2" type="hidden" name="isiArtikelEn_2" required>
                                <trix-editor input="isiArtikelEn_2"></trix-editor>
                              </div>
                            <i class="text-info">*Isi artikel dengan menggunakan bahasa Ingris</i>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <div class="panel panel-flat">
            <div class="panel-body">
                <div class="row">
                    <h4>SEO - Search Engine Optimazation</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Keyword</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="keyword" required>
                            <i class="text-info">*Isi keyword dengan menganalisanya terlebih dahulu di google analytic</i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Slug 1</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="slug1" required>
                            <i class="text-info">*Contoh: Klinik-utama-cmi-adalah-klinik-komplementer-terbaik-di-indonesia</i>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Slug 2</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control"  name="slug2" required>
                            <i class="text-info">*Contoh: cmi-hospital-is-the-best-komplementer-in-Indonesia</i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 text-right">
                        <div class="form-group">
                            <h5>Tagar</h5>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="tagar" required>
                            <i class="text-info">*Contoh: #cmihospital #jantung #diabetes #komplementer
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="panel panel-flat">
            <div class="panel-body">
                <div class="text-right mt-3">
                    <button type="submit" class="btn btn-primary">Submit form <i
                            class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>



    </form>
    <!-- /2 columns form -->
    <script>
        $('.select2').select2( {
                 theme: 'bootstrap-5'
            } );
        
        document.addEventListener('trix-file-accept', function(e){
                 e.preventDefault();
             })
    
        function previewImage1() {
                    
                const image = document.querySelector('#gambar1');
                const imgPreview = document.querySelector('.img-preview1');


                imgPreview.style.display = 'block';

                const oFReader = new FileReader();
                oFReader.readAsDataURL(image.files[0]);

                oFReader.onload = function(oFREvent) {
                    imgPreview.src = oFREvent.target.result;
                }
            }

        function previewImage2() {
                    
                    const image = document.querySelector('#gambar2');
                    const imgPreview = document.querySelector('.img-preview2');
    
    
                    imgPreview.style.display = 'block';
    
                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(image.files[0]);
    
                    oFReader.onload = function(oFREvent) {
                        imgPreview.src = oFREvent.target.result;
                    }
                }
    </script>
@endsection
