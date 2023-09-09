@extends('halaman-utama/main')

@section('content')
@include('halaman-utama/templates/header')

<main id="main">

    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">
            <h2>Hubungi Kami</h2>
        </div>
      </section><!-- End Testimonials Section -->

    <section id="contact" class="contact">
        
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-0.8913922559082093!3d100.35183564199498!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1044657ba12d0e44!2sDisnaker+Sumatera+Barat!5e0!3m2!1sen!2sid!4v1631075682641!5m2!1sen!2sid" frameborder="0" allowfullscreen></iframe>
          </div><!-- End Google Maps -->
        <div class="container">
  
          <div class="row gy-5 gx-lg-5">
  
            <div class="col-lg-4">
  
              <div class="info">
                <h3>Get in touch</h3>
                <p>Et id eius voluptates atque nihil voluptatem enim in tempore minima sit ad mollitia commodi minus.</p>
  
                <div class="info-item d-flex">
                  <i class="bi bi-geo-alt flex-shrink-0"></i>
                  <div>
                    <h4>Location:</h4>
                    <p>A108 Adam Street, New York, NY 535022</p>
                  </div>
                </div><!-- End Info Item -->
  
                <div class="info-item d-flex">
                  <i class="bi bi-envelope flex-shrink-0"></i>
                  <div>
                    <h4>Email:</h4>
                    <p>info@example.com</p>
                  </div>
                </div><!-- End Info Item -->
  
                <div class="info-item d-flex">
                  <i class="bi bi-phone flex-shrink-0"></i>
                  <div>
                    <h4>Call:</h4>
                    <p>+1 5589 55488 55</p>
                  </div>
                </div><!-- End Info Item -->
  
              </div>
  
            </div>
  
            <div class="col-lg-8">
              <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div><!-- End Contact Form -->
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
</main>

@include('halaman-utama/templates/footer')
@endsection