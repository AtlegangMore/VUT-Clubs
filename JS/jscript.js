
document.addEventListener("DOMContentLoaded", () => {

  /* ==========================================
     1. MOBILE NAVIGATION
  ========================================== */

  const menuToggle = document.getElementById("menuToggle");
  const navLinks = document.getElementById("navLinks");

  if (menuToggle && navLinks) {
    menuToggle.addEventListener("click", () => {
      const active = navLinks.classList.toggle("active");

      menuToggle.classList.toggle("active", active);
      menuToggle.setAttribute("aria-expanded", String(active));
    });

    navLinks.querySelectorAll("a").forEach(link => {
      link.addEventListener("click", () => {
        navLinks.classList.remove("active");
        menuToggle.classList.remove("active");
        menuToggle.setAttribute("aria-expanded", "false");
      });
    });
  }


  /* ==========================================
     2. EXPLORE SEARCH AND CATEGORY FILTERS
  ========================================== */

  const searchInput = document.getElementById("club-search");
  const filterButtons = document.querySelectorAll(".filter-btn");
  const clubCards = document.querySelectorAll(".explore-grid .club-card");
  const clubCount = document.getElementById("club-count");
  const noResults = document.getElementById("no-results");

  let selectedCategory = "all";

  function updateClubResults() {
    const searchTerm = searchInput
      ? searchInput.value.toLowerCase().trim()
      : "";

    let visibleCount = 0;

    clubCards.forEach(card => {
      const clubText = card.textContent.toLowerCase();
      const category = (card.dataset.category || "")
        .toLowerCase()
        .trim();

      const matchesSearch = clubText.includes(searchTerm);
      const matchesCategory =
        selectedCategory === "all" ||
        category === selectedCategory;

      const shouldShow = matchesSearch && matchesCategory;

      card.hidden = !shouldShow;

      if (shouldShow) {
        visibleCount++;
      }
    });

    if (clubCount) {
      clubCount.textContent =
        `${visibleCount} ${visibleCount === 1 ? "club" : "clubs"}`;
    }

    if (noResults) {
      noResults.hidden = visibleCount !== 0;
    }
  }

  if (searchInput) {
    searchInput.addEventListener("input", updateClubResults);
    searchInput.addEventListener("search", updateClubResults);
  }

  filterButtons.forEach(button => {
    button.addEventListener("click", () => {
      selectedCategory = button.dataset.filter || "all";

      filterButtons.forEach(otherButton => {
        const isSelected = otherButton === button;

        otherButton.classList.toggle("active", isSelected);
        otherButton.setAttribute(
          "aria-pressed",
          String(isSelected)
        );
      });

      updateClubResults();
    });
  });

  if (clubCards.length > 0) {
    updateClubResults();
  }


  /* ==========================================
     3. SCROLL ANIMATIONS
  ========================================== */

  const revealElements = document.querySelectorAll(".reveal");

  const reducedMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)"
  ).matches;

  /*
    Keep content visible by default.
    Only enable hiding after the observer is ready.
  */

  if (!reducedMotion && "IntersectionObserver" in window) {
    try {
      const revealObserver = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add("visible");
            revealObserver.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.05,
        rootMargin: "0px 0px 50px 0px"
      });

      revealElements.forEach(element => {
        revealObserver.observe(element);
      });

      document.body.classList.add("js-animations");

      requestAnimationFrame(() => {
        revealElements.forEach(element => {
          const rect = element.getBoundingClientRect();

          if (rect.top < window.innerHeight && rect.bottom > 0) {
            element.classList.add("visible");
            revealObserver.unobserve(element);
          }
        });
      });

      // Fallback if an animation callback is delayed.
      setTimeout(() => {
        revealElements.forEach(element => {
          element.classList.add("visible");
        });
      }, 2000);

    } catch (error) {
      console.error("Reveal animation error:", error);
      document.body.classList.remove("js-animations");
    }
  } else {
    revealElements.forEach(element => {
      element.classList.add("visible");
    });
  }


  /* ==========================================
     4. ANIMATED STATISTICS
  ========================================== */

  const counters = document.querySelectorAll(".counter");

  function animateCounter(counter) {
    if (counter.dataset.animated === "true") return;

    counter.dataset.animated = "true";

    const target = Number(counter.dataset.target);

    if (!Number.isFinite(target)) return;

    if (reducedMotion) {
      counter.textContent = target;
      return;
    }

    const duration = 1400;
    let startTime = null;

    function step(timestamp) {
      if (startTime === null) {
        startTime = timestamp;
      }

      const progress = Math.min(
        (timestamp - startTime) / duration,
        1
      );

      const eased = 1 - Math.pow(1 - progress, 3);
      const current = Math.round(target * eased);

      counter.textContent = current;

      if (progress < 1) {
        requestAnimationFrame(step);
      } else {
        counter.textContent = target;
      }
    }

    requestAnimationFrame(step);
  }

  if ("IntersectionObserver" in window) {
    const counterObserver = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          counterObserver.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.2
    });

    counters.forEach(counter => {
      counterObserver.observe(counter);
    });
  } else {
    counters.forEach(animateCounter);
  }


  /* ==========================================
     5. SOCIAL MEDIA PLACEHOLDERS
  ========================================== */

  document.querySelectorAll("[data-social-placeholder]").forEach(link => {
    link.addEventListener("click", event => {
      event.preventDefault();

      alert(
        "MavutiHub's official social media links will be added soon."
      );
    });
  });


  /* ==========================================
     6. CONTACT FORM
  ========================================== */

  const contactForm = document.getElementById("contact-form");
  const formFeedback = document.getElementById("form-feedback");

  if (contactForm) {
    contactForm.addEventListener("submit", event => {
      event.preventDefault();

      if (!contactForm.reportValidity()) return;

      const firstName =
        document.getElementById("first-name")?.value.trim() || "Student";

      if (formFeedback) {
        formFeedback.textContent =
          `Thank you, ${firstName}! This is a demonstration form. ` +
          "Your message has not been sent or stored.";
      }
    });
  }


  /* ==========================================
     7. TEAM IMAGE FALLBACK
  ========================================== */

  const fallbackImage =
    "data:image/svg+xml;charset=UTF-8," +
    encodeURIComponent(`
      <svg xmlns="http://www.w3.org/2000/svg"
           width="240" height="240" viewBox="0 0 240 240">
        <rect width="240" height="240" fill="#eaf2ff"/>
        <circle cx="120" cy="90" r="42" fill="#8eabe5"/>
        <path d="M38 220c0-53 36-85 82-85s82 32 82 85"
              fill="#8eabe5"/>
      </svg>
    `);

  document.querySelectorAll("[data-team-photo]").forEach(img => {
    img.addEventListener("error", () => {
      img.onerror = null;
      img.src = fallbackImage;
    });

    if (img.complete && img.naturalWidth === 0) {
      img.src = fallbackImage;
    }
  });


  /* ==========================================
     8. COPYRIGHT YEAR
  ========================================== */

  document.querySelectorAll(".current-year").forEach(element => {
    element.textContent = new Date().getFullYear();
  });

});
