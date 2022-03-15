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
  $("#input-quantity").on("change", function(){
    let numPattern = /^[0-9]+$/;
    if(numPattern.test($(this).val()) == false){
      $(this).val("1");
    }
  })
  // When click button increase quantity
  $("#btn-increase").on("click", function(){
    var currQuantity = $("#input-quantity").val();
    $("#input-quantity").val(parseInt(currQuantity) + 1);
  })
  // When click button decrease quantity
  $("#btn-decrease").on("click", function(){
    var currQuantity = $("#input-quantity").val();
    if(parseInt(currQuantity) > 1){
      $("#input-quantity").val(parseInt(currQuantity) - 1);
    }
  })

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


  // 
});
