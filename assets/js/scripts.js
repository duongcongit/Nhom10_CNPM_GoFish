$(document).ready(function () {
  // ================== SCRIPTS FOR HOME PAGE ============================== //
  // ------- FUNCTIONS
  // Function get data quick view cart
  function get_quick_cart_data() {
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
  // Get data quick view cart
  get_quick_cart_data();

  // Function add a product to cart
  function add_to_cart(productID, quantity) {
    $.ajax({
      url: "./user/cart/process-add-to-cart.php",
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
        // Update quick view cart
        get_quick_cart_data();
        //
        setTimeout(function () {
          modalAddCartSucc.hide();
        }, 3000);
      },
    });
  }

  // ------- EVENTS
  // Event click button add to cart
  $(".btn-add-to-cart").on("click", function () {
    var productID = $(this).data("product_id");
    add_to_cart(productID, "1");
  });

  // ================== SCRIPTS FOR DETAIL VIEW PAGE ============================== //
  // ------- FUNCTIONS

  // ------- EVENTS
  // Check when quantity is changed
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
    } else if ($(this).val() > $(this).data("prod_stock")) {
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

  // When click button add to cart
  $(".btn-add-to-cart-detail").on("click", function () {
    var quantity = $("#input-quantity-detail").val();
    var productID = $(this).data("product_id");
    add_to_cart(productID, quantity);
  });

  // ================== SCRIPTS FOR CART PAGE ============================== //
  //
  var num_prod_checked = 0;
  // -------- FUNCTIONS
  // Function get data for cart view
  function get_cart_data() {
    var test;
    $.ajax({
      url: "get-cart-data.php",
      type: "POST",
      data: {
        test: test,
      },
      success: function (data) {
        $("#cart-view").html(data);
      },
    });
  }
  // Get data quick view cart
  get_cart_data();

  // Function format price
  function format_price(price) {
    var value = price.toString();
    var price_formatted = "";
    var d = 0;
    for (let i = value.length - 1; i >= 0; i--) {
      price_formatted = price_formatted + value[i];
      d++;
      if (d % 3 == 0 && d != value.length) {
        price_formatted = price_formatted + ".";
      }
    }
    //
    price_formatted = price_formatted.split("").reverse().join("");
    return price_formatted;
  }

  // Function update quantity
  function update_quantity(productID, quantity) {
    $.ajax({
      url: "process-update-quantity.php",
      type: "POST",
      data: {
        quantity: quantity,
        productID: productID,
      },
      success: function (data) {},
    });
  }

  // Function update amount of a product in cart
  function update_amount(productID, price, quantity) {
    var amount = price * quantity;
    $(".amount[data-prodid='" + productID + "']").html(
      format_price(amount) + '<u class="ms-1">đ</u>'
    );
    //
    $(".btn-check-product[data-prodid='" + productID + "']").val(parseInt(amount));
    //
  }

  // Function update total price
  function update_total_price() {
    var num_inp = $(".btn-check-product").length;
    var amount = 0;
    var num_prod = 0;
    for (let i = 0; i < num_inp; i++) {
      var inp = $(".btn-check-product:eq(" + i + ")");
      if (inp.is(":checked")) {
        num_prod++;
        amount = amount + parseInt(inp.val());
      }
    }
    //
    num_prod_checked = num_prod;
    //
    $(".number-product-checked").text(num_prod + " (Sản phẩm)");
    $(".total-price").html(format_price(amount) + '<u class="ms-1">đ</u>');
  }

  // Function Update when quantity is over stock
  function update_all_quantity() {
    setTimeout(function () {
      for (let i = 0; i < $(".input-quantity-cart").length; i++) {
        var object = $(".input-quantity-cart:eq(" + i + ")");
        var prodID = object.data("prodid");
        var stock = object.data("prod_stock");
        if (object.val() > stock) {
          update_quantity(prodID, stock);
          get_cart_data();
        }
      }
    }, 2000);
  }
  // Call func
  update_all_quantity();

  // ------- EVENTS
  // --- Click button order
  $(document).on("click", "#btn-order", function(){
    if(num_prod_checked == 0){
      $("#order-help").removeClass("d-none");
    }
    else{
      $("#order-help").addClass("d-none");
    }
  })
  // --- Event click button select products in cart
  // Select all
  $(document).on("change", "#btn-check-all-cart", function () {
    if (this.checked) {
      $(".btn-check-shop").prop("checked", true);
      $(".btn-check-product").prop("checked", true);
    } else {
      $(".btn-check-shop").prop("checked", false);
      $(".btn-check-product").prop("checked", false);
    }
    //
    update_total_price();
  });

  // Select a shop
  $(document).on("change", ".btn-check-shop", function () {
    var sellerID = $(this).data("seller_id");
    if (this.checked) {
      $(".btn-check-product[data-seller_id='" + sellerID + "']").prop("checked", true);
    } 
    else {
      $("#btn-check-all-cart").prop("checked", false);
      $(".btn-check-product[data-seller_id='" + sellerID + "']").prop("checked", false);
    }
    //
    update_total_price();
  });

  // Select a product
  $(document).on("change", ".btn-check-product", function () {
    // var prodID = $(this).data("prodid");
    var sellerID = $(this).data("seller_id");
    var num_prod_of_seller = $(".btn-check-shop[data-seller_id='" + sellerID + "']").data("num_prod");
    if (this.checked) {
      var num_checked = 0;
      var inp_prod = $(".btn-check-product[data-seller_id='" + sellerID + "']");
      for(let i = 0; i<num_prod_of_seller; i++){
        if(inp_prod.is(":checked")){
          num_checked++;
        }
      }
      //
      if(num_checked == num_prod_of_seller){
        $(".btn-check-shop[data-seller_id='" + sellerID + "']").prop("checked", true);
      }
      //
    } else {
      $("#btn-check-all-cart").prop("checked", false);
      $(".btn-check-shop[data-seller_id='" + sellerID + "']").prop("checked", false);
    }
    
    update_total_price();
  });

  // --- Events when click a button remove products from cart

  // When click button remove all
  $(document).on("click", ".btn-clear-cart", function () {
    // Create modal confirm
    var modalConfClearCart = bootstrap.Modal.getOrCreateInstance(
      document.querySelector(".md-conf-remove-from-cart")
    );
    $("#conf-remove-from-cart-content").text(
      "Bạn có muốn xóa tất cả các sản phẩm khỏi giỏ hàng?"
    );
    // Show alert confirm
    modalConfClearCart.show();
    // Remove all product from cart
    $("#btn-conf-remove-cart").on("click", function () {
      var all = "all";
      $.ajax({
        url: "process-remove-from-cart.php",
        type: "POST",
        data: {
          all: all,
        },
        success: function (data) {},
      });
      //
      modalConfClearCart.hide();
      get_cart_data();
    });
    //
  });

  // When click button remove a product from cart
  $(document).on("click", ".btn-remove-cart", function () {
    var productID = $(this).data("prodid");
    // Create modal confirm
    var modalConfRmCart = bootstrap.Modal.getOrCreateInstance(
      document.querySelector(".md-conf-remove-from-cart")
    );
    $("#conf-remove-from-cart-content").text(
      "Bạn có muốn xóa sản phẩm khỏi giỏ hàng?"
    );
    // Show alert confirm
    modalConfRmCart.show();
    // Remove product from cart
    $("#btn-conf-remove-cart").on("click", function () {
      $.ajax({
        url: "process-remove-from-cart.php",
        type: "POST",
        data: {
          productID: productID,
        },
        success: function (data) {},
      });
      //
      modalConfRmCart.hide();
      get_cart_data();
    });
    //
  });


  // --- Events when change quantity
  // Check when input box quantity is changed
  $(document).on("change", ".input-quantity-cart", function () {
    let numPattern = /^[0-9]+$/;
    var prodID = $(this).data("prodid");
    var prodPrice = $(this).data("prod_price");
    var stock = $(this).data("prod_stock");

    if (numPattern.test($(this).val()) == false) {
      $(this).val("1");
    } else if ($(this).val() > stock) {
      $(this).val(stock);
    } else if ($(this).val() == 0) {
      $(this).val("1");
    }
    //
    var quantity = $(this).val();
    update_quantity(prodID, quantity); // Update quantity in database
    update_amount(prodID, prodPrice, quantity); // Update amount
    update_total_price(); // Update total price
  });

  // When click button increase quantity of a product
  $(document).on("click", ".btn-increase-cart", function () {
    var prodID = $(this).data("prodid");
    var prodPrice = $(this).data("prod_price");
    var stock = $(this).data("prod_stock");
    var inpQuantity = $(".input-quantity-cart[data-prodid='" + prodID + "']");
    var currQuantity = inpQuantity.val();
    //
    if (inpQuantity.val() < stock) {
      inpQuantity.val(parseInt(currQuantity) + 1);
    }
    //
    var quantity = inpQuantity.val();
    update_quantity(prodID, quantity); // Update quantity in database
    update_amount(prodID, prodPrice, quantity); // Update amount
    update_total_price(); // Update total price
  });

  // When click button decrease quantity
  $(document).on("click", ".btn-decrease-cart", function () {
    var prodID = $(this).data("prodid");
    var prodPrice = $(this).data("prod_price");
    var inpQuantity = $(".input-quantity-cart[data-prodid='" + prodID + "']");
    var currQuantity = inpQuantity.val();
    if (parseInt(currQuantity) > 1) {
      inpQuantity.val(parseInt(currQuantity) - 1);
    }
    //
    var quantity = inpQuantity.val();
    // Update quantity in database
    update_quantity(prodID, quantity);
    // get_cart_data();
    update_amount(prodID, prodPrice, quantity);
    update_total_price();
  });

  //
});
