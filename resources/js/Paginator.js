$(document).ready(function () {
    $('body').on("click", ".link-pages", function (e) {
        e.preventDefault();
        let categories = [];
        let gender = $("#nav-gender").text();
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
                categories: categories,
                gender: gender,
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
