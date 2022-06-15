$(document).ready(function () {
    calcTotal();
    $(".input-size-quantity").click(calcTotal);
    $(".cart-product").click(calcSubTotal);

    function calcSubTotal() {
        let price = $(this).find(".price-item-value").html();
        let count = $(this).find(".input-size-quantity").val();
        $("#sub-total").html(price * count);
    }

    function calcTotal() {
        let total = 0;
        $(".price-item-value").each(function () {
            let price = Number($(this).html());
            let count = Number($(`#count_${price}`).val());
            total += price * count;
        });
        $("#total").html(total);
    }

    if ($(".cart-products p").html() == 'Корзина пуста'){
        $("#checkout_btn").attr('type', 'hidden');
    }
});
