String.prototype.createUrl = function(){

    $url = this.toString().trim().toLowerCase();
    return $url.replace(/\s/g, '-').replace(/[^a-z\d-]+/g, '');

};

$(".form-search").on("submit", function (e) {
    var search = $("#search");

    if (search.val() === "") {
        search.attr("placeholder", "field is required");
        search.addClass("search-error");
        e.preventDefault();
    } else {
        search.removeClass("search-error");
    }
});

var doc = $(document);

$("#icon-search").on("click", function () {
    var formSearch = $("div#div-form-search");

    if (!formSearch.hasClass("show")) {
        doc.on("click.click1", function (e) {
            if (!formSearch.is(e.target) && !$(this).is(e.target)) {
                if (formSearch.has(e.target).length === 0) {
                    formSearch.removeClass("show");
                    doc.off("click.click1");
                }
            }
        });
    } else {
        doc.off("click.click1");
    }
});

function isClick(theObject) {
    if (theObject.hasClass("disabled")) return true;
    theObject.addClass("disabled");
    return false;
}

$(".add-product-to-cart").on("click", function () {
    $(this).attr("disabled", "disabled");
    $size = $(".product_size").val();

    if (!$size) {
        $size = 1;
    }

    $.ajax({
        url: BASIC_URL + "shop/add-product-to-cart",
        type: "GET",
        dataType: "html",
        data: { pid: $(this).data("pid"), quantity: $size },
        success: function (res) {
            window.location.reload();
        },
    });
});

$(".delete-from-cart-btn").on("click", function (e) {
    if (isClick($(this))) return false;

    e.preventDefault();
    $.ajax({
        url: BASIC_URL + "shop/delete-from-cart",
        type: "GET",
        dataType: "html",
        data: { pid: $(this).data("pid") },
        success: function (res) {
            window.location.reload();
        },
    });
});

$(".btn-clear-cart").on("click", function () {
    $(this).attr("disabled", "disabled");
    $.ajax({
        url: BASIC_URL + "shop/clear-cart",
        type: "GET",
        dataType: "html",
        success: function (res) {
            console.log("dd");
            window.location.reload();
        },
    });
});

$(window).ready(function () {
    $(".toast").toast({ delay: 4000 });
    $(".toast").toast("show");
});

$(".disabled-btn").on("click", function (e) {
    if (isClick($(this))) e.preventDefault();
});

$('.get-text').on('focusout', function(){
    $('.set-text').val($(this).val().createUrl());
});

$('#sorting').on('change', function (){

    var typeSort = $(this).val();
    typeSort = typeSort ? '&orderBy=' + typeSort : '';
    var current_page = CURRENT_PAGE ? 'page=' + CURRENT_PAGE : '1';

    location.replace(URL_PAGE + '?' + current_page + typeSort);

});

$('#checkout-site').on('click', function(){

    $(this).addClass('disabled');

});

$('form').on('submit', function(e){

    $('[type=submit]').attr('disabled', 'disabled');

});