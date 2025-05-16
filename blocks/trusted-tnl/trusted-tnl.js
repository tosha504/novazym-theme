intFunc = function () {
  jQuery('.trusted-tnl__brands').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    infinite: true,
    swipe: true,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 769,
        settings: {
          slidesToShow: 4
        }
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 2
        }
      }
    ]
  })
};
if (window.acf) {
  acf.addAction("render_block_preview/type=trusted-tnl", intFunc);
} else {
  intFunc();
}