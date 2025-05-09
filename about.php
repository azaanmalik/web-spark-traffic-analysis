
<?php include('header.php'); ?>
<style>
  .about-hero {
    background-color: #1c2d61;
    color: white;
    padding: 60px 20px;
    text-align: center;
  }

  .about-content {
    background-color: #ffffff;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    margin-top: -40px;
    z-index: 1;
    position: relative;
  }

  .about-card {
    background-color: #f8f9fa;
    padding: 25px;
    border-radius: 12px;
    transition: 0.3s ease;
  }

  .about-card:hover {
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    transform: translateY(-5px);
  }

  .icon-box {
    font-size: 30px;
    color: #0d6efd;
    margin-bottom: 15px;
  }

  .team-section {
    padding-top: 40px;
  }

  .team-member img {
    width: 100%;
    border-radius: 50%;
    border: 4px solid #0d6efd;
  }

  .team-member h5 {
    margin-top: 15px;
  }
</style>

<!-- Hero Section -->
<div class="about-hero">
  <h1>About Us</h1>
  <p class="lead">We build better experiences with passion, innovation, and integrity.</p>
</div>

<!-- About Content -->
<div class="container about-content">
  <div class="row text-center mb-4">
    <div class="col-md-4">
      <div class="about-card">
        <div class="icon-box"><i class="fas fa-bullseye"></i></div>
        <h5>Our Mission</h5>
        <p>To empower users by delivering top-notch services with integrity, simplicity, and care.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="about-card">
        <div class="icon-box"><i class="fas fa-lightbulb"></i></div>
        <h5>Our Vision</h5>
        <p>To be a global leader in user-centric platforms that inspire trust and innovation.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="about-card">
        <div class="icon-box"><i class="fas fa-users"></i></div>
        <h5>Our Values</h5>
        <p>We believe in transparency, excellence, collaboration, and lifelong learning.</p>
      </div>
    </div>
  </div>

  <!-- Team Section -->
  <div class="team-section text-center">
    <h3 class="mb-4">Meet the Team</h3>
    <div class="row">
    <div class="col-md-4 team-member">
        <img src="./images/member1.jpeg" alt="Team Member 2" height="350px">
        <h5>Neha</h5>
        <p class="text-muted">LEADER</p>
      </div>
      <div class="col-md-4 team-member">
        <img src="./images/member2.jpeg" alt="Team Member 1" height="350px">
        <h5>Muhammad Hamza</h5>
        <p class="text-muted">UI/UX Designer</p>
      </div>
    
      <div class="col-md-4 team-member">
        <img src="./images/member3.jpeg" alt="Team Member 3" height="350px">
        <h5>Muhammad Usman</h5>
        <p class="text-muted">Lead Developer</p>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include('footer.php'); ?>
