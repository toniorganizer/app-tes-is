@extends('dashboard/main')

@section('container')
@include('dashboard/templates/header')
@include('dashboard/templates/sidebar')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Laporan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Laporan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Laporan saat ini</h5>
                        <div class="row">
                            <div class="col-lg-11">
                                <p>Berikut merupakan data laporan saat ini.</p>
                            </div>
                            <div class="col-lg-1 float-left mb-3">
                                <a href="/uji-laporan" class="btn btn-success">
                                    <i class="bi bi-file-earmark-excel"></i>
                                </a>
                            </div>
                        </div>

                        @if (session('success'))
                        <div class="alert alert-primary">
                            {{ session('success') }}
                        </div>
                        @endif

                        <!-- Table with stripped rows -->
                        <div class="row">
                            <div class="col-md-12 overflow-scroll">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="table-primary">
                                           <th rowspan="3" class="text-center">No.</th>
                                           <th rowspan="3" class="text-center">Pencari Kerja</th>
                                           <th colspan="10" class="text-center">Kelompok umur</th>
                                           <th colspan="3" rowspan="2">2</th>
                                           <th rowspan="2">1</th>
                                           <th rowspan="3">Lowongan</th>
                                           <th rowspan="3">L</th>
                                           <th rowspan="3">P</th>
                                           <th rowspan="3">JML</th>
                                           <tr class="table-primary">
                                             <td colspan="2">15-19</td>
                                             <td colspan="2">15-19</td>
                                             <td colspan="2">15-19</td>
                                             <td colspan="2">15-19</td>
                                             <td colspan="2">15-19</td>
                                             <tr class="table-primary">
                                                 <th>L</th>
                                                 <th>P</th>
                                                 <th>L</th>
                                                 <th>P</th>
                                                 <th>L</th>
                                                 <th>P</th>
                                                 <th>L</th>
                                                 <th>P</th>
                                                 <th>L</th>
                                                 <th>P</th>
                                                 <th>L</th>
                                                 <th>P</th>
                                                 <th>JML</th>
                                                 <th></th>
                                             </tr>
                                          </tr>
                                          </tr>
                                          <tr class="table-primary">
                                           <th></th>
                                           <th class="text-center">1</th>
                                           <th>2</th>
                                           <th>3</th>
                                           <th>4</th>
                                           <th>5</th>
                                           <th>6</th>
                                           <th>7</th>
                                           <th>8</th>
                                           <th>9</th>
                                           <th>10</th>
                                           <th>11</th>
                                           <th>12</th>
                                           <th>13</th>
                                           <th>14</th>
                                           <th></th>
                                           <th class="text-center">1</th>
                                           <th>2</th>
                                           <th>3</th>
                                           <th>4</th>
                                          </tr>
                                          <tr>
                                           <td class="text-center">1.</th>
                                              <td>Pencari kerja yang belum ditempatkan pada akhir semester lalu</td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                              <td>1.</td>
                                              <td>Lowongan yang belum dipenuhi semester lalu</td>
                                              <td></td>
                                              <td></td>
                                              <td></td>
                                          </tr>
                                          <tr>
                                            <td class="text-center">2.</th>
                                                <td>Pencari kerja yang terdaftar di semester ini</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>2.</td>
                                                <td>Lowongan yang belum terdaftar semester ini</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                          <tr class="table-primary">
                                            <th>A.</th>
                                            <th>Jumlah (1+2)</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                          </tr>
                                          <tr>
                                            <td>3.</td>
                                            <td>Pencari Kerja yang ditempatkan pada semester ini</td>
                                            
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>3.</td>
                                            <td>Lowongan yang dipenuhi semester ini</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                          </tr>
                                          <tr>
                                            <td>4.</td>
                                            <td>Pencari Kerja yang dihapuskan pada semester ini</td>
                                            
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>4.</td>
                                            <td>Lowongan yang dihapuskan semester ini</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                          </tr>
                                          <tr class="table-primary">
                                            <th>B.</th>
                                            <th>Jumlah (3+4)</th>
                                          </tr>
                                          <tr>
                                            <td>5.</td>
                                            <td>Pencari Kerja yang belum ditempatkan pada semester ini (A-B)</td>
                                            
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>5.</td>
                                            <td>Lowongan yang belum dipenuhi pada akhir semesetr ini</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                          </tr>
                                          </thead>
                                        </table>
                        <!-- End Table with stripped rows -->   
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->



@include('dashboard/templates/footer')
@include('dashboard/modal/modal-tenaga-kerja')

@endsection