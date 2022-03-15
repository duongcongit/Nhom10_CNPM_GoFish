$(document).ready(function () {
  // Show Show alert add to cart success when click button in index.php
  $(".btn-add-to-cart").on("click", function () {
    // Create modal alert add to cart success
    var modalAddCartSucc = bootstrap.Modal.getOrCreateInstance(
      document.querySelector(".modal-add-to-cart-success")
    );
    // Show alert add to cart success
    modalAddCartSucc.show();
    setTimeout(function () {
      modalAddCartSucc.hide();
    }, 3000);
  });

  // Check input quantity
  $("#input-quantity").on("change", function () {
    let numPattern = /^[0-9]+$/;
    if (numPattern.test($(this).val()) == false) {
      $(this).val("1");
    }
  });
  // When click button increase quantity
  $("#btn-increase").on("click", function () {
    var currQuantity = $("#input-quantity").val();
    $("#input-quantity").val(parseInt(currQuantity) + 1);
  });
  // When click button decrease quantity
  $("#btn-decrease").on("click", function () {
    var currQuantity = $("#input-quantity").val();
    if (parseInt(currQuantity) > 1) {
      $("#input-quantity").val(parseInt(currQuantity) - 1);
    }
  });

  // Show Show alert add to cart success when click button in detailView.php
  $(".btn-add-to-cart-detail").on("click", function () {
    // Create modal alert add to cart success
    var modalAddCartSucc = bootstrap.Modal.getOrCreateInstance(
      document.querySelector(".modal-add-to-cart-success")
    );
    // Show alert add to cart success
    modalAddCartSucc.show();
    setTimeout(function () {
      modalAddCartSucc.hide();
    }, 3000);
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
