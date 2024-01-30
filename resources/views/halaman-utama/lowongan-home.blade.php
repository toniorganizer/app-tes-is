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
              </div>

              <div class="sidebar-item search-form">
                <h4 class="sidebar-title mt-4">Berdasarkan Kategori/jurusan</h3>
                <form id="search-form" action="/search-bidang" class="mt-3">
                  <div class="input-select">
                    <select id="bidang" name="bidang" class="form-search-home selectpicker" id="bidang" name="bidang" data-live-search="true">
                      <option value="">Pilih Jenis Lowongan</option>
                      <option value="Pembangkit Tenaga Listrik" {{ session('bidang') == 'Pembangkit Tenaga Listrik' ? 'selected' : '' }}>Pembangkit Tenaga Listrik</option>
                      <option value="Instalasi Pemanfaatan Tenaga Listrik" {{ session('bidang') == 'Instalasi Pemanfaatan Tenaga Listrik' ? 'selected' : '' }}>Instalasi Pemanfaatan Tenaga Listrik</option>
                      <option value="Transmisi Tenaga Listrik" {{ session('bidang') == 'Transmisi Tenaga Listrik' ? 'selected' : '' }}>Transmisi Tenaga Listrik</option>
                      <option value="Distribusi Tenaga Listrik" {{ session('bidang') == 'Distribusi Tenaga Listrik' ? 'selected' : '' }}>Distribusi Tenaga Listrik</option>
                      <option value="Fotografi" {{ session('bidang') == 'Fotografi' ? 'selected' : '' }}>Fotografi</option>
                      <option value="Perposan" {{ session('bidang') == 'Perposan' ? 'selected' : '' }}>Perposan</option>
                      <option value="Animasi" {{ session('bidang') == 'Animasi' ? 'selected' : '' }}>Animasi</option>
                      <option value="Desain Komunikasi Visual" {{ session('bidang') == 'Desain Komunikasi Visual' ? 'selected' : '' }}>Desain Komunikasi Visual</option>
                      <option value="Multimedia" {{ session('bidang') == 'Multimedia' ? 'selected' : '' }}>Multimedia</option>
                      <option value="Penyiaran Radio" {{ session('bidang') == 'Penyiaran Radio' ? 'selected' : '' }}>Penyiaran Radio</option>
                      <option value="Penyiaran TV" {{ session('bidang') == 'Penyiaran TV' ? 'selected' : '' }}>Penyiaran TV</option>
                      <option value="Periklanan" {{ session('bidang') == 'Periklanan' ? 'selected' : '' }}>Periklanan</option>
                      <option value="Kehumasan" {{ session('bidang') == 'Kehumasan' ? 'selected' : '' }}>Kehumasan</option>
                      <option value="Penerbitan" {{ session('bidang') == 'Penerbitan' ? 'selected' : '' }}>Penerbitan</option>
                      <option value="Telekomunikasi" {{ session('bidang') == 'Telekomunikasi' ? 'selected' : '' }}>Telekomunikasi</option>
                      <option value="Otomotif" {{ session('bidang') == 'Otomotif' ? 'selected' : '' }}>Otomotif</option>
                      <option value="Budidaya Tanaman" {{ session('bidang') == 'Budidaya Tanaman' ? 'selected' : '' }}>Budidaya Tanaman</option>
                      <option value="Kesehatan Hewan" {{ session('bidang') == 'Kesehatan Hewan' ? 'selected' : '' }}>Kesehatan Hewan</option>
                      <option value="Peternakan" {{ session('bidang') == 'Peternakan' ? 'selected' : '' }}>Peternakan</option>
                      <option value="Teknologi Pertanian" {{ session('bidang') == 'Teknologi Pertanian' ? 'selected' : '' }}>Teknologi Pertanian</option>
                      <option value="Manajemen dan Agribisnis" {{ session('bidang') == 'Manajemen dan Agribisnis' ? 'selected' : '' }}>Manajemen dan Agribisnis</option>
                      <option value="Penyuluhan Pertanian" {{ session('bidang') == 'Penyuluhan Pertanian' ? 'selected' : '' }}>Penyuluhan Pertanian</option>
                      <option value="Data Management System" {{ session('bidang') == 'Data Management System' ? 'selected' : '' }}>Data Management System</option>
                      <option value="Programming and Software Development" {{ session('bidang') == 'Programming and Software Development' ? 'selected' : '' }}>Programming and Software Development</option>
                      <option value="Hardware and Digital Peripherals" {{ session('bidang') == 'Hardware and Digital Peripherals' ? 'selected' : '' }}>Hardware and Digital Peripherals</option>
                      <option value="Network and Infrastructure" {{ session('bidang') == 'Network and Infrastructure' ? 'selected' : '' }}>Network and Infrastructure</option>
                      <option value="Operation and System Tools" {{ session('bidang') == 'Operation and System Tools' ? 'selected' : '' }}>Operation and System Tools</option>
                      <option value="Information System and Technology Development" {{ session('bidang') == 'Information System and Technology Development' ? 'selected' : '' }}>Information System and Technology Development</option>
                      <option value="IT Governance and Management" {{ session('bidang') == 'IT Governance and Management' ? 'selected' : '' }}>IT Governance and Management</option>
                      <option value="IT Project Management" {{ session('bidang') == 'IT Project Management' ? 'selected' : '' }}>IT Project Management</option>
                      <option value="IT Enterprise Architecture" {{ session('bidang') == 'IT Enterprise Architecture' ? 'selected' : '' }}>IT Enterprise Architecture</option>
                      <option value="IT Security and Compliance" {{ session('bidang') == 'IT Security and Compliance' ? 'selected' : '' }}>IT Security and Compliance</option>
                      <option value="IT Services Management System" {{ session('bidang') == 'IT Services Management System' ? 'selected' : '' }}>IT Services Management System</option>
                      <option value="IT and Computing Facilities Management" {{ session('bidang') == 'IT and Computing Facilities Management' ? 'selected' : '' }}>IT and Computing Facilities Management</option>
                      <option value="IT Multimedia" {{ session('bidang') == 'IT Multimedia' ? 'selected' : '' }}>IT Multimedia</option>
                      <option value="IT Mobility and Internet of Things" {{ session('bidang') == 'IT Mobility and Internet of Things' ? 'selected' : '' }}>IT Mobility and Internet of Things</option>
                      <option value="Integration Application System" {{ session('bidang') == 'Integration Application System' ? 'selected' : '' }}>Integration Application System</option>
                      <option value="IT Consultancy and Advisory" {{ session('bidang') == 'IT Consultancy and Advisory' ? 'selected' : '' }}>IT Consultancy and Advisory</option>
                      <option value="Lainnya" {{ session('bidang') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select> 
                </div>
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
                    {{-- <i class="bi bi-x-circle"></i> --}}
                    
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