$(document).ready(function () {
  $("#example").DataTable();
});


$(document).ready(function () {
  var me=0,mb=0,mm=0;
  $("#markenglish, #markbangla,#markmath ").keyup(function(){
    var me = parseInt($("#markenglish").val());
    var mb = parseInt($("#markbangla").val());
    var mm = parseInt($("#markmath").val());
    $("#totalmark").val( me+mb+mm);
  });
});
