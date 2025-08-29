$(function () {
  // ハンバーガーメニュー
  $(".js-hamburger").click(function () {
    $(this).toggleClass("is-active");
    $(".c-global-nav").toggleClass("is-active");
  });

  $(".c-global-nav a").click(function () {
    $(".js-hamburger").removeClass("is-active");
    $(".c-global-nav").removeClass("is-active");
  });


  // スライダー（jQueryプラグイン「slick」）
  $(".p-skills__slider .slider").slick({
    initialSlide: 0,
    autoplay: false,
    slidesToShow: 4,
    pauseOnFocus: true,
    pauseOnHover: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          dots: true,
          autoplay: true,
          autoplaySpeed: 3000,
          slidesToShow: 2
        }
      },
      {
        breakpoint: 767,
        settings: {
          dots: true,
          autoplay: true,
          autoplaySpeed: 3000,
          slidesToShow: 1
        }
      }
    ]
  });


  // TOPに戻るボタンの表示・非表示を切り替える  
  $(window).scroll(function () {
    if ($(this).scrollTop() > 200) {
      $('.c-page-top').addClass('is-show');
    } else {
      $('.c-page-top').removeClass('is-show');
    }
  });


  // TOPに戻るボタンをクリックしたときの処理
  $('.c-page-top').click(function () {
    $('body, html').animate({
      scrollTop: 0
    }, 200);
    return false;
  });


  // ページ内リンクのスムーススクロール
  $('a[href^="#"]').click(function () {
    const speed = 500; // スクロールの速さ
    const href = $(this).attr("href");
    const target = $(href === "#" || href === "" ? 'html' : href);
    const headerHeight = $('#header').outerHeight();
    const position = target.offset().top - headerHeight;
    $('html, body').animate({
      scrollTop: position
    }, speed, 'swing');
    return false;
  });


});