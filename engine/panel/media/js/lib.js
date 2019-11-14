$(document).ready(function() {
$("#news-create").hide();
$("#news-delete").hide();


$("#news-delete-btn").on("click", function(){
  $("#news-create").hide();
  $("#news-index").hide();
  $("#news-delete").show(300);
});

$("#news-create-btn").on("click", function(){
  $("#news-delete").hide();
  $("#news-index").hide();
  $("#news-create").show(300);
});
$("#news-index-btn").on("click", function(){
  $("#news-delete").hide();
  $("#news-create").hide();
  $("#news-index").show(300);
});
});
