$("form.post-likes").on("submit", function () {
  var that = $(this),
    url = that.attr("action"),
    type = that.attr("method"),
    data = {};

  that.find("[name]").each(function (index, value) {
    var that = $(this),
      name = that.attr("name"),
      value = that.val();

    data[name] = value;
  });

  $.ajax({
    url: url,
    type: type,
    data: data,
    success: function (response) {
      $(".like-count").each(function (index, item) {
        $(item).html(response);
      });
    },
  });

  return false;
});

// $(function () {
//   // don't cache ajax or content won't be fresh
//   $.ajaxSetup({
//     cache: false,
//   });

//   var loadUrl = "likes.php";
//   $("#post-like-btn").click(function () {
//     $("#like-count").load(loadUrl);
//   });

//   // end
// });
