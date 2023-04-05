$(document).ready(function () {
    loadcart();
    loadwishlist();

    //csrf_token
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // cart-count
    function loadcart() {
        $.ajax({
            method: "GET",
            url: "/load-cart-count",
            success: function (response) {
                // alert(response.success);
                // console.log(response.success);
                $(".cart-count").html("");
                $(".cart-count").html(response.success);
            },
        });
    }

    // wishlist-count
    function loadwishlist() {
        $.ajax({
            method: "GET",
            url: "/load-wishlist-count",
            success: function (response) {
                // alert(response.success);
                // console.log(response.success);
                $(".wishlist-count").html("");
                $(".wishlist-count").html(response.success);
            },
        });
    }

    // qty-increment
    $(".qty_increment").click(function (e) {
        e.preventDefault();

        var inc_value = $(this)
            .closest(".product_data")
            .find(".qty_input")
            .val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest(".product_data").find(".qty_input").val(value);
        }
    });

    //qty-decrement
    $(".qty_decrement").click(function (e) {
        e.preventDefault();

        var dec_value = $(this)
            .closest(".product_data")
            .find(".qty_input")
            .val();
        var value = parseInt(dec_value);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest(".product_data").find(".qty_input").val(value);
        }
    });

    // add-to-cart
    $(".addToCartBtn").click(function (e) {
        e.preventDefault();

        const product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();
        const product_qty = $(this)
            .closest(".product_data")
            .find(".qty_input")
            .val();

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                product_qty: product_qty,
            },
            success: function (response) {
                alert(response.success);
                loadcart();
                // console.log(response.success);
            },
        });
    });

    // remove-cart
    $(".cart-item-remove").click(function (e) {
        const product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();
        $.ajax({
            method: "POST",
            url: "/cart-item-remove",
            data: {
                product_id: product_id,
            },
            success: function (response) {
                window.location.reload();
                alert(response.success);
                //  console.log(response.success);
            },
        });
    });

    // update-cart
    $(".changeQuantity").click(function (e) {
        e.preventDefault();

        const product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();
        const product_qty = $(this)
            .closest(".product_data")
            .find(".qty_input")
            .val();
        $.ajax({
            method: "POST",
            url: "cart-item-update",
            data: {
                product_id: product_id,
                product_qty: product_qty,
            },
            success: function (response) {
                window.location.reload();
                // console.log(response.success);
                // alert(response.success);
            },
        });
    });

    // add-to-wishlist
    $(".addToWishlistBtn").click(function (e) {
        e.preventDefault();

        const product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                product_id: product_id,
            },
            success: function (response) {
                console.log(response.success);
                alert(response.success);
                loadwishlist();
            },
        });
    });

    // remove-wishlist
    $(".wishlist-item-remove").click(function (e) {
        e.preventDefault();

        const product_id = $(this)
            .closest(".product_data")
            .find(".product_id")
            .val();

        $.ajax({
            method: "POST",
            url: "/wishlist-item-remove",
            data: {
                product_id: product_id,
            },
            success: function (response) {
                window.location.reload();
                alert(response.success);
            },
        });
    });
});
