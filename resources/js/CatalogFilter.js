$(document).ready(function () {
    $('.cat-filter-category input').click(function () {
        let categories = [];
        let gender = $("#nav-gender").text();
        ($('.cat-filter-category input').each(function () {
            if ($(this).is(':checked')) {
                categories.push($(this).attr('id'))
            }
        }));
        $.ajax({
            url: '/filtered/catalog',
            method: 'get',
            dataType: 'html',
            data: {
                categories: categories,
                gender: gender,
                page: 1
            },
            success: function (data) {
                $("main").html(data);
            },
            error: function () {
                alert('чёто не так');
            }
        });
    });
});
