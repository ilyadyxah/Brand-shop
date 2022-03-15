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
                gender: gender
            },
            success: function (data) {
                $("main").html(data);
            },
            error: function () {
                alert('чёто не так');
            }
        });
    });

    $('body').on("click", ".link-page", function (e) {
        e.preventDefault();
        let categories = [];
        let page = ($(this).attr('id'));
        ($('body .cat-filter-category input').each(function () {
            if ($(this).is(':checked')) {
                categories.push($(this).attr('id'))
            }
        }));
        $.ajax({
            url: '/filtered/catalog',         /* Куда пойдет запрос */
            method: 'get',             /* Метод передачи (post или get) */
            dataType: 'html',          /* Тип данных в ответе (xml, json, script, html). */
            data: {
                check: categories,
                page: page
            },     /* Параметры передаваемые в запросе. */
            success: function (data) {   /* функция которая будет выполнена после успешного запроса.  */
                $("main").html(data);
            },
            error: function () {
                console.log(response.responseJSON.errors);
            }
        });
    });
});
