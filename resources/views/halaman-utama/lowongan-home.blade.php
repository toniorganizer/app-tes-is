@extends('halaman-utama/main')

@section('content')
@include('halaman-utama/templates/header')

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs">
    <div class="container">

      <div class="d-flex justify-content-between align-items-center">
        <h2>Lowongan Pekerjaan</h2>
        <ol>
          <li><a href="/">Home</a></li>
          <li>Lowongan Pekerjaan</li>
        </ol>
      </div>

    </div>
  </div><!-- End Breadcrumbs -->

  <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row g-5">

            <div class="col-lg-4">

            <div class="sidebar">

              <div class="sidebar-item search-form">
                <h3 class="sidebar-title">Cari dengan kata kunci</h3>
                <form action="/searching-lowongan" class="mt-3" method="get"><i class="bi bi-briefcase"></i>
                  @csrf
                  <input type="text" placeholder="Cari lowongan" name="lowongan" value="{{ session('lowongan') }}">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>

                <h3 class="sidebar-title mt-4">Berdasarkan Lokasi</h3>
                <form action="/searching-lokasi" class="mt-3" method="get"><i class="bi bi-geo-alt"></i>
                  @csrf
                  <input type="text" name="lokasi" placeholder="Kota atau daerah" value="{{ session('lokasi') }}">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>

                <h4 class="sidebar-title mt-4">Berdasarkan Kategori/jurusan</h3>
                <form action="" class="mt-3"><i class="bi bi-check2-circle"></i>
                  <input class="input" type="text" placeholder="Jurusan">
                  <button type="submit"><i class="bi bi-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

            </div><!-- End Blog Sidebar -->

          </div>

          <div class="col-lg-8">

            <div class="row gy-4 posts-list">

            @foreach($data as $item)
              <div class="col-lg-6">
                <article class="d-flex flex-column">

                  <div class="post-img">
                    <img src="
                    @if($item->foto_lowongan == 'default.jpg')
                    {{ Storage::url('public/informasi-lowongan/default/').$item->foto_lowongan}}
                    @else
                    {{ Storage::url('public/informasi-lowongan/').$item->foto_lowongan}}
                    @endif
                    " alt="" class="img-fluid">
                  </div>

                  <h2 class="title">
                    <a href="/detail-informasi-lowongan/{{$item->id_informasi_lowongan}}">{{$item->judul_lowongan}}</a>
                  </h2>

                  <div class="icon">
                    {{-- <i class="bi bi-briefcase"></i> --}}
                    {{$item->name}}
                  </div>
                  <div class="icon-lokasi">
                    <i class="bi bi-geo-alt"></i>
                    {{mb_strimwidth($item->lokasi, 0, 42, "...");}}
                  </div>
                  <div class="icon-tanggal">
                    <i class="bi bi-clock"></i>
                    {{date('d/m/Y', strtotime($item->created_at))}}
                  </div>
                  <div class="gaji">
                    Estimasi gaji : Rp.{{$item->salary}}
                  </div>
                  @if($item->verifikasi == 1)
                  <div class="verifikasi">
                    <i class="bi bi-check-circle"></i>
                    Terverifikasi Disnaker
                  </div>
                  @elseif($item->verifikasi == 2)
                  <div class="no-verifikasi">
                    <i class="bi bi-x-circle"></i>
                    Tidak disetujui
                  </div>
                  @else
                    <div class="verifikasi">
                      <i class="bi bi-arrow-counterclockwise"></i>
                      Belum diverifikasi
                    </div>
                  @endif

                  <div class="read-more mt-auto align-self-end">
                    <a href="/detail-informasi-lowongan/{{$item->id_informasi_lowongan}}">Selengkapnya</a>
                  </div>

                </article>
              </div>
              @endforeach

            </div><!-- End blog posts list -->

            <div class="blog-pagination"> 
              {{-- <ul class="justify-content-center">
                <li><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
              </ul> --}}
              <nav aria-label="Page navigation">
                <ul class="pagination">
                    <li class="page-item{{ ($data->currentPage() == 1) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $data->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    @for ($i = 1; $i <= $data->lastPage(); $i++)
                        <li class="page-item{{ ($data->currentPage() == $i) ? ' active' : '' }}">
                            <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item{{ ($data->currentPage() == $data->lastPage()) ? ' disabled' : '' }}">
                        <a class="page-link" href="{{ $data->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
            </div><!-- End blog pagination -->

            

          {{-- {{ $data->links() }} --}}

          </div>

        </div>

      </div>
    </section>
  

</main><!-- End #main -->

@include('halaman-utama/templates/footer')
@endsection