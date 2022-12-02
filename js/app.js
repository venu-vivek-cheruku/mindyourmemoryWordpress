function openMenu() {
  const humburger = document.querySelector(".menu");
  const mobileMenu = document.querySelector(".mobile-menu-container");
  const menuLinks = document.querySelectorAll(".mobile-menu-container li ");
  humburger.classList.toggle("open");
  mobileMenu.classList.toggle("open");
  menuLinks.forEach((cl) => cl.classList.toggle("slide-in-top"));
}

// wait until DOM is ready
document.addEventListener("DOMContentLoaded", function (event) {
  console.log("DOM loaded");

  // wait until images, links, fonts, stylesheets, and js is loaded
  window.addEventListener(
    "load",
    function (e) {
      // custom GSAP code goes here
      console.log("window loaded");
    },
    false
  );
});

gsap.registerPlugin(ScrollTrigger);

gsap.from(".hero-title", {
  x: -500,
  ease: "back",
  duration: 1,
});

let svgStagger = gsap.timeline({
  scrollTrigger: {
    trigger: ".hero-container",
    start: "top top",
    end: "bottom 600",
    scrub: true,
  },
});

gsap.from(".hero-image svg path", {
  x: 500,
  duration: 0.5,
  stagger: {
    amount: 1,
    from: "top",
  },
});

let tl = gsap.timeline({
  scrollTrigger: {
    trigger: ".introduction-container",
    start: "top center", // when the top of the trigger hits the top of the viewport
    end: "+=800", // end after scrolling 500px beyond the start
    ease: "back",
    once: true,
    markers: false,
  },
});

tl.to(".intro-image img", { scale: 1, duration: 0.5, opacity: 1 });
tl.from(".intro-content h1", {
  x: -500,
  duration: 0.5,
  opacity: 0,
  stagger: {
    amount: 0.1,
    from: "random",
  },
});

//benefits

let t2 = gsap.timeline({
  scrollTrigger: {
    trigger: "#benefits",
    start: "top center",
    end: "bottom bottom",
    scrub: 2,
    once: true,
  },
});

const benefitImg = gsap.utils.toArray(".benefit-image");

benefitImg.forEach((content, index) => {
  t2.to(content, { x: 0, duration: 0.5, opacity: 1 });
});

gsap.from(".basicSystem-container svg path", {
  x: -500,
  duration: 0.5,
  opacity: 0,
  stagger: {
    amount: 0.1,
    from: "random",
  },
  scrollTrigger: {
    trigger: ".basicSystem-container",
    start: "top center",
    end: "bottom 800",
    scrub: 2,
    once: true,
    markers: false,
  },
});

gsap.from(".processes", {
  opacity: 0,
  y: 500,
  scrollTrigger: {
    trigger: ".benefits-container",
    start: "200 center",
    end: "bottom bottom",
    markers: false,
  },
  stagger: {
    from: "left",
    amount: 2,
  },
});

// let t4 = gsap.timeline({
//   scrollTrigger: {
//     trigger: ".pricing-container",
//     start: "top center",
//     end: "bottom 700",
//     markers: false,
//     scrub: 2,
//     once: true,
//   },
// });

// t4.from(".price-box", {
//   y: 500,
//   opacity: 0,
//   ease: "back",
//   stagger: {
//     from: "center",
//     amount: 2,
//   },
// });

// t4.from(".price-1", {
//   scale: 2,
//   opacity: 0,
//   ease: "bounce",
//   stagger: {
//     from: "left",
//     amount: 2,
//   },
// });

let tl4 = gsap.timeline({
  scrollTrigger: {
    trigger: ".specialities-container",
    start: "top 800",
    end: "bottom bottom",
    ease: "back",
    once: true,
    markers: false,
  },
});

tl4.from(".specialities-box", {
  scale: 0.1,
  opacity: 0,
  stagger: {
    from: "bottom",
  },
});

let t5 = gsap.timeline({
  scrollTrigger: {
    trigger: ".contact-container",
    start: "top bottom",
    end: "center bottom",
    scrub: 2,
    once: true,
    markers: false,
  },
});

t5.from(".contact-container svg path", {
  x: 500,
  duration: 0.5,
  opacity: 0,
  stagger: {
    amount: 0.1,
    from: "random",
  },
});

gsap.from(".contact-container .rocket", {
  scale: 1,
  duration: 5,
  opacity: 0.5,
  delay: 2,
  ease: "bounce.inOut",
  repeat: -1,
});

var largeTL = gsap.timeline({
  scrollTrigger: {
    trigger: ".content-container",
    pin: ".aboutMe-introduction-container",
    pinSpacing: false,
    start: "top 100",
    markers: false,
    endTrigger: ".content-container",
    end: "bottom 600",
  },
});

// gsap.from(".introduction-image", {
//   y: 500,
//   opacity: 0,
//   scrollTrigger: {
//     trigger: "#introduction",
//     start: "top center",
//     end: "bottom bottom",
//   },
// });

// gsap.from(".box", {
//   y: 500,
//   opacity: 0,
//   scrollTrigger: {
//     trigger: ".boxes",
//     start: "top center",
//     end: "bottom bottom",
//   },
//   stagger: {
//     from: "center",
//     amount: 1,
//   },
// });

// const features = gsap.utils.toArray(".feature");

// features.forEach((content, index) => {
//   tl.from(content, { x: 500, duration: 0.5, opacity: 0 });
// });

// let tl2 = gsap.timeline({
//   scrollTrigger: {
//     trigger: "#whatsIntheBox",
//     start: "top center",
//     end: "bottom bottom",
//     ease: "back",
//     scrub: 1,
//     once: true,
//     markers: false,
//   },
// });

// const boxImages = gsap.utils.toArray(".box-item img");

// boxImages.forEach((content, index) => {
//   tl2.from(content, { y: 500, duration: 0.5, opacity: 0 });
// });

// let tl3 = gsap.timeline({
//   scrollTrigger: {
//     trigger: "#howToUse",
//     start: "top 800",
//     end: "bottom bottom",
//     ease: "back",
//     scrub: 1,
//     once: true,
//     markers: false,
//   },
// });

// const uses = gsap.utils.toArray("#howToUse img");

// uses.forEach((content, index) => {
//   tl3.from(content, { y: 500, duration: 0.5, opacity: 0 });
// });

// gsap.from(".tab", {
//   x: 500,
//   opacity: 0,
//   scrollTrigger: {
//     trigger: "#faq",
//     start: "top center",
//     end: "bottom bottom",
//   },
//   stagger: {
//     from: "bottom",
//     amount: 0.5,
//   },
// });

// const stars = gsap.utils.toArray(".stars span");
// stars.forEach((content, index) => {
//   tl4.from(content, {
//     x: -200,
//     duration: 0.5,
//     opacity: 0,
//     delay: 2,
//     stagger: {
//       from: "left",
//       amount: 1,
//     },
//   });
// });

// gsap.from(".icons a", {
//   // x: 500,
//   scale: 2,
//   opacity: 0,
//   scrollTrigger: {
//     trigger: "#contact",
//     start: "top center",
//     end: "bottom bottom",
//   },
//   stagger: {
//     from: "left",
//     amount: 0.5,
//   },
// });

// let tl5 = gsap.timeline({
//   scrollTrigger: {
//     trigger: "#footer",
//     start: "top 600",
//     end: "bottom bottom",
//     ease: "back",
//     scrub: 1,
//     once: true,
//     markers: false,
//   },
// });

// tl5
//   .from(".footer-logo  img", {
//     x: -500,
//     scale: 2,
//     opacity: 0,
//     stagger: {
//       from: "left",
//       amount: 0.5,
//     },
//   })
//   .from(".links li a", {
//     y: 500,
//     scale: 2,
//     opacity: 0,
//     stagger: {
//       from: "left",
//       amount: 0.5,
//     },
//   })
//   .from(".footer-cta p", {
//     x: 500,
//     opacity: 0,
//     stagger: {
//       from: "left",
//       amount: 0.5,
//     },
//   })
//   .from(".credits-container h3", {
//     y: 500,
//     opacity: 0,
//     stagger: {
//       from: "center",
//       amount: 1,
//     },
//   });
