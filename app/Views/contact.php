<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<!-- ======= Contact Section ======= -->
<section id="contact" class="contact section-bg">
    <div class="container pt-4">
        <div class="section-title" data-aos="fade-up">
            <h2>Contact Us</h2>
        </div>
        <div class="row">
            <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-right">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Location:</h4>
                        <p>Jl. Jendral Sudirman No. Kav. 25, Daerah Khusus Ibukota Jakarta</p>
                    </div>

                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>mantappucorp@gmail.com</p>
                    </div>

                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>Call:</h4>
                        <p>+62 822-3019-3060</p>
                    </div>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15865.537569391918!2d106.8213604!3d-6.2129293!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x71fdddd3900bab0f!2sMantappu%20Corp.!5e0!3m2!1sid!2sid!4v1672493874636!5m2!1sid!2sid"
                        width="460" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-left">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Your Name</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group col-md-6 mt-3 mt-md-0">
                            <label for="name">Your Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Message</label>
                        <textarea class="form-control" name="message" rows="10" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>

        </div>

    </div>
</section>
<!-- End Contact Section -->
<?= $this->endSection() ?>