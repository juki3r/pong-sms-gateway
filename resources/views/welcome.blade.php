<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PONG SMS Services</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .hero {
      background: linear-gradient(to right, #6862e0, #9958d5);
      color: white;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 2rem;
    }
    .feature-icon {
      font-size: 3rem;
      color: #4f46e5;
    }
    .logo {
      width: 150px;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body class="bg-light">

  <!-- Hero Section -->
  <header class="hero">
    <img src="{{ asset('logo.png') }}" alt="PONG SMS Logo" class="logo">
    <h1 class="display-4 fw-bold">PONG SMS Services</h1>
    <p class="lead mb-4">
      Rent SIM cards, send SMS, and integrate messaging seamlessly—optimized for websites, mobile platforms, and fintech like GCash & PayMaya.
    </p>
    <div>
      <a href="#features" class="btn btn-light btn-lg me-2 mb-md-0 mb-3 ">Explore Features</a>
      <a href="{{route('login')}}" class="btn btn-outline-light btn-lg">Get Started</a>
    </div>
  </header>

  <!-- Features Section -->
  <section id="features" class="py-5">
    <div class="container">
      <h2 class="text-center mb-4">Key Features</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm text-center p-4">
            <div class="feature-icon mb-3">📱</div>
            <h5 class="card-title">SIM Card Rental</h5>
            <p class="card-text">Securely rent dedicated SIM cards for private and scalable messaging.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm text-center p-4">
            <div class="feature-icon mb-3">💬</div>
            <h5 class="card-title">Bulk SMS Sending</h5>
            <p class="card-text">Deliver mass notifications, OTPs, and alerts with lightning speed.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm text-center p-4">
            <div class="feature-icon mb-3">🌐</div>
            <h5 class="card-title">API & Integrations</h5>
            <p class="card-text">Easily connect PONG SMS with your web or mobile apps and fintech platforms.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="py-5 bg-light">
    <div class="container text-center">
      <h2 class="mb-4">Why Choose PONG SMS?</h2>
      <p class="lead text-muted">
        With years of experience in telecom solutions, we provide a robust SMS platform that adapts 
        to your business needs—whether you run an e-commerce store, a remittance center, or a startup 
        looking for secure messaging solutions.
      </p>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact" class="py-5 text-center text-white" style="background: #4f46e5;">
    <div class="container">
      <h2 class="mb-3">Ready to Grow with PONG SMS?</h2>
      <p class="lead mb-4">Enhance your messaging capabilities—fast setup, scalable, and developer-friendly.</p>
      <a href="mailto:deepong25@gmail.com" class="btn btn-light btn-lg">Contact Us</a>
    </div>
  </section>

  <!-- Footer -->
  <footer class="py-4 text-center small text-light bg-dark">
    &copy; 2025 PONG SMS Services. All rights reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
