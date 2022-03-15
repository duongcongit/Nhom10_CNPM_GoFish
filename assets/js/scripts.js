$(document).ready(function () {
  //
  function get_qcart_data() {
    var test;
    $.ajax({
      url: "./user/cart/get-quick-view-cart-data.php",
      type: "POST",
      data: {
        test: test,
      },
      success: function (data) {
        $(".quick-cart").html(data);
      },
    });
  }

  get_qcart_data();
  //
  function add_to_cart(productID, quantity) {
    $.ajax({
      url: "./user/cart/proccess-add-to-cart.php",
      type: "POST",
      data: {
        productID: productID,
        quantity: quantity,
      },
      success: function (data) {
        // Create modal alert add to cart success
        var modalAddCartSucc = bootstrap.Modal.getOrCreateInstance(
          document.querySelector(".modal-add-to-cart-success")
        );
        // Show alert add to cart success
        modalAddCartSucc.show();
        //
        get_qcart_data();
        //
        setTimeout(function () {
          modalAddCartSucc.hide();
        }, 3000);
      },
    });
  }
  // Envent click button add to cart in index.php
  $(".btn-add-to-cart").on("click", function () {
    var productID = $(this).data("product_id");
    add_to_cart(productID, "1");
  });

  // Check input quantity
  $("#input-quantity-detail").mouseleave(function () {
    let numPattern = /^[0-9]+$/;
    if (numPattern.test($(this).val()) == false) {
      $(".btn-add-to-cart-detail")
        .attr("disabled", "disabled")
        .css("background", "gray");
      $(this).val("1");
      setTimeout(function () {
        $(".btn-add-to-cart-detail")
          .removeAttr("disabled")
          .css("background", "#3d1a1a");
      }, 2000);
    }
    //
    if ($(this).val() > $(this).data("prod_stock")) {
      $(".btn-add-to-cart-detail")
        .attr("disabled", "disabled")
        .css("background", "gray");
      $(this).val($(this).data("prod_stock"));
      setTimeout(function () {
        $(".btn-add-to-cart-detail")
          .removeAttr("disabled")
          .css("background", "#3d1a1a");
      }, 1000);
    }
  });
  // When click button increase quantity
  $("#btn-increase").on("click", function () {
    var currQuantity = $("#input-quantity-detail").val();
    $("#input-quantity-detail").val(parseInt(currQuantity) + 1);
  });
  // When click button decrease quantity
  $("#btn-decrease").on("click", function () {
    var currQuantity = $("#input-quantity-detail").val();
    if (parseInt(currQuantity) > 1) {
      $("#input-quantity-detail").val(parseInt(currQuantity) - 1);
    }
  });

  // Event click button add to cart in detailView.php
  $(".btn-add-to-cart-detail").on("click", function () {
    var quantity = $("#input-quantity-detail").val();
    var productID = $(this).data("product_id");
    add_to_cart(productID, quantity);
    // // Create modal alert add to cart success
    // var modalAddCartSucc = bootstrap.Modal.getOrCreateInstance(
    //   document.querySelector(".modal-add-to-cart-success")
    // );
    // // Show alert add to cart success
    // modalAddCartSucc.show();
    // setTimeout(function () {
    //   modalAddCartSucc.hide();
    // }, 3000);
  });

  // Scripts for Cart page

  // Event click button select products in cart
  // Select all
  $("#btn-check-all-cart").change(function () {
    if (this.checked) {
      $(".btn-check-shop").prop("checked", true);
      $(".btn-check-product").prop("checked", true);
    } else {
      $(".btn-check-shop").prop("checked", false);
      $(".btn-check-product").prop("checked", false);
    }
  });

  // Select a shop
  $(".btn-check-shop").change(function () {
    if (this.checked) {
      $(".btn-check-product").prop("checked", true);
    } else {
      $("#btn-check-all-cart").prop("checked", false);
      $(".btn-check-product").prop("checked", false);
    }
  });

  // Select a product
  $(".btn-check-product").change(function () {
    // if(this.checked){
    // }
    // else{
    //   $("#btn-check-all-cart").prop('checked', false);
    //   $(".btn-check-shop").prop('checked', false);
    // }
  });

  // Show alert confirm when click button clear cart
  $(".btn-clear-cart").on("click", function () {
    // Create modal confirm clear cart
    var modalConfClearCart = bootstrap.Modal.getOrCreateInstance(
      document.querySelector(".md-conf-remove-from-cart")
    );
    $("#conf-remove-from-cart-content").text(
      "Bạn có muốn xóa tất cả các sản phẩm khỏi giỏ hàng?"
    );
    // Show alert confirm claer cart
    modalConfClearCart.show();
  });

  // Show alert confirm when click button remove a product from cart
  $(".btn-remove-cart").on("click", function () {
    // Create modal confirm
    var modalConfRmCart = bootstrap.Modal.getOrCreateInstance(
      document.querySelector(".md-conf-remove-from-cart")
    );
    $("#conf-remove-from-cart-content").text(
      "Bạn có muốn xóa sản phẩm đang chọn khỏi giỏ hàng?"
    );
    // Show alert confirm
    modalConfRmCart.show();
  });

  // Check input quantity
  $("#input-quantity-cart").on("change", function () {
    let numPattern = /^[0-9]+$/;
    if (numPattern.test($(this).val()) == false) {
      $(this).val("1");
    }
  });
  // When click button increase quantity
  $("#btn-increase-cart").on("click", function () {
    var currQuantity = $("#input-quantity-cart").val();
    $("#input-quantity-cart").val(parseInt(currQuantity) + 1);
  });
  // When click button decrease quantity
  $("#btn-decrease-cart").on("click", function () {
    var currQuantity = $("#input-quantity-cart").val();
    if (parseInt(currQuantity) > 1) {
      $("#input-quantity-cart").val(parseInt(currQuantity) - 1);
    }
  });

  //
});
