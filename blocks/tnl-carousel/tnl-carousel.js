intFunc = function () {
  jQuery('.tnl-carousel__slider_slide').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
    infinite: false,
    swipe: true,
    autoplay: true,
    autoplaySpeed: 5000,
  })
};
if (window.acf) {
  acf.addAction("render_block_preview/type=tnl-carousel", intFunc);
} else {
  intFunc();
}