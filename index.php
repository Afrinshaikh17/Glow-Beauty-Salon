

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Glow Beauty Salon & Spa</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- Yahan tumhara existing complete HTML page rahega -->

    <script src="js/script.js"></script>


    
</head>

<body>

<header>
    <div class="logo">Glow Beauty Salon</div>

    <nav>
        <a href="#home">Home</a>
        <a href="#services">Services</a>
        <a href="#about">About</a>
        <a href="#gallery">Gallery</a>
        <a href="login.php">Admin login</a>
    </nav>
</header>

<!-- Home -->

<section class="hero" id="home">

    <div class="hero-content">
        <p class="small">Welcome to Glow Beauty Salon</p>

        <h1>Discover Your<br>
            Natural <span>Beauty</span>
        </h1>

        <p>
            Experience the perfect blend of beauty,
            relaxation and self-care. Let us make
            every moment special for you.
        </p>

        <a href="#contact" class="btn">
            Book Your Appointment
        </a>
    </div>

    <div class="hero-image">
        <img
            src="https://images.pexels.com/photos/7750099/pexels-photo-7750099.jpeg?auto=compress&cs=tinysrgb&w=1000"
            alt="Beautiful modern beauty salon">
    </div>

</section>

<!-- Services -->

<section id="services">

    <div class="section-heading">
        <p>What We Offer</p>
        <h2>Our Beauty Services</h2>
    </div>

    <div class="services">

        <div class="service-card">
            <div class="service-icon">✂️</div>
            <h3>Hair Styling</h3>
            <p>Beautiful haircuts, styling and hair care.</p>
        </div>

        <div class="service-card">
            <div class="service-icon">🌸</div>
            <h3>Facial Care</h3>
            <p>Relaxing facials for fresh and glowing skin.</p>
        </div>

        <div class="service-card">
            <div class="service-icon">💄</div>
            <h3>Makeup</h3>
            <p>Party makeup and beautiful bridal looks.</p>
        </div>

        <div class="service-card">
            <div class="service-icon">🌿</div>
            <h3>Mehndi Art</h3>
            <p>Traditional and modern mehndi designs.</p>
        </div>

    </div>

</section>

<!-- About -->

<section class="about" id="about">

    <div>
        <img
            src="https://images.pexels.com/photos/7755155/pexels-photo-7755155.jpeg?auto=compress&cs=tinysrgb&w=1000"
            alt="Relaxing beauty salon interior">
    </div>

    <div>
        <p style="color:#d96b94;letter-spacing:2px;">
            ABOUT OUR SALON
        </p>

        <h2>A Little Care<br>For Your Beauty</h2>

        <p>
            At Glow Beauty Salon & Spa, we believe
            every woman deserves to feel beautiful
            and confident.
        </p>

        <p>
            Our salon offers a peaceful atmosphere,
            friendly service and beauty treatments
            designed to make you feel special.
        </p>

        <a href="#contact" class="btn">Visit Our Salon</a>
    </div>

</section>

<!-- Gallery -->

<section id="gallery">

    <div class="section-heading">
        <p>Our Work</p>
        <h2>Beauty Inspiration</h2>
    </div>

    <div class="gallery">

        <img
            src="https://images.pexels.com/photos/3993449/pexels-photo-3993449.jpeg?auto=compress&cs=tinysrgb&w=800"
            alt="Beauty treatment">

        <img
            src="https://images.pexels.com/photos/3997989/pexels-photo-3997989.jpeg?auto=compress&cs=tinysrgb&w=800"
            alt="Facial care">

        <img
            src="https://images.pexels.com/photos/3764011/pexels-photo-3764011.jpeg?auto=compress&cs=tinysrgb&w=800"
            alt="Beauty makeup">

    </div>

</section>

<!-- Appointment -->


<section class="booking" id="contact">

    <p class="booking-label">YOUR BEAUTY JOURNEY STARTS HERE</p>

    <h2>Book Your Appointment</h2>

    <p class="booking-description">
        Give yourself a little time to relax and glow.
    </p>

    <form id="bookingForm" action="save_appointment.php" method="POST">

    <div class="form-group">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name"
               placeholder="Enter your name" required>
    </div>

    <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone"
               placeholder="Enter your phone number"
               pattern="[0-9]{10}" required>
    </div>

    <div class="form-group">
        <label for="service">Choose Service</label>
        <select id="service" name="service" required>
            <option value="">Select a service</option>
            <option value="Hair Styling">Hair Styling</option>
            <option value="Facial Care">Facial Care</option>
            <option value="Makeup">Makeup</option>
            <option value="Mehndi Art">Mehndi Art</option>
        </select>
    </div>

    <div class="form-group">
        <label for="date">Appointment Date</label>
        <input type="date" id="date" name="date" required>
    </div>

    <button type="submit" class="btn">
        Book Appointment
    </button>

</form>
<p class="cancel-link">
    Already booked?
    <a href="cancel.php">Cancel Your Appointment</a>
</p>
</section>


<footer>

    <h2>Glow Beauty Salon & Spa</h2>

    <p>Look Beautiful. Feel Amazing.</p>

    <p>© 2026 Glow Beauty Salon. All Rights Reserved.</p>

</footer>

</body>
</html>


