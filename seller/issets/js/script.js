$(document).ready(function () {

  // For click menu button, show/hide sidebar
  $("#btn-menu").click(function () {
    $(".sidebar").toggleClass("sidebar-show");
    $(".main-right").toggleClass("show");
  });
  
  // Expand subpage in sidebar menu
  $(".tour-btn").click(function () {
    $(".sidebar-menu ul .tour-show").toggleClass("show");
    $(".sidebar-menu ul .tour-caret").toggleClass("rotate");
  });

  $("#del-photo-1").on("click", function(){
    document.getElementById("photo-1-preview").src = "../issets/img/no-image.png";
    document.getElementById('photo-1-input').value = "";
  })


  // 
  // ====== Script for show products page
  function showToursData(tableID, page, numRow, sortBy) {
    $.ajax({
      url: "get-products-data.php",
      type: "POST",
      data: {
        tableID: tableID,
        page: page,
        numRow: numRow,
        sortBy: sortBy,
      },
      success: function (data) {
        $("#table-products").html(data);
      },
    });
  }

  //
  showToursData("table-products", 1, 5, "productID asc");

  // 
});
