$(document).ready(function () {
    $('body').on("click", ".choose-spec-input", function () {
        let color;
        let size;
        let quantity;
        let itemId = $("#itemId").val();
        $(".color-select input").each(function () {
            if ($(this).is(':checked')) {
                color = $(this).val();
            }
        });
        $(".size-select input").each(function () {
            if ($(this).is(':checked')) {
                size = $(this).val();
            }
        });
        $(".quantity-select input").each(function () {
            if ($(this).is(':checked')) {
                quantity = $(this).val();
            }
        });
        $.ajax({
            url: '/option-price',         /* Куда пойдет запрос */
            method: 'get',             /* Метод передачи (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: {
                itemId: itemId,
                color: color,
                size: size,
                quantity: quantity
            },     /* Параметры передаваемые в запросе. */
            success: function (data) {   /* функция которая будет выполнена после успешного запроса.  */
                console.log(data.option.id);
                $(".price-product").html(data.price);
                $("#optionId").val(data.option.id);
            },
            error: function () {
                console.log(response.responseJSON.errors);
            }
        });
    });
});

// Если нужно сохранить скролл
// $(window).on("scroll", function () {
//     $('input[name="scroll"]').val($(window).scrollTop());
// });
//
// <?php if (!empty($_REQUEST['scroll'])): ?>
// $(document).ready(function () {
//     window.scrollTo(0, <?php echo intval($_REQUEST['scroll']); ?>);
// });
// <?php endif; ?>
