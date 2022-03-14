$(document).ready(function () {


    // Show Show alert add to cart success when click button
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
});
