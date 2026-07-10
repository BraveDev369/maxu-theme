$(".blog_active").owlCarousel({
  loop: true,
  autoplay: true,
  autoplayTimeout: 10000,
  dots: false,
  rtl: true,
  nav: true,
  navText: [
    "<i class='fa fa-long-arrow-right'></i>",
    "<i class='fa fa-long-arrow-left'></i>",
  ],
  responsive: {
    0: {
      items: 1,
    },
    768: {
      items: 2,
    },
    992: {
      items: 3,
    },
    1000: {
      items: 3,
    },
    1920: {
      items: 3,
    },
  },
});

$(".testimonial_list").owlCarousel({
  loop: true,
  autoplay: true,
  autoplayTimeout: 10000,
  dots: true,
  rtl: true,
  nav: false,
  navText: [
    "<i class='fa fa-long-arrow-right'></i>",
    "<i class='fa fa-long-arrow-left'></i>",
  ],
  responsive: {
    0: {
      items: 1,
    },
    768: {
      items: 1,
    },
    992: {
      items: 1,
    },
    1000: {
      items: 1,
    },
    1920: {
      items: 1,
    },
  },
});
