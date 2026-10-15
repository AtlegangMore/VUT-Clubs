
<?php
require_once __DIR__ . '/INCLUDES/form-security.php';
$csrfToken = $_SESSION['csrfToken'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="IMAGES/VUT_logo-TM.png">
  <title>MavutiHub | Contact Us</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="stylesheet" href="CSS/clubs-style.css?v=2">
  <script src="JS/jscript.js" defer></script>
</head>
<body>
  <?php include __DIR__ . '/INCLUDES/navbar.php'; ?>

  <main>
    <section class="page-hero has-slideshow">
      <div class="hero-slideshow" aria-hidden="true">
        <img class="is-active" alt="">
        <img alt="">
      </div>
      <div class="container reveal">
        <span class="section-tag">LET'S TALK</span>
        <h1>Get in <span>Touch.</span></h1>
        <p>Have a question, suggestion or idea for MavutiHub? We'd love to hear what you think.</p>
      </div>
    </section>

    <section class="section">
      <div class="container contact-layout">
        <div class="contact-info reveal">
          <span class="section-tag">CONNECT WITH US</span>
          <h2>Let's start a <span>conversation.</span></h2>
          <p>
            MavutiHub is designed around student communities, and
            your ideas matter. Whether you want to suggest a society,
            ask about a listing or share feedback, this is the place to begin.
          </p>

          <div class="contact-info-card glass">
            <span class="contact-icon">
              <i class="fa-solid fa-location-dot"></i>
            </span>
            <div>
              <h3>Campus Location</h3>
              <p>Vaal University of Technology<br>Andries Potgieter Boulevard<br>Vanderbijlpark, 1911<br>South Africa</p>
              <p>Postal: Private Bag X021, Vanderbijlpark, 1911</p>
            </div>
          </div>

          <div class="contact-info-card glass">
            <span class="contact-icon">
              <i class="fa-solid fa-comments"></i>
            </span>
            <div>
              <h3>Questions & Suggestions</h3>
              <p>Send questions, suggestions and feedback to the MavutiHub team.</p>
            </div>
          </div>

          <div class="contact-info-card glass">
            <span class="contact-icon gold-icon">
              <i class="fa-solid fa-lightbulb"></i>
            </span>
            <div>
              <h3>Suggest a Club</h3>
              <p>Have an idea for another community that could be included in the directory?</p>
            </div>
          </div>

          <h3 class="contact-social-heading">Follow MavutiHub</h3>
          <div class="social-icons">
            <a href="#" data-social-placeholder class="social-link" aria-label="Instagram">
              <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="#" data-social-placeholder class="social-link" aria-label="Facebook">
              <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="#" data-social-placeholder class="social-link" aria-label="LinkedIn">
              <i class="fa-brands fa-linkedin-in"></i>
            </a>
          </div>
        </div>

        <div class="contact-form-card glass reveal">
          <div class="form-header">
            <span class="form-icon"><i class="fa-solid fa-paper-plane"></i></span>
            <h2>Send Us a Message</h2>
            <p>Fill in the form below and your message will be emailed to the MavutiHub team.</p>
          </div>

          <form id="contact-form" method="post" action="submit.php">
            <input type="hidden" name="formType" value="contact">
            <input type="hidden" name="csrfToken" value="<?= htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8') ?>">
            <div class="form-row">
              <div class="form-group">
                <label for="first-name">First Name</label>
                <input type="text" id="first-name" name="firstName" placeholder="Your first name" required>
              </div>
              <div class="form-group">
                <label for="last-name">Last Name</label>
                <input type="text" id="last-name" name="lastName" placeholder="Your last name" required>
              </div>
            </div>

            <div class="form-group">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" placeholder="you@example.com" required>
            </div>

            <div class="form-group">
              <label for="subject">What is your message about?</label>
              <select id="subject" name="subject" required>
                <option value="">Choose a subject</option>
                <option value="General Enquiry">General Enquiry</option>
                <option value="Club Information">Club Information</option>
                <option value="Suggest a Club">Suggest a Club</option>
                <option value="Website Feedback">Website Feedback</option>
                <option value="Other">Other</option>
              </select>
            </div>

            <div class="form-group">
              <label for="message">Your Message</label>
              <textarea id="message" name="message" rows="6"
                placeholder="Tell us what you would like to share..." required></textarea>
            </div>

            <label class="join-consent">
              <input type="checkbox" name="consent" value="yes" required>
              <span>I agree to send these details to the MavutiHub testing inbox.</span>
            </label>

            <button type="submit" class="btn btn-primary form-submit">
              Send Message <i class="fa-solid fa-arrow-right"></i>
            </button>

            <p id="form-feedback" class="form-feedback" role="status"></p>
            <p class="form-disclaimer">
              Your message will be emailed to the testing inbox and is not stored by this website.
            </p>
          </form>
        </div>
      </div>
    </section>

    <section class="section cta-section">
      <div class="container">
        <div class="cta-panel reveal">
          <span class="cta-kicker">DISCOVER MORE</span>
          <h2>Find your next <em>community.</em></h2>
          <p>Browse the club directory and explore the interests that make campus life exciting.</p>
          <a href="explore.php" class="btn btn-gold">
            Explore Clubs <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/INCLUDES/footer.php'; ?>
</body>
</html>
