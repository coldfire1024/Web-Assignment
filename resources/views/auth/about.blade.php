<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - MAGA</title>
    <link rel="stylesheet" href="{{ asset('css/auth/about.css') }}">
    <link rel="icon" href="{{ asset('images/icon.png') }}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <x-Navbar />
    <div class="about-container">
        <div class="about-header text-center">
            <h1>Welcome to MAGA</h1>
            <p>Your trusted destination for exceptional dining experiences!</p>
        </div>

        <div class="about-section">
            <h2>Our Mission</h2>
            <p>At MAGA, our mission is to deliver exceptional culinary experiences that bring people together while celebrating flavor, quality, and innovation.</p>
        </div>

        <div class="about-section">
            <h2>Our Vision</h2>
            <p>To redefine dining culture and become the global leader in sustainable and innovative gourmet experiences.</p>
        </div>

        <div class="about-section">
            <h2>Our Story</h2>
            <p>MAGA started as a humble dream in 2024, founded by a passionate team of food enthusiasts. Today, we’ve grown to serve thousands of happy customers, while staying true to our roots: delivering food that speaks to the soul.</p>
        </div>

        <div class="about-section team-section">
            <h2>Meet Our Team</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ asset('images/team-ceo.jpeg') }}" class="img-fluid rounded-circle team-img" alt="CEO">
                    <h5>Tan Chun Wai</h5>
                    <p>CEO & Founder</p>
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{ asset('images/team-chef.jpeg') }}" class="img-fluid rounded-circle team-img" alt="Head Chef">
                    <h5>Ng Zhe Wei</h5>
                    <p>Head Chef</p>
                </div>
                <div class="col-md-4 text-center">
                    <img src="{{ asset('images/team-manager.jpeg') }}" class="img-fluid rounded-circle team-img" alt="Manager">
                    <h5>Tang Yong Jun</h5>
                    <p>Operations Manager</p>
                </div>
            </div>
        </div>

        <div class="about-section">
            <h2>Our Values</h2>
            <ul>
                <li>Customer satisfaction above all</li>
                <li>Uncompromising quality and innovation</li>
                <li>Commitment to sustainability</li>
                <li>Integrity and transparency in all we do</li>
            </ul>
        </div>

        <div class="about-section text-center">
            <h2>Join Us</h2>
            <p>Be part of our journey as we continue to innovate and redefine the way we enjoy food.</p>
            <a href="/" class="btn btn-primary">Try it</a>
        </div>
    </div>
    <x-Footer />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
