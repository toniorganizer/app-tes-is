@extends('dashboard/main')

@section('container')
@include('dashboard/templates/header')
@include('dashboard/templates/sidebar')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Frequently Asked Questions</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Frequently Asked Questions</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section faq">
        <div class="row">

            <div class="col-lg-6">

                <!-- F.A.Q Group 2 -->
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pertanyaan yang sering diajukan</h5>

                        <div class="accordion accordion-flush" id="faq-group-2">

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-1" type="button" data-bs-toggle="collapse">
                                        Apakah informasi yang ada di sistem selalu dalam pantauan disnaker?
                                    </button>
                                </h2>
                                <div id="faqsTwo-1" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                                    <div class="accordion-body">
                                        Informasi yang ada pada sistem akan selalu dipantau perkembangannya oleh Dinas terkait. Setiap informasi akan ada status verifikasi yang telah dilakukan disnaker.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-2" type="button" data-bs-toggle="collapse">
                                        Apakah dokumen persyaratan harus dipenuhi semua?
                                    </button>
                                </h2>
                                <div id="faqsTwo-2" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                                    <div class="accordion-body">
                                        Dokumen persyaratan jika ingin melakukan pendaftaran lowongan, tidak harus ada semua. Namun dokumen yang harus ada minimal Curriculum vitae.
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" data-bs-target="#faqsTwo-3" type="button" data-bs-toggle="collapse">
                                        Apa yang harus dilakukan setelah melakuakn pedaftaran lowongan?
                                    </button>
                                </h2>
                                <div id="faqsTwo-3" class="accordion-collapse collapse" data-bs-parent="#faq-group-2">
                                    <div class="accordion-body">
                                        Pantau selalu halaman status lamaran yang dapat dilihat dengan melakukan login menggukanan akun yang telah terdaftar.
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div><!-- End F.A.Q Group 2 -->

            </div>

        </div>
    </section>

</main><!-- End #main -->

@include('dashboard/templates/footer')
@endsection