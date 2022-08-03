$(document).ready(function () {
  // Send Search Text to the server
  $("#eventSearch").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "searchTitle.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
          $("#show-list").php(response);
        },
      });
    } else {
      $("#show-list").php("");
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", "a", function () {
    $("#eventSearch").val($(this).text());
    $("#show-list").php("");
  });
});