@extends('dashboard/main')

@section('container')
@include('dashboard/templates/header')
@include('dashboard/templates/sidebar')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Struktur tenaga kerja</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Struktur tenaga kerja</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if (session('success'))
    <div class="alert alert-primary">
        {{ session('success') }}
    </div>
    @endif

    <section class="section profile">
        <div class="row">
            <p style="text-align: justify; font-size: 14px">Berikut merupakan data Tenaga kerja yang terdaftar pada sistem. Pada halaman ini tenaga kerja diurutkan berdasasarkan <strong> kelengkapan informasi data diri tenaga kerja</strong>. Selain itu terdapat form pencarian berdasarkan <strong> rentang umur dan keterampilan</strong>. Form rentang umur dapat digunakan dengan cara memasukan umur terendah sampai umur tertinggi yang ingin dicari, pada contoh umur yang dicari pada <strong> rentang 19-23 tahun</strong>.</p>
            <div class="col-xl-4 col-md-6 align-self-start">
                <form action="search-umur" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="umur1" class="form-control" placeholder="19" aria-label="Cari berdasarkan keterampilan" aria-describedby="button-addon2" value="{{request()->input('umur1')}}" required>
                    <input type="text" name="umur2" class="form-control" placeholder="23" aria-label="Cari berdasarkan keterampilan" aria-describedby="button-addon2" value="{{request()->input('umur2')}}" required>
                    <div class="input-group-append">
                      <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                    </div>
                </div>
                </form>
                </div>
            <div class="col-xl-4 col-md-6 align-self-end">
            <form action="search-keterampilan" method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="query" class="form-control" placeholder="Cari berdasarkan keterampilan" aria-label="Cari berdasarkan keterampilan" aria-describedby="button-addon2" value="{{request()->input('query')}}">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                </div>
            </div>
            </form>
            </div>
        </div>
            <div class="row">
            @foreach ($data as $item)
            <div class="col-xl-4 col-md-6">
                <div class="card card-pekerja">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="
                        @if($item->foto_pencari_kerja == 'default.jpg')
                          {{ Storage::url('public/user/default/').$item->foto_pencari_kerja}}
                          @else
                          {{ Storage::url('public/user/').$item->foto_pencari_kerja}}
                          @endif
                        " alt="Profile" class="rounded-circle img-list-pekerja">
                        <h2 class="nama-pekerja">{{$item->nama_lengkap}}</h2>
                        <h3>{{$item->keterampilan}}</h3>
                        {{-- <div class="social-links mt-2">
                            <span class="text-success small pt-1 fw-bold">{{$item->jumlah_pelamar}}</span> <span class="text-muted small pt-2 ps-1">Pendaftar</span>
                        </div> --}}
                        <div class="social-links mt-2">
                            <center>
                                <a href="/profil-tenaga-kerja/{{$item->email_pk}}" class="detail-pendaftar">Lihat Tenaga Kerja</a>
                            </center>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
            </div>
        </div>
    </section>

</main><!-- End #main -->

@include('dashboard/templates/footer')
@endsection