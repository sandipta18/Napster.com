$("#email").keyup(function () {
  $.ajax({
    url: "/validate_ajax",
    method: "POST",
    data: { email: $(this).val() },
    datatype: "text",
    success: function (html) {
      $("#check").html(html);
    },
  })
});
