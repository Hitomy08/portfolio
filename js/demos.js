$(function () {
  /*----------------------------------------------------- ドロップダウンメニュー */

  // クリック型（jQuery）
  $('.click-menu .dropdown-item > a').on('click', function (e) {
    e.preventDefault();
    $(this).next('.submenu').slideToggle();
  });



  /*------------------------------------------------------  アコーディオンメニュー */

  // 1. 最初に全ての答え(dd)を非表示にする
  $(".faq-list dd").hide();

  // 2. 質問(dt)がクリックされたら
  $(".faq-list dt").click(function () {
    const $answer = $(this).next("dd"); // 3. クリックした質問の答えを取得

    // 4. 他の答えを全部閉じる
    $(".faq-list dd").not($answer).slideUp();
    $(".faq-list dt").not(this).removeClass("active");

    // 5. 自分の答えを開閉
    $answer.slideToggle();
    $(this).toggleClass("active");
  });


  /*------------------------------------------------------  モーダルウィンドウ */
  // モーダルを開く
  $(".modal-open").click(function () {
    $("body").css("overflow-y", "hidden"); // スクロール禁止
    $(".modal-container").addClass("active");
  });

  // ×ボタンで閉じる
  $(".modal-close").click(function () {
    $("body").css("overflow-y", "auto"); // スクロール復活
    $(".modal-container").removeClass("active");
  });

  // 背景クリックで閉じる
  $(".modal-container").click(function (e) {
    if ($(e.target).hasClass("modal-container")) {
      $("body").css("overflow-y", "auto");
      $(".modal-container").removeClass("active");
    }
  });

  // モーダル内のサムネイル画像をホバーした際の処理
  $('.modal-img img').on('mouseover', function () {

    // ホバーされた画像のパスを取得
    let img_src = $(this).attr("src");

    // メイン画像のsrcとホバーされた画像のsrcが異なる場合のみ画像を切り替える
    if ($('.modal-mainvisual img').attr("src") != img_src) {

      $('.modal-mainvisual img').fadeOut(100, function () {
        $(this).attr('src', img_src);
        $(this).fadeIn(100);
      })
    }
  });




  /*------------------------------------------------------  タブ切り替え */
  $(".tab-list .tab-all").addClass("active");
  $(".products-list.all").addClass("active");

  $(".tab-all").click(function () {
    $(".tab-list li").removeClass("active");
    $(".products-list").removeClass("active");
    $(this).addClass("active");
    $(".products-list.all").addClass("active");
  });

  $(".tab-tshirts").click(function () {
    $(".tab-list li").removeClass("active");
    $(".products-list").removeClass("active");
    $(this).addClass("active");
    $(".products-list.tshirts").addClass("active");
  });

  $(".tab-shirts").click(function () {
    $(".tab-list li").removeClass("active");
    $(".products-list").removeClass("active");
    $(this).addClass("active");
    $(".products-list.shirts").addClass("active");
  });

  $(".tab-parka").click(function () {
    $(".tab-list li").removeClass("active");
    $(".products-list").removeClass("active");
    $(this).addClass("active");
    $(".products-list.parka").addClass("active");
  });

  $(".tab-pants").click(function () {
    $(".tab-list li").removeClass("active");
    $(".products-list").removeClass("active");
    $(this).addClass("active");
    $(".products-list.pants").addClass("active");
  });




});
