// Selectors

const header = document.querySelector("header");
const mainContainer = document.querySelector("#hero-text");
const nav = document.querySelector(".nav__links");
const burger = document.querySelector(".burger");
const navLinks = document.querySelectorAll(".nav__links a");

//Event Listeners
burger.addEventListener("click", () => {
  nav.classList.toggle("nav-open");
  burger.classList.toggle("toggle");
});

navLinks.forEach((navLink) => { 
  navLink.addEventListener("click", () => {
    nav.classList.toggle("nav-open");
    burger.classList.toggle("toggle");
  });
});

// Header scroll navbar

const headerObserver = new IntersectionObserver(
  function (entries) {
    entries.forEach((entry) => {
      if (!entry.isIntersecting) {
        header.classList.add("nav-scrolled");
      } else {
        header.classList.remove("nav-scrolled");
      }
    });
  },
  { rootMargin: "-175px" }
);

headerObserver.observe(mainContainer);


