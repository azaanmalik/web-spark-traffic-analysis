<!-- Contact Us Section -->
<?php include('header.php'); ?>
<section class="py-5" style="background-color: #1c2d61;">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Contact Us</h2>
      <p class="text-muted">We'd love to hear from you. Please reach out with any questions or comments.</p>
    </div>
    </section>
    <div class="row g-4 justify-content-center">
      <!-- Contact Form -->
      <div class="col-lg-6">
        <form action="#" method="POST" class="p-4 bg-white rounded shadow">
          <div class="mb-3">
            <label for="name" class="form-label">Your Name *</label>
            <input type="text" class="form-control" id="name" placeholder="John Doe" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Address *</label>
            <input type="email" class="form-control" id="email" placeholder="example@mail.com" required>
          </div>
          <div class="mb-3">
            <label for="subject" class="form-label">Subject *</label>
            <input type="text" class="form-control" id="subject" placeholder="Subject" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message *</label>
            <textarea class="form-control" id="message" rows="5" placeholder="Type your message here..." required></textarea>
          </div>
          <div class="text-center">
            <button type="submit" class="btn " style="background-color: #10c2dd;">Send Message</button>
          </div>
        </form>
      </div>

     
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include('footer.php'); ?>
