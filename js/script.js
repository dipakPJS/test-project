


$(document).ready(function () {

/* ===== JQuery ajax section starts ====== */
 $('#sku').on('keyup', function(){

  var sku = $('#sku').val();

    $.ajax({
    type: "POST",
    url: "sku_availiability.php",
    data: "sku="+sku,
    success: function (data) {
      $(".error-message").html(data);
      
    },
    error:function (){}
  });

 });

/* ===== JQuery ajax section ends ====== */




$("#productType").on("change", function () {

    var selectValue = $("#productType").val();

    if (selectValue == "") {

      $(".size").css("display", "none");
      $(".weight").css("display", "none");
      $(".height").css("display", "none");
      $(".width").css("display", "none");
      $(".length").css("display", "none");

      /* To remove required attribute if type is switched */

      $('#size').removeAttr('required');
      $('#weight').removeAttr('required');
      $('#height').removeAttr('required');
      $('#width').removeAttr('required');
      $('#length').removeAttr('required');


      /* JQuery to reset input field if type is switched */

      $("#size").val('');
      $("#weight").val('');
      $("#height").val('');
      $("#width").val('');
      $("#length").val('');


    }

    else if (selectValue == "DVD") {


      $(".size").css("display", "block");
      $(".weight").css("display", "none");
      $(".height").css("display", "none");
      $(".width").css("display", "none");
      $(".length").css("display", "none");


      $("#size").attr("required", true);

      /* To remove required attribute if type is switched */

      $('#weight').removeAttr('required');
      $('#height').removeAttr('required');
      $('#width').removeAttr('required');
      $('#length').removeAttr('required');


      /* JQuery to reset input field if type is switched */


      $("#weight").val('');
      $("#height").val('');
      $("#width").val('');
      $("#length").val('');



    }

    else if (selectValue == "Book") {


      $(".size").css("display", "none");
      $(".weight").css("display", "block");
      $(".height").css("display", "none");
      $(".width").css("display", "none");
      $(".length").css("display", "none");


      $("#weight").attr("required", true);

      /* To remove required attribute if type is switched */

      $('#size').removeAttr('required');
      $('#height').removeAttr('required');
      $('#width').removeAttr('required');
      $('#length').removeAttr('required');

      /* JQuery to reset input field if type is switched */


      $("#size").val('');
      $("#height").val('');
      $("#width").val('');
      $("#length").val('');



    }

    else if (selectValue == "Furniture") {


      $(".size").css("display", "none");
      $(".weight").css("display", "none");
      $(".height").css("display", "block");
      $(".width").css("display", "block");
      $(".length").css("display", "block");


      $("#height").attr("required", true);
      $("#width").attr("required", true);
      $("#length").attr("required", true);

      /* To remove required attribute if type is switched */

      $('#size').removeAttr('required');
      $('#weight').removeAttr('required');



      /* JQuery to reset input field if type is switched */


      $("#size").val('');
      $("#weight").val('');




    }

    else {

    }

 

  });

  /* ================= prevent default for <input type = "number"> ================== */

$('#price, #size, #weight, #height, #width, #length').on('keypress', function (e) {

    if (e.key === 'e' || e.key === '+' || e.key === '-') {
      e.preventDefault();
    }
  
  });

});
 
 