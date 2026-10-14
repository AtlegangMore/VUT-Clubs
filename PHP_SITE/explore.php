<?php
require_once __DIR__ . '/INCLUDES/form-security.php';
$csrfToken = $_SESSION['csrfToken'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description"
    content="Explore student clubs and societies at Vaal University of Technology through MavutiHub. Find communities that match your interests.">

  <link rel="icon" type="image/png" href="IMAGES/VUT_logo-TM.png">
  <title>Explore Clubs | MavutiHub</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="CSS/clubs-style.css?v=2">

  <!-- Main JavaScript -->
  <script src="JS/jscript.js" defer></script>
</head>

<body>

  <!-- NAVIGATION -->
  <?php include __DIR__ . '/INCLUDES/navbar.php'; ?>


  <main>

    <!-- EXPLORE HERO -->
    <section class="page-hero has-slideshow">
      <div class="hero-slideshow" aria-hidden="true">
        <img class="is-active" alt="">
        <img alt="">
      </div>
      <div class="container">

        <span class="eyebrow">
          EXPLORE CAMPUS COMMUNITIES
        </span>

        <h1>Find Your <span>Community.</span></h1>

        <p>
          University life is more than lectures and assignments.
          Discover student clubs, societies, sports teams and
          creative communities that can help you build friendships,
          develop new skills and make your campus experience memorable.
        </p>

      </div>
    </section>


    <!-- CLUB DIRECTORY -->
    <section class="section explore-section" id="club-directory">
      <div class="container">

        <div class="explore-intro">
          <span class="section-tag">DISCOVER WHAT MOVES YOU</span>

          <h2>Explore Clubs &amp; <span>Societies</span></h2>

          <p>
            Whether you're passionate about technology, culture,
            sport, creativity or community development, there is
            something worth exploring. Search by name or choose
            a category to narrow down your options.
          </p>
        </div>


        <!-- SEARCH AND FILTERS -->
        <div class="explore-controls glass">

          <div class="search-wrapper">
            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>

            <input
              type="search"
              id="club-search"
              placeholder="Search a club, society or interest..."
              aria-label="Search clubs and societies">
          </div>

          <div class="filter-buttons"
            role="group"
            aria-label="Filter clubs by category">

            <button type="button" class="filter-btn active"
              data-filter="all" aria-pressed="true">
              All
            </button>

            <button type="button" class="filter-btn"
              data-filter="technology" aria-pressed="false">
              Technology
            </button>

            <button type="button" class="filter-btn"
              data-filter="culture" aria-pressed="false">
              Culture
            </button>

            <button type="button" class="filter-btn"
              data-filter="sports" aria-pressed="false">
              Sports
            </button>

            <button type="button" class="filter-btn"
              data-filter="arts" aria-pressed="false">
              Arts
            </button>

            <button type="button" class="filter-btn"
              data-filter="academic" aria-pressed="false">
              Academic
            </button>

            <button type="button" class="filter-btn"
              data-filter="community" aria-pressed="false">
              Community
            </button>

          </div>
        </div>


        <div class="results-heading">
          <h2>Discover Your Next Adventure</h2>
          <span id="club-count" aria-live="polite">17 clubs</span>
        </div>


        <!-- CLUB CARDS -->
        <div class="club-grid explore-grid">

          <!-- 1. TECH COLLECTIVE -->
          <article class="club-card glass reveal"
            data-category="technology" id="tech-collective">
            <div class="club-image">
              <img src="IMAGES/clubs/techcollective.jpeg"
                alt="Students participating in a technology activity"
                loading="lazy">
              <span class="club-number">01</span>
            </div>
            <div class="club-body">
              <span class="club-category">Technology</span>
              <h3>Tech Collective</h3>
              <p>
                Connect with students interested in coding,
                digital innovation, technology trends and
                collaborative problem-solving.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 2. INNOVATION AND ENTREPRENEURSHIP -->
          <article class="club-card glass reveal"
            data-category="technology">
            <div class="club-image">
              <img src="IMAGES/clubs/innovation&amp;entrepreneur.jpeg"
                alt="Innovation and entrepreneurship activities"
                loading="lazy">
              <span class="club-number">02</span>
            </div>
            <div class="club-body">
              <span class="club-category">Technology</span>
              <h3>Innovation &amp; Entrepreneurship</h3>
              <p>
                Explore creative business ideas, entrepreneurship,
                innovation challenges and opportunities to turn
                ideas into meaningful projects.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 3. BASOTHO SOCIETY -->
          <article class="club-card glass reveal"
            data-category="culture">
            <div class="club-image">
              <img src="IMAGES/clubs/basotho.jpeg"
                alt="Basotho cultural representation"
                loading="lazy">
              <span class="club-number">03</span>
            </div>
            <div class="club-body">
              <span class="club-category">Culture</span>
              <h3>Basotho Cultural Society</h3>
              <p>
                Celebrate Sesotho language, Basotho heritage,
                cultural traditions and connections among
                students from different backgrounds.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 4. TSONGA VUT SOCIETY -->
          <article class="club-card glass reveal"
            data-category="culture" id="tsonga-vut-society">
            <div class="club-image">
              <img src="IMAGES/clubs/tsonga.jpeg"
                alt="Tsonga cultural representation"
                loading="lazy">
              <span class="club-number">04</span>
            </div>
            <div class="club-body">
              <span class="club-category">Culture</span>
              <h3>Tsonga VUT Society</h3>
              <p>
                Discover Xitsonga language, Tsonga traditions
                and cultural expression while connecting with
                fellow students on campus.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 5. ZULU SOCIETY -->
          <article class="club-card glass reveal"
            data-category="culture">
            <div class="club-image">
              <img src="IMAGES/clubs/zulu.jpeg"
                alt="Zulu cultural representation"
                loading="lazy">
              <span class="club-number">05</span>
            </div>
            <div class="club-body">
              <span class="club-category">Culture</span>
              <h3>Zulu Cultural Society</h3>
              <p>
                Explore isiZulu language, traditional practices,
                cultural celebrations and opportunities for
                sharing heritage with others.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 6. QUEER STUDENT ASSOCIATION -->
          <article class="club-card glass reveal"
            data-category="community" id="queer-student-association">
            <div class="club-image">
              <img src="IMAGES/clubs/queer.jpeg"
                alt="Inclusive student community representation"
                loading="lazy">
              <span class="club-number">06</span>
            </div>
            <div class="club-body">
              <span class="club-category">Community</span>
              <h3>Queer Student Association</h3>
              <p>
                A space centred on belonging, student support,
                inclusion, awareness and meaningful connections
                within the campus community.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 7. COMMUNITY OUTREACH -->
          <article class="club-card glass reveal"
            data-category="community">
            <div class="club-image">
              <img src="IMAGES/clubs/communityoutreach.jpeg"
                alt="Students participating in community outreach"
                loading="lazy">
              <span class="club-number">07</span>
            </div>
            <div class="club-body">
              <span class="club-category">Community</span>
              <h3>Community Outreach Club</h3>
              <p>
                Explore volunteering, community engagement,
                social responsibility and opportunities to
                make a positive difference beyond campus.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 8. SOCCER -->
          <article class="club-card glass reveal"
            data-category="sports" id="sports-recreation">
            <div class="club-image">
              <img src="IMAGES/clubs/soccerclub.jpeg"
                alt="Soccer players on a football field"
                loading="lazy">
              <span class="club-number">08</span>
            </div>
            <div class="club-body">
              <span class="club-category">Sports</span>
              <h3>Soccer Club</h3>
              <p>
                Discover the excitement of football, teamwork,
                friendly competition and staying active with
                other students who love the game.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 9. RUGBY -->
          <article class="club-card glass reveal"
            data-category="sports">
            <div class="club-image">
              <img src="IMAGES/clubs/rugby.jpeg"
                alt="Rugby players during a match"
                loading="lazy">
              <span class="club-number">09</span>
            </div>
            <div class="club-body">
              <span class="club-category">Sports</span>
              <h3>Rugby Club</h3>
              <p>
                Build discipline, resilience and teamwork
                while exploring opportunities to participate
                in rugby and campus sporting activities.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 10. NETBALL -->
          <article class="club-card glass reveal"
            data-category="sports">
            <div class="club-image">
              <img src="IMAGES/clubs/netball.jpeg"
                alt="Netball players taking part in a match"
                loading="lazy">
              <span class="club-number">10</span>
            </div>
            <div class="club-body">
              <span class="club-category">Sports</span>
              <h3>Netball Club</h3>
              <p>
                Connect through netball, develop your sporting
                skills and enjoy a supportive environment
                built around teamwork and participation.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 11. HOCKEY -->
          <article class="club-card glass reveal"
            data-category="sports">
            <div class="club-image">
              <img src="IMAGES/clubs/hockey.jpeg"
                alt="Hockey players participating in a game"
                loading="lazy">
              <span class="club-number">11</span>
            </div>
            <div class="club-body">
              <span class="club-category">Sports</span>
              <h3>Hockey Club</h3>
              <p>
                Explore a fast-paced team sport, develop
                coordination and fitness, and connect with
                students who enjoy hockey.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 12. CHOIR -->
          <article class="club-card glass reveal"
            data-category="arts">
            <div class="club-image">
              <img src="IMAGES/clubs/choir.jpeg"
                alt="Choir singers performing together"
                loading="lazy">
              <span class="club-number">12</span>
            </div>
            <div class="club-body">
              <span class="club-category">Arts</span>
              <h3>Campus Choir</h3>
              <p>
                Celebrate music, vocal expression and
                collaboration through singing, rehearsals
                and opportunities to perform.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 13. DANCE -->
          <article class="club-card glass reveal"
            data-category="arts">
            <div class="club-image">
              <img src="IMAGES/clubs/dance.jpeg"
                alt="Dancers performing together"
                loading="lazy">
              <span class="club-number">13</span>
            </div>
            <div class="club-body">
              <span class="club-category">Arts</span>
              <h3>Dance Society</h3>
              <p>
                Express yourself through movement, rhythm
                and creativity while connecting with other
                students who enjoy dance.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 14. FASHION -->
          <article class="club-card glass reveal"
            data-category="arts">
            <div class="club-image">
              <img src="IMAGES/clubs/fashion.jpeg"
                alt="Fashion and creative design representation"
                loading="lazy">
              <span class="club-number">14</span>
            </div>
            <div class="club-body">
              <span class="club-category">Arts</span>
              <h3>Fashion &amp; Creative Arts</h3>
              <p>
                Explore personal style, fashion design,
                creative expression and opportunities
                to share artistic ideas.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 15. ACADEMIC -->
          <article class="club-card glass reveal"
            data-category="academic">
            <div class="club-image">
              <img src="IMAGES/clubs/academic.jpeg"
                alt="Students participating in an academic activity"
                loading="lazy">
              <span class="club-number">15</span>
            </div>
            <div class="club-body">
              <span class="club-category">Academic</span>
              <h3>Academic Development Society</h3>
              <p>
                Connect with motivated students through
                peer learning, study support, knowledge
                sharing and academic development.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 16. ENGINEERING -->
          <article class="club-card glass reveal"
            data-category="academic">
            <div class="club-image">
              <img src="IMAGES/clubs/engineering.jpeg"
                alt="Engineering students working on a project"
                loading="lazy">
              <span class="club-number">16</span>
            </div>
            <div class="club-body">
              <span class="club-category">Academic</span>
              <h3>Engineering Society</h3>
              <p>
                Explore engineering concepts, practical
                projects, collaboration and opportunities
                to connect with students in technical fields.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>


          <!-- 17. STUDENT LIFE -->
          <article class="club-card glass reveal"
            data-category="community">
            <div class="club-image">
              <img src="IMAGES/clubs/hero.jpeg"
                alt="Students enjoying campus life"
                loading="lazy">
              <span class="club-number">17</span>
            </div>
            <div class="club-body">
              <span class="club-category">Community</span>
              <h3>Student Life Community</h3>
              <p>
                Explore campus connections, shared student
                experiences, social activities and opportunities
                to build friendships outside the classroom.
              </p>
              <div class="club-socials" aria-label="Social media platforms">
                <a href="https://x.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
                <a href="https://www.facebook.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Facebook"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                <a href="https://www.tiktok.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open TikTok"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                <a href="https://www.instagram.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open Instagram"><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                <a href="https://www.youtube.com/" class="club-social-link" target="_blank" rel="noopener noreferrer" aria-label="Open YouTube"><i class="fa-brands fa-youtube" aria-hidden="true"></i></a>
              </div>
              <button type="button" class="club-link join-club-button" aria-haspopup="dialog">
                Join This Club
                <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
              </button>
            </div>
          </article>

        </div>


        <!-- NO RESULTS -->
        <div id="no-results" class="empty-state glass" hidden>
          <i class="fa-solid fa-magnifying-glass"></i>
          <h3>No matching clubs found</h3>
          <p>
            Try another search term or select a different category.
          </p>
        </div>

      </div>
    </section>

    <dialog class="join-modal" id="join-club-modal" aria-labelledby="join-modal-title">
      <div class="join-modal-panel">
        <button type="button" class="join-modal-close" aria-label="Close membership form">
          <i class="fa-solid fa-xmark" aria-hidden="true"></i>
        </button>

        <div class="join-modal-header">
          <span class="join-modal-icon" aria-hidden="true">
            <i class="fa-solid fa-user-plus"></i>
          </span>
          <span class="section-tag">TAKE THE NEXT STEP</span>
          <h2 id="join-modal-title">Join a <span>Community.</span></h2>
          <p>Complete the details below to register your interest.</p>
        </div>

        <div class="selected-club">
          <span>Joining</span>
          <strong id="selected-club-name"></strong>
        </div>

        <form id="club-join-form" method="post" action="submit.php">
          <input type="hidden" name="formType" value="join">
          <input type="hidden" name="csrfToken" value="<?= htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8') ?>">
          <input type="hidden" name="club" id="join-club-value" value="">
          <div class="join-form-grid">
            <div class="form-group">
              <label for="join-title">Title</label>
              <select id="join-title" name="title" required>
                <option value="">Select title</option>
                <option value="Mr">Mr</option>
                <option value="Ms">Ms</option>
                <option value="Mx">Mx</option>
                <option value="Dr">Dr</option>
                <option value="Prefer not to say">Prefer not to say</option>
              </select>
            </div>

            <div class="form-group">
              <label for="join-student-number">Student Number</label>
              <input type="text" id="join-student-number" name="studentNumber"
                autocomplete="off" required>
            </div>

            <div class="form-group">
              <label for="join-first-name">First Name</label>
              <input type="text" id="join-first-name" name="firstName"
                autocomplete="given-name" required>
            </div>

            <div class="form-group">
              <label for="join-last-name">Last Name</label>
              <input type="text" id="join-last-name" name="lastName"
                autocomplete="family-name" required>
            </div>

            <div class="form-group">
              <label for="join-email">Student Email</label>
              <input type="email" id="join-email" name="email"
                placeholder="you@edu.vut.ac.za" autocomplete="email" required>
            </div>

            <div class="form-group">
              <label for="join-phone">Phone Number</label>
              <input type="tel" id="join-phone" name="phone"
                autocomplete="tel" pattern="[0-9+() -]{7,20}"
                title="Enter a phone number using digits, spaces, parentheses, +, or hyphens."
                required>
            </div>

            <div class="form-group">
              <label for="join-programme">Faculty / Programme</label>
              <input type="text" id="join-programme" name="programme"
                autocomplete="organization-title" required>
            </div>

            <div class="form-group">
              <label for="join-year">Year of Study</label>
              <select id="join-year" name="yearOfStudy" required>
                <option value="">Select year</option>
                <option value="1">First year</option>
                <option value="2">Second year</option>
                <option value="3">Third year</option>
                <option value="4">Fourth year</option>
                <option value="Postgraduate">Postgraduate</option>
                <option value="Other">Other</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="join-message">Why would you like to join? <span>(Optional)</span></label>
            <textarea id="join-message" name="message" rows="3"></textarea>
          </div>

          <label class="join-consent">
            <input type="checkbox" name="consent" value="yes" required>
            <span>I confirm that these details are accurate and agree to email them to the MavutiHub testing inbox at 224158678@edu.vut.ac.za.</span>
          </label>

          <button type="submit" class="btn btn-primary form-submit">
            Email Membership Request
            <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
          </button>
          <p class="join-disclaimer">Your request will be emailed to the testing inbox and is not stored by this website.</p>
        </form>
      </div>
    </dialog>


    <!-- CATEGORY COMPARISON TABLE -->
    <section class="section comparison-section" id="club-comparison">
      <div class="container">

        <div class="center-heading">
          <span class="section-tag">
            <i class="fa-solid fa-table-cells"></i>
            FIND YOUR FIT
          </span>

          <h2>Which Community <span>Fits You?</span></h2>

          <p>
            Different communities offer different experiences.
            Compare the categories below to discover which
            interests and activities suit you best.
          </p>
        </div>

        <div class="comparison-table-wrap glass">

          <table class="comparison-table">

            <caption>
              Comparison of student club and society categories
            </caption>

            <thead>
              <tr>
                <th scope="col">Category</th>
                <th scope="col">Main Focus</th>
                <th scope="col">Typical Activities</th>
                <th scope="col">Ideal For</th>
              </tr>
            </thead>

            <tbody>

              <tr>
                <th scope="row">
                  <span class="table-category">
                    <i class="fa-solid fa-laptop-code"></i>
                    Technology
                  </span>
                </th>
                <td>Innovation and technical skills</td>
                <td>Coding, projects and technology workshops</td>
                <td>Students interested in technology and problem-solving</td>
              </tr>

              <tr>
                <th scope="row">
                  <span class="table-category">
                    <i class="fa-solid fa-earth-africa"></i>
                    Culture
                  </span>
                </th>
                <td>Heritage, language and identity</td>
                <td>Cultural celebrations, traditions and discussions</td>
                <td>Students interested in cultural exchange</td>
              </tr>

              <tr>
                <th scope="row">
                  <span class="table-category">
                    <i class="fa-solid fa-futbol"></i>
                    Sports
                  </span>
                </th>
                <td>Fitness and teamwork</td>
                <td>Training, matches and competitions</td>
                <td>Students who enjoy physical activity</td>
              </tr>

              <tr>
                <th scope="row">
                  <span class="table-category">
                    <i class="fa-solid fa-palette"></i>
                    Arts
                  </span>
                </th>
                <td>Creativity and expression</td>
                <td>Choir, dance, fashion and performances</td>
                <td>Students who enjoy creative activities</td>
              </tr>

              <tr>
                <th scope="row">
                  <span class="table-category">
                    <i class="fa-solid fa-graduation-cap"></i>
                    Academic
                  </span>
                </th>
                <td>Learning and development</td>
                <td>Study groups, academic support and workshops</td>
                <td>Students focused on academic growth</td>
              </tr>

              <tr>
                <th scope="row">
                  <span class="table-category">
                    <i class="fa-solid fa-people-group"></i>
                    Community
                  </span>
                </th>
                <td>Belonging and social impact</td>
                <td>Awareness, outreach and student support</td>
                <td>Students who want to connect and contribute</td>
              </tr>

            </tbody>
          </table>

        </div>

        <div class="comparison-action">
          <a href="#club-directory" class="btn btn-primary">
            <i class="fa-solid fa-arrow-up"></i>
            Back to Club Directory
          </a>
        </div>

      </div>
    </section>


    <!-- CALL TO ACTION -->
    <section class="section cta-section">
      <div class="container">

        <div class="cta-panel">
          <span class="cta-kicker">YOUR CAMPUS JOURNEY STARTS HERE</span>

          <h2>Find Your People. <em>Make Your Mark.</em></h2>

          <p>
            A university experience becomes even more meaningful
            when you find people who share your interests.
            Start exploring and discover the community for you.
          </p>

          <a href="contact.php" class="btn btn-gold">
            Get in Touch
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>

      </div>
    </section>

  </main>


  <!-- FOOTER -->
  <?php include __DIR__ . '/INCLUDES/footer.php'; ?>

</body>
</html>
