
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
     CLUB MEMBERSHIP FORM
  ========================================== */

  const joinModal = document.getElementById("join-club-modal");
  const joinForm = document.getElementById("club-join-form");
  const selectedClubName = document.getElementById("selected-club-name");
  const joinClubValue = document.getElementById("join-club-value");
  const closeJoinModalButton = document.querySelector(".join-modal-close");

  if (
    joinModal instanceof HTMLDialogElement &&
    joinForm instanceof HTMLFormElement &&
    selectedClubName &&
    joinClubValue instanceof HTMLInputElement &&
    closeJoinModalButton
  ) {
    document.querySelectorAll(".join-club-button").forEach(button => {
      button.addEventListener("click", () => {
        const clubName = button.closest(".club-card")
          ?.querySelector("h3")
          ?.textContent
          .trim();

        if (!clubName) {
          console.error("Unable to determine which club the membership form is for.");
          return;
        }
        joinForm.reset();
        selectedClubName.textContent = clubName;
        joinClubValue.value = clubName;
        joinModal.showModal();
      });
    });

    closeJoinModalButton.addEventListener("click", () => {
      joinModal.close();
    });

    joinModal.addEventListener("keydown", event => {
      if (event.key === "Escape") {
        event.preventDefault();
        joinModal.close();
      }
    });

    joinModal.addEventListener("click", event => {
      if (event.target === joinModal) {
        joinModal.close();
      }
    });

  }


  /* ==========================================
     3. SCROLL ANIMATIONS
  ========================================== */

  const revealElements = document.querySelectorAll(".reveal");

  const reducedMotion = window.matchMedia(
    "(prefers-reduced-motion: reduce)"
  ).matches;

  const heroDescription = document.getElementById("hero-description");

  if (heroDescription) {
    const heroMessages = [
      {
        language: "en",
        text: "There's more to university than lectures and assignments. Meet people who share your passions, explore student societies, discover new opportunities and make your campus experience unforgettable."
      },
      {
        language: "st",
        text: "Univesithi ha se feela ka lithuto le mesebetsi e fanoang. Kopana le batho ba nang le lithahasello tse tšoanang le tsa hao, hlahloba mekhatlo ea baithuti, fumana menyetla e mecha 'me u etse hore boiphihlelo ba hao khampuseng bo se ke ba lebaleha."
      }
    ];
    let activeMessage = 0;

    window.setInterval(() => {
      activeMessage = (activeMessage + 1) % heroMessages.length;
      const message = heroMessages[activeMessage];
      const fadeDuration = reducedMotion ? 0 : 350;

      if (!reducedMotion) {
        heroDescription.classList.add("is-changing");
      }

      window.setTimeout(() => {
        heroDescription.textContent = message.text;
        heroDescription.lang = message.language;
        heroDescription.classList.remove("is-changing");
      }, fadeDuration);
    }, 15000);
  }

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
     TEAM MEMBER SLIDER
  ========================================== */

  const teamSlider = document.querySelector(".team-slider");
  const teamCards = document.querySelectorAll(".team-slider .team-card");
  const previousTeamButton = document.querySelector(".team-prev");
  const nextTeamButton = document.querySelector(".team-next");
  const currentTeamSlide = document.querySelector(".current-slide");
  const totalTeamSlides = document.querySelector(".total-slides");
  const teamProgress = document.querySelector(".progress-fill");

  if (
    teamSlider &&
    teamCards.length > 0 &&
    previousTeamButton &&
    nextTeamButton &&
    currentTeamSlide &&
    totalTeamSlides &&
    teamProgress
  ) {
    let currentTeamIndex = 0;
    let teamIsAnimating = false;
    let teamAnimationTimer;
    let pointerStart = null;
    const animationDuration = reducedMotion ? 0 : 800;

    totalTeamSlides.textContent = String(teamCards.length).padStart(2, "0");

    function updateTeamCards() {
      teamCards.forEach((card, index) => {
        let difference = index - currentTeamIndex;

        if (difference > teamCards.length / 2) {
          difference -= teamCards.length;
        } else if (difference < -teamCards.length / 2) {
          difference += teamCards.length;
        }

        const isActive = difference === 0;
        card.dataset.position =
          Math.abs(difference) > 2 ? "hidden" : String(difference);
        card.classList.toggle("active", isActive);
        card.setAttribute("aria-hidden", String(!isActive));
        card.setAttribute("aria-current", String(isActive));
        card.tabIndex = isActive ? 0 : -1;

        if (isActive) {
          card.style.removeProperty("--tilt-x");
          card.style.removeProperty("--tilt-y");
          card.style.removeProperty("--image-x");
          card.style.removeProperty("--image-y");
        }
      });

      currentTeamSlide.textContent =
        String(currentTeamIndex + 1).padStart(2, "0");
      teamProgress.style.width =
        `${((currentTeamIndex + 1) / teamCards.length) * 100}%`;
    }

    function showTeamMember(index) {
      if (teamIsAnimating) return;

      currentTeamIndex =
        (index + teamCards.length) % teamCards.length;
      teamIsAnimating = true;
      updateTeamCards();

      window.clearTimeout(teamAnimationTimer);
      teamAnimationTimer = window.setTimeout(() => {
        teamIsAnimating = false;
      }, animationDuration);
    }

    function showNextTeamMember() {
      showTeamMember(currentTeamIndex + 1);
    }

    function showPreviousTeamMember() {
      showTeamMember(currentTeamIndex - 1);
    }

    previousTeamButton.addEventListener("click", showPreviousTeamMember);
    nextTeamButton.addEventListener("click", showNextTeamMember);

    teamCards.forEach((card, index) => {
      card.addEventListener("click", () => {
        if (index !== currentTeamIndex) {
          showTeamMember(index);
        }
      });

      card.addEventListener("pointermove", event => {
        if (!card.classList.contains("active") || event.pointerType === "touch") {
          return;
        }

        const bounds = card.getBoundingClientRect();
        const x = (event.clientX - bounds.left) / bounds.width - 0.5;
        const y = (event.clientY - bounds.top) / bounds.height - 0.5;

        card.style.setProperty("--tilt-x", `${y * -8}deg`);
        card.style.setProperty("--tilt-y", `${x * 10}deg`);
        card.style.setProperty("--image-x", `${x * -8}px`);
        card.style.setProperty("--image-y", `${y * -8}px`);
      });

      card.addEventListener("pointerleave", () => {
        card.style.removeProperty("--tilt-x");
        card.style.removeProperty("--tilt-y");
        card.style.removeProperty("--image-x");
        card.style.removeProperty("--image-y");
      });
    });

    teamSlider.addEventListener("pointerdown", event => {
      if (event.pointerType === "mouse" && event.button !== 0) return;

      pointerStart = {
        x: event.clientX,
        y: event.clientY,
        id: event.pointerId
      };
    });

    teamSlider.addEventListener("pointerup", event => {
      if (!pointerStart || pointerStart.id !== event.pointerId) return;

      const deltaX = event.clientX - pointerStart.x;
      const deltaY = event.clientY - pointerStart.y;
      pointerStart = null;

      if (Math.abs(deltaX) > 45 && Math.abs(deltaX) > Math.abs(deltaY)) {
        if (deltaX < 0) showNextTeamMember();
        else showPreviousTeamMember();
      }
    });

    teamSlider.addEventListener("pointercancel", () => {
      pointerStart = null;
    });

    teamSlider.addEventListener("keydown", event => {
      if (event.altKey || event.ctrlKey || event.metaKey) return;
      if (event.target.closest("button")) return;

      if (event.key === "ArrowRight") {
        event.preventDefault();
        showNextTeamMember();
      } else if (event.key === "ArrowLeft") {
        event.preventDefault();
        showPreviousTeamMember();
      }
    });

    updateTeamCards();
  }

  /* ==========================================
     CAMPUS FACT ROTATOR
  ========================================== */

  const campusFact = document.getElementById("campus-fact");
  const campusFacts = [
    "VUT transitioned into a Technikon in 1979.",
    "In 2004, VUT became a University of Technology.",
    "VUT reports close to 20,000 active students."
  ];

  if (campusFact && !reducedMotion) {
    let factIndex = 0;

    window.setInterval(() => {
      campusFact.classList.add("is-changing");

      window.setTimeout(() => {
        factIndex = (factIndex + 1) % campusFacts.length;
        campusFact.textContent = campusFacts[factIndex];
        campusFact.classList.remove("is-changing");
      }, 350);
    }, 6000);
  }

  /* ==========================================
     COMMUNITY SPOTLIGHT SLIDESHOW
  ========================================== */

  const spotlightImage = document.querySelector(".spotlight-image > img");
  const spotlightCaption = document.getElementById("spotlight-caption");
  const previousSpotlightButton = document.querySelector(".spotlight-prev");
  const nextSpotlightButton = document.querySelector(".spotlight-next");
  const spotlightSlides = [
    {
      src: "IMAGES/clubs/innovation&entrepreneur.jpeg",
      alt: "Innovation and Entrepreneurship club",
      caption: "Innovation & Entrepreneurship"
    },
    {
      src: "IMAGES/clubs/basotho.jpeg",
      alt: "Basotho Cultural Society",
      caption: "Basotho Cultural Society"
    },
    {
      src: "IMAGES/clubs/soccerclub.jpeg",
      alt: "VUT Soccer Club",
      caption: "VUT Soccer Club"
    },
    {
      src: "IMAGES/clubs/choir.jpeg",
      alt: "VUT Choir",
      caption: "VUT Choir"
    }
  ];

  if (
    spotlightImage &&
    spotlightCaption &&
    previousSpotlightButton &&
    nextSpotlightButton
  ) {
    let spotlightIndex = 0;
    let spotlightTimer;

    function showSpotlightSlide(index) {
      spotlightIndex =
        (index + spotlightSlides.length) % spotlightSlides.length;
      const slide = spotlightSlides[spotlightIndex];
      const fadeDuration = reducedMotion ? 0 : 350;

      window.clearTimeout(spotlightTimer);
      spotlightImage.classList.add("is-changing");

      spotlightTimer = window.setTimeout(() => {
        spotlightImage.src = slide.src;
        spotlightImage.alt = slide.alt;
        spotlightCaption.textContent = slide.caption;
        spotlightImage.classList.remove("is-changing");

        if (!reducedMotion) {
          spotlightTimer = window.setTimeout(
            () => showSpotlightSlide(spotlightIndex + 1),
            6000
          );
        }
      }, fadeDuration);
    }

    previousSpotlightButton.addEventListener("click", () => {
      showSpotlightSlide(spotlightIndex - 1);
    });

    nextSpotlightButton.addEventListener("click", () => {
      showSpotlightSlide(spotlightIndex + 1);
    });

    if (!reducedMotion) {
      spotlightTimer = window.setTimeout(
        () => showSpotlightSlide(spotlightIndex + 1),
        6000
      );
    }
  }

  /* ==========================================
     INNER PAGE HERO BACKGROUNDS
  ========================================== */

  document.querySelectorAll(".hero-slideshow").forEach(slideshow => {
    const imageLayers = slideshow.querySelectorAll("img");
    if (imageLayers.length !== 2) return;

    let activeLayer = 0;
    let currentSlide = 0;
    imageLayers[activeLayer].src = spotlightSlides[currentSlide].src;

    if (reducedMotion) return;

    function advanceHeroSlideshow() {
      const nextSlide = (currentSlide + 1) % spotlightSlides.length;
      const slide = spotlightSlides[nextSlide];
      const preload = new Image();

      preload.onload = () => {
        const nextLayer = 1 - activeLayer;
        imageLayers[nextLayer].src = slide.src;
        imageLayers[nextLayer].classList.add("is-active");
        imageLayers[activeLayer].classList.remove("is-active");
        activeLayer = nextLayer;
        currentSlide = nextSlide;
        window.setTimeout(advanceHeroSlideshow, 6000);
      };

      preload.onerror = () => {
        console.error(`Unable to load hero slideshow image: ${slide.src}`);
        currentSlide = nextSlide;
        window.setTimeout(advanceHeroSlideshow, 6000);
      };

      preload.src = slide.src;
    }

    window.setTimeout(advanceHeroSlideshow, 6000);
  });


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
