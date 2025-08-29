$(function () {

  // モーダルを開く
  $('.modal-open').click(function () {
    $(this).closest('li').find('.modal-container').addClass('active');
  });
  // ×ボタンで閉じる
  $('.modal-close').click(function () {
    $(this).parents('.modal-container').removeClass('active');
  });

  // 背景クリックで閉じる
  $('.modal-container').click(function (e) {
    if ($(e.target).hasClass('modal-container')) {
      $(this).removeClass('active');
    }
  });
  // サムネ操作でメイン画像を差し替え
  $('.modal-img img').on('mouseenter click', function () {
    const src = $(this).attr('src');
    // 同じモーダル内のメインだけ更新
    $(this).closest('.modal-bg').find('.modal-mainvisual img').attr('src', src);
  });

});
