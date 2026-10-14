<?php
$currentPage = basename($_SERVER['SCRIPT_NAME']);
?>
<header class="site-header">
  <nav class="navbar glass container" aria-label="Main navigation">
    <a href="index.php" class="logo" aria-label="MavutiHub homepage">
      <img src="IMAGES/VUT_logo-TM.png" alt="VUT logo" class="brand-logo">
      <span class="logo-wordmark">Mavuti<span>Hub</span></span>
    </a>

    <button id="menuToggle" class="menu-toggle" type="button"
      aria-label="Toggle navigation" aria-controls="navLinks" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>

    <ul id="navLinks" class="nav-links">
      <li><a href="index.php" class="nav-link<?= $currentPage === 'index.php' ? ' active' : '' ?>"<?= $currentPage === 'index.php' ? ' aria-current="page"' : '' ?>>Home</a></li>
      <li><a href="explore.php" class="nav-link<?= $currentPage === 'explore.php' ? ' active' : '' ?>"<?= $currentPage === 'explore.php' ? ' aria-current="page"' : '' ?>>Explore</a></li>
      <li><a href="about.php" class="nav-link<?= $currentPage === 'about.php' ? ' active' : '' ?>"<?= $currentPage === 'about.php' ? ' aria-current="page"' : '' ?>>About</a></li>
      <li><a href="contact.php" class="nav-link<?= $currentPage === 'contact.php' ? ' active' : '' ?>"<?= $currentPage === 'contact.php' ? ' aria-current="page"' : '' ?>>Contact</a></li>
    </ul>
  </nav>
</header>
