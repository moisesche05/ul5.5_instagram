var url = 'http://localhost/ul5.5_instagram/public';
window.addEventListener("load", function () {

    $('.btn-like, .btn-dislike').css('cursor', 'pointer');

    function like() {
        $('.btn-like').unbind('click').click(function () {
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr('src', url + '/images/heart-grey.png');

            $.ajax({
                url: url + '/dislike/' + $(this).data('id'),
                type: 'GET',
                success: function (response) {
                    if (response.like) {
                        console.log("Dislike correctamente");
                    } else {
                        console.log("Error dislike");
                    }
                }
            });

            dislike();
        });
    }

    like();

    function dislike() {
        $('.btn-dislike').unbind('click').click(function () {
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr('src', url + '/images/heart-red.png');

            $.ajax({
                url: url + '/like/' + $(this).data('id'),
                type: 'GET',
                success: function (response) {
                    if (response.like) {
                        console.log("Like correctamente");
                    } else {
                        console.log("Error like");
                    }
                }
            });

            like();
        });
    }

    dislike();

    $('#buscador').submit(function () {
        $(this).attr('action', url+"/user/index/"+$('#search').val());
        $(this).submit();
    });
});