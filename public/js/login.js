$(function () {
    // $(function () {
    //     alert('OK!');
    // });

    $('.arrow_btn').click(function () {
        $(this).toggleClass('is-open');
        $(this).siblings('.menu').toggleClass('is-open');
    });


    // モーダル

    $('.modalOpen').on('click', function () {

        var post = $(this).attr('post');
        var post_id = $(this).attr('post_id');

        $('.modal_post').val(post);
        $('.modal_id').val(post_id);

        $('.js-modal').fadeIn();

        return false;

    });


    $(document).click(function (e) {
        if (!$(e.target).closest('.modal-inner').length) { $('.js-modal').fadeOut(); }

    });
});
