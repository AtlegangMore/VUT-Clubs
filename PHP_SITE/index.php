
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Discover clubs, societies and student communities at Vaal University of Technology.">
  <link rel="icon" type="image/png" href="IMAGES/VUT_logo-TM.png">
  <title>MavutiHub | Find Your People</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="stylesheet" href="CSS/clubs-style.css?v=2">
  <script src="JS/jscript.js" defer></script>
</head>
<body>

  <?php include __DIR__ . '/INCLUDES/navbar.php'; ?>

  <main>
    <section class="hero container has-slideshow">
      <div class="hero-slideshow" aria-hidden="true">
        <img class="is-active" alt="">
        <img alt="">
      </div>
      <div class="hero-content reveal">
        <span class="eyebrow">
          YOUR CAMPUS. YOUR COMMUNITY.
        </span>

        <h1>Find Your People.<br><span>Make Your Mark.</span></h1>

        <p class="hero-description" id="hero-description" lang="en" aria-live="polite" aria-atomic="true">
          There's more to university than lectures and assignments.
          Meet people who share your passions, explore student societies,
          discover new opportunities and make your campus experience unforgettable.
        </p>

        <div class="hero-actions">
          <a href="explore.php" class="btn btn-gold">
            Explore Communities <i class="fa-solid fa-arrow-right"></i>
          </a>
          <a href="about.php" class="btn btn-outline">
            Our Story <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>

        <div class="hero-socials">
          <span>Follow MavutiHub</span>
          <div class="social-icons">
            <a href="https://www.instagram.com/" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram">
              <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://www.facebook.com/" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook">
              <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="https://x.com/" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X">
              <i class="fa-brands fa-x-twitter"></i>
            </a>
            <a href="https://www.tiktok.com/" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok">
              <i class="fa-brands fa-tiktok"></i>
            </a>
            <a href="https://www.youtube.com/" class="social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube">
              <i class="fa-brands fa-youtube"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="hero-visual reveal">
        <div class="hero-photo-wrap">
          <img src="https://hesc.ny.gov/sites/default/files/styles/optimized/public/2025-01/2025Event-07-936px.jpg?itok=g0H2lt8X" alt="Students gathered around a table, connecting and studying together">
        </div>

        <div class="floating-card glass floating-top">
          <span class="floating-icon"><i class="fa-solid fa-compass"></i></span>
          <div>
            <strong>Explore Your Interests</strong>
            <small>Discover something new</small>
          </div>
        </div>

        <div class="floating-card glass floating-bottom">
          <span class="floating-icon gold-icon"><i class="fa-solid fa-heart"></i></span>
          <div>
            <strong>You Belong Here</strong>
            <small>Connect · Grow · Belong</small>
          </div>
        </div>
      </div>
    </section>

    
<section class="stats-section" id="stats">
  <div class="container stats-grid">

    <div class="stat-item">
      <strong>
        <span class="counter" data-target="17">17</span>+
      </strong>
      <p>Featured Communities</p>
    </div>

    <div class="stat-item">
      <strong>
        <span class="counter" data-target="7">7</span>
      </strong>
      <p>Club Categories</p>
    </div>

    <div class="stat-item">
      <strong>
        <span class="counter" data-target="1">1</span>
      </strong>
      <p>Connected Campus</p>
    </div>

  </div>
</section>


    <section class="section top-clubs-section">
      <div class="container">
        <div class="section-heading reveal">
          <div>
            <span class="section-tag">START EXPLORING</span>
            <h2>Featured <span>Communities</span></h2>
            <p>From innovation and culture to sport and friendship, there's something for every interest.</p>
          </div>
          <a href="explore.php" class="text-link">
            Explore All Clubs <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>

        <div class="club-grid">
          <article class="club-card glass reveal">
            <div class="club-image">
              <img src="IMAGES/clubs/techcollective.jpeg" alt="Tech Collective placeholder" loading="lazy">
              <span class="club-number">01</span>
            </div>
            <div class="club-body">
              <span class="club-category">Technology & Innovation</span>
              <h3>Tech Collective</h3>
              <p>
                Love technology? Explore coding, emerging technologies,
                creative problem-solving and opportunities to collaborate
                with other students.
              </p>
              <a href="explore.php#tech-collective" class="club-link">
                Discover More <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </article>

          <article class="club-card glass reveal">
            <div class="club-image">
              <img src="IMAGES/clubs/tsonga.jpeg" alt="Tsonga VUT Society placeholder" loading="lazy">
              <span class="club-number">02</span>
            </div>
            <div class="club-body">
              <span class="club-category">Culture & Heritage</span>
              <h3>Tsonga VUT Society</h3>
              <p>
                Celebrate Xitsonga language, culture, heritage and traditions
                while building meaningful friendships and connections
                within the campus community.
              </p>
              <a href="explore.php#tsonga-vut-society" class="club-link">
                Discover More <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </article>

          <article class="club-card glass reveal">
            <div class="club-image">
              <img src="IMAGES/clubs/soccerclub.jpeg" alt="Sports and recreation placeholder" loading="lazy">
              <span class="club-number">03</span>
            </div>
            <div class="club-body">
              <span class="club-category">Sports & Wellness</span>
              <h3>Sports & Recreation Club</h3>
              <p>
                Stay active, build confidence and discover the power
                of teamwork through sporting activities, recreation
                and friendly competition.
              </p>
              <a href="explore.php#sports-recreation" class="club-link">
                Discover More <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </article>
        </div>

        
      </div>
    </section>

    <section class="section benefits-section">
      <div class="container">
        <div class="center-heading reveal">
          <span class="section-tag">YOUR CAMPUS EXPERIENCE</span>
          <h2>More Than <span>Just a Club.</span></h2>
          <p>
            Joining a student community can help you discover what you're
            capable of, build lasting relationships and develop valuable skills.
          </p>
        </div>

        <div class="benefit-grid">
          <article class="benefit-card glass reveal">
            <span class="benefit-icon"><i class="fa-solid fa-user-group"></i></span>
            <h3>Find Your People</h3>
            <p>
              Meet students with shared interests, build friendships
              and create a stronger sense of belonging on campus.
            </p>
          </article>

          <article class="benefit-card glass reveal">
            <span class="benefit-icon gold-icon"><i class="fa-solid fa-lightbulb"></i></span>
            <h3>Unlock Your Potential</h3>
            <p>
              Develop confidence, leadership, teamwork and communication
              skills through meaningful participation.
            </p>
          </article>

          <article class="benefit-card glass reveal">
            <span class="benefit-icon"><i class="fa-solid fa-star"></i></span>
            <h3>Make Memories</h3>
            <p>
              Take part in campus activities, try something new
              and make your university years truly memorable.
            </p>
          </article>
        </div>
      </div>
    </section>

    <section class="section spotlight-section">
      <div class="container spotlight-layout">
        <div class="spotlight-image reveal">
          <img src="IMAGES/clubs/innovation&amp;entrepreneur.jpeg" alt="Innovation and Entrepreneurship club" loading="lazy">
          <button class="spotlight-control spotlight-prev" type="button" aria-label="Previous featured club image">
            <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
          </button>
          <button class="spotlight-control spotlight-next" type="button" aria-label="Next featured club image">
            <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
          </button>
          <span class="spotlight-badge glass">
            <i class="fa-solid fa-people-group" aria-hidden="true"></i>
            <span id="spotlight-caption" aria-live="polite">Innovation &amp; Entrepreneurship</span>
          </span>
        </div>

        <div class="spotlight-content reveal">
          <span class="section-tag">COMMUNITY SPOTLIGHT</span>
          <h2>Every Voice.<br><span>Every Community.</span></h2>
          <p>
            A welcoming campus is one where students can connect,
            express themselves and feel respected. MavutiHub celebrates
            the diversity of student interests and experiences.
          </p>
          <p>
            Discover communities such as the Queer Student Association,
            cultural societies, creative groups and many more.
          </p>
          <a href="explore.php#queer-student-association" class="btn btn-primary">
            Explore the Association <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </section>

    <section class="section welcome-video-section" aria-labelledby="welcome-video-title">
      <div class="container">
        <div class="center-heading reveal">
          <span class="section-tag">A MESSAGE FROM VUT LEADERSHIP</span>
          <h2 id="welcome-video-title">Welcome to <span>VUT.</span></h2>
          <p>Hear the 2026 welcome address from the VUT Vice-Chancellor and Principal.</p>
        </div>

        <div class="welcome-video-frame reveal">
          <iframe
            src="https://www.youtube-nocookie.com/embed/dOm6MMKZGLQ"
            title="2026 Welcome Address from the VUT Vice-Chancellor and Principal"
            loading="lazy"
            referrerpolicy="strict-origin-when-cross-origin"
            allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen>
          </iframe>
        </div>
      </div>
    </section>

    <section class="section cta-section">
      <div class="container">
        <div class="cta-panel reveal">
          <span class="cta-kicker">YOUR NEXT CHAPTER STARTS HERE</span>
          <h2>There's a place for <em>you</em> here.</h2>
          <p>
            Whether you're passionate about technology, sport, culture,
            creativity or making a difference, start exploring today.
          </p>
          <a href="explore.php" class="btn btn-gold">
            Find Your Community <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </section>

    <section class="campus-facts-section" aria-labelledby="campus-facts-title">
      <div class="campus-fact-content">
        <h2 id="campus-facts-title">Did You Know?</h2>
        <p id="campus-fact" class="campus-fact" aria-live="polite" aria-atomic="true">
          VUT began in 1966 as a college for advanced technical education.
        </p>
        <a href="https://www.vut.ac.za/welcome/" target="_blank" rel="noopener noreferrer" class="campus-fact-source">
          Source: Vaal University of Technology
          <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
        </a>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/INCLUDES/footer.php'; ?>

</body>
</html>
