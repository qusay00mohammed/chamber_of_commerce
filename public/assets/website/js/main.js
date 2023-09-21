$(".dropMNavM").click(function () {
  $(this).find(".dropMenuM").slideToggle(500);
  $(".dropMenuM").not($(this).find(".dropMenuM")).slideUp(500);
});

$(".dropMNavM").click(function () {
  $(this).find("i").toggleClass("active");
  $(".dropMNavM").not($(this)).find("i.active").removeClass("active");
});

///////////////////////////////////////////

var swiperTextHeader = new Swiper(".mytextHeaderSlider", {
  effect: "slide",
  loop: false,
  allowTouchMove: false,
  spaceBetween: 20,
});

var swiperHeader = new Swiper(".mySwiper", {
  simulateTouch: false,
  spaceBetween: 20,
  loop: true,
  autoplay: {
    delay: 5000,
  },
  effect: "fade",
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiperTextHeader,
  },
});

swiperHeader.controller.control = this.swiperTextHeader;

///////

var swiper = new Swiper(".sliderHeaderS", {
  slidesPerView: 2,
  spaceBetween: 10,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    400: {
      slidesPerView: 2,
      spaceBetween: 10,
    },
    767: {
      slidesPerView: 3,
      spaceBetween: 10,
    },
    991: {
      slidesPerView: 4,
      spaceBetween: 10,
    },
  },
});

///////

///////

var swiper = new Swiper(".sliderBoard", {
  slidesPerView: 1,
  spaceBetween: 20,
  slidesPerGroup: 1,
  loop: false,
  navigation: {
    nextEl: ".prev-BoardO",
    prevEl: ".next-BoardO",
  },
  breakpoints: {
    420: {
      slidesPerView: 2,
      spaceBetween: 15,
      slidesPerGroup: 2,
    },
    767: {
      slidesPerView: 3,
      spaceBetween: 15,
      slidesPerGroup: 3,
    },
    991: {
      slidesPerView: 4,
      spaceBetween: 20,
      slidesPerGroup: 4,
    },
    1400: {
      slidesPerView: 5,
      spaceBetween: 20,
      slidesPerGroup: 5,
    },
  },
});

///////

var swiper = new Swiper(".sliderOfficialAgencies", {
  slidesPerView: 1,
  spaceBetween: 20,
  slidesPerGroup: 1,
  loop: false,
  navigation: {
    nextEl: ".button-prev-OfficialA",
    prevEl: ".button-next-OfficialA",
  },
  breakpoints: {
    420: {
      slidesPerView: 2,
      spaceBetween: 15,
      slidesPerGroup: 2,
    },
    767: {
      slidesPerView: 3,
      spaceBetween: 15,
      slidesPerGroup: 3,
    },
    991: {
      slidesPerView: 4,
      spaceBetween: 20,
      slidesPerGroup: 4,
    },
    1400: {
      slidesPerView: 5,
      spaceBetween: 20,
      slidesPerGroup: 5,
    },
  },
});

//////////////////////////////////////

var swiper = new Swiper(".sliderOfficialAgenciesT", {
  slidesPerView: 1,
  spaceBetween: 20,
  slidesPerGroup: 1,
  loop: false,
  navigation: {
    nextEl: ".button-prev-OfficialT",
    prevEl: ".button-next-OfficialT",
  },
  breakpoints: {
    420: {
      slidesPerView: 2,
      spaceBetween: 15,
      slidesPerGroup: 2,
    },
    767: {
      slidesPerView: 3,
      spaceBetween: 15,
      slidesPerGroup: 3,
    },
    991: {
      slidesPerView: 4,
      spaceBetween: 20,
      slidesPerGroup: 4,
    },
    1400: {
      slidesPerView: 5,
      spaceBetween: 20,
      slidesPerGroup: 5,
    },
  },
});

//////////////////////////////////////

var swiper = new Swiper(".tradeDelegationsSlider", {
  loop: true,
  navigation: {
    nextEl: ".tradeDelegations-button-prev",
    prevEl: ".tradeDelegations-button-next",
  },
});

///////

var swiper = new Swiper(".achievementsAndNumbersSlider", {
  slidesPerView: 1,
  spaceBetween: 20,
  slidesPerGroup: 1,
  loop: true,
  navigation: {
    nextEl: ".button-prev-Achievements",
    prevEl: ".button-next-Achievements",
  },
  breakpoints: {
    420: {
      slidesPerView: 2,
      spaceBetween: 15,
      slidesPerGroup: 2,
    },
    767: {
      slidesPerView: 3,
      spaceBetween: 15,
      slidesPerGroup: 3,
    },
    991: {
      slidesPerView: 4,
      spaceBetween: 20,
      slidesPerGroup: 4,
    },
    1400: {
      slidesPerView: 5,
      spaceBetween: 20,
      slidesPerGroup: 5,
    },
  },
});

/////////////////////////////////

var swiper = new Swiper(".swiperImageN", {
  navigation: {
    nextEl: ".button-prev-sliderImageN",
    prevEl: ".button-next-sliderImageN",
  },
});

//////////////////////

var swiper = new Swiper(".swiperNews", {
  slidesPerView: 1,
  spaceBetween: 20,
  navigation: {
    nextEl: ".button-prev-swiperNews",
    prevEl: ".button-next-swiperNews",
  },
  breakpoints: {
    500: {
      slidesPerView: 2,
      spaceBetween: 22,
    },
    767: {
      slidesPerView: 2,
      spaceBetween: 30,
    },
    991: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    1200: {
      slidesPerView: 4,
      spaceBetween: 30,
    },
  },
});

////////////////////////////////////////////////
//////////////////////

var swiper = new Swiper(".swiperGeneralization", {
  slidesPerView: 1,
  spaceBetween: 20,
  navigation: {
    nextEl: ".button-prev-swiperGeneralization",
    prevEl: ".button-next-swiperGeneralization",
  },
  breakpoints: {
    500: {
      slidesPerView: 1,
      spaceBetween: 22,
    },
    800: {
      slidesPerView: 2,
      spaceBetween: 30,
    },

    1200: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
  },
});

////////////////////////////////////////////////

ScrollReveal({ reset: false });
ScrollReveal().reveal(".top", {
  origin: "top",
  delay: 200,
  duration: 700,
  distance: "60px",
  easing: "ease-in-out",
});
ScrollReveal().reveal(".right", {
  origin: "right",
  delay: 200,
  duration: 700,
  distance: "60px",
  easing: "ease-in-out",
});
ScrollReveal().reveal(".left", {
  origin: "left",
  delay: 200,
  duration: 700,
  distance: "60px",
  easing: "ease-in-out",
});
ScrollReveal().reveal(".bottom", {
  origin: "bottom",
  delay: 200,
  duration: 700,
  distance: "60px",
  easing: "ease-in-out",
});
ScrollReveal().reveal(".cardChamberCommitteesS", {
  origin: "bottom",
  delay: 200,
  duration: 700,
  distance: "60px",
  easing: "ease-in-out",
});
ScrollReveal().reveal(".titleSec h1", {
  origin: "bottom",
  delay: 200,
  duration: 700,
  distance: "60px",
  easing: "ease-in-out",
});
ScrollReveal().reveal(".titleSec p", {
  origin: "bottom",
  delay: 200,
  duration: 700,
  distance: "60px",
  easing: "ease-in-out",
});
ScrollReveal().reveal(".cardRoomServices", {
  origin: "bottom",
  delay: 200,
  duration: 700,
  distance: "60px",
  easing: "ease-in-out",
});
ScrollReveal().reveal(".btnsMobileApplicationS", {
  origin: "bottom",
  delay: 200,
  duration: 700,
  distance: "0px",
  easing: "ease-in-out",
});
ScrollReveal().reveal(".footerB", {
  origin: "bottom",
  delay: 200,
  duration: 700,
  distance: "0px",
  easing: "ease-in-out",
});
