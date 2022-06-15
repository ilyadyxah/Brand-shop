$(document).ready(function () {
    $(".logo-burger").click(function () {
        $(".menu").addClass("active");
        $(".overlay").addClass("active");
    });
    $(".menu-close-btn").click(function () {
        $(".menu").removeClass("active");
        $(".overlay").removeClass("active");
    });
    $(".overlay").click(function () {
        $(".menu").removeClass("active");
        $(".overlay").removeClass("active");
    });
});
