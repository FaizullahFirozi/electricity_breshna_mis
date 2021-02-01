// start section faizullah firozi wardak
// 0780002528

$(document).ready(function() {


// for submit the new and retype password

  $("#change").submit(function () {

    // message for empty

    if ($("#new").val() == ""){
      Event.preventDefault();
      alert("مهربانی وکړه کوډ ولیکه! خالی کود نشی کیدای چی پسورډ شی"); }

    // message for not value some

    if ($("#new").val() != $("#retype").val()) {
      Event.preventDefault();
      alert("New Password and Retype dose not Much");

    }

  });
  // end



  $("#counter_id").blur(function() {
    var counter_id = $("#counter_id").val();

    $.post("previous_value.php", "counter_id=" + counter_id, function(data) {
      $("#previous_value").val(data);
    });
  });
  // other section
  $("#present_value").blur(function() {
    var present_value = parseInt($(this).val());
    var previous_value = parseInt($("#previous_value").val());
    var killowatt = present_value - previous_value;
    var counter_id = parseInt($("#counter_id").val());

    var customer_type;
    $.post("customer_type.php", "counter_id=" + counter_id, function(data) {
      if (data === 0) {
        customer_type = "personal";
      } else {
        customer_type = "commercial";
      }
    });

    var elec_charge;
    // Algorithem for electricity_charge faizullah firozi wardak

    if (customer_type === "commercial") {
      elec_charge = killowatt * 10;
    } else {
      if (killowatt <= 300) {
        elec_charge = killowatt * 2.5;
      } else if (killowatt <= 700) {
        elec_charge = killowatt * 4.5;
      } else {
        elec_charge = killowatt * 6;
      }
    }

    $("#elec_charge").val(elec_charge);
    $("#invoice_amount").val(elec_charge);
    $("#payable_amount").val(elec_charge);

    /*  
     personal
    300   2.5
    700    4.5
    1000    6

    commercial
       10
*/

    // other query

    $.post("last_invoice.php", "counter_id=" + counter_id, function(data) {
      $("#due_amount").val(data);
      var payable = parseInt($("#payable_amount").val());

      $("#total_amount").val(payable + parseInt(data));
    });
  });

  // other section faizullah firozi
  // other section faizullah firozi

  $("#surcharge").blur(function() {
    var surcharge = parseInt($(this).val());
    var service = parseInt($("#service_charge").val());
    var elec_charge = parseInt($("#elec_charge").val());

    $("#invoice_amount").val(elec_charge + surcharge + service);
    $("#payable_amount").val(elec_charge + surcharge + service);
  });

  // other section faizullah firozi
  // other section faizullah firozi

  $("#service_charge").blur(function() {
    var service = parseInt($(this).val());
    var surcharge = parseInt($("#surcharge").val());
    var elec_charge = parseInt($("#elec_charge").val());
    $("#invoice_amount").val(elec_charge + service + surcharge);
    $("#payable_amount").val(elec_charge + service + surcharge);
  });

  // delete confirm
  $("a.delete").click(function() {
    var result = window.confirm("Faizullah! Are you sure want to delete ?");
    if (!result) {
      event.preventDefault();
      // faizullah firozi delete confirm message
    }
  });

  // print Function

  $("a.print").click(function () {
    var data = $("div#print-section").html();
    var printWindow = window.open("", "PrintWindow", "");
    printWindow.document.write('<html><head><link rel=\"stylesheet\" type=\"text/css\" href=\"css/bootstrap.min.css\">    <link rel=\"stylesheet\" type=\"text/css\" href=\"css/bootstrap-theme.min.css\">    <link  rel=\"stylesheet\" type=\"text/css\" href=\"cal/calendar-blue2.css\"/>    <link rel=\"stylesheet\" type=\"text/css\" href=\"css/style.css\">    <script type=\"text/javascript\" src=\"js/jquery.min.js\"></script>    <script type=\"text/javascript\" src=\"js/sweetalert2.all.min.js\"></script>    <script type=\"text/javascript\" src=\"js/bootstrap.min.js\"></script>    <script type=\"text/javascript\" src=\"cal/calendar.js\"></script>    <script type=\"text/javascript\" src=\"cal/calendar-en.js\"></script>    <script type=\"text/javascript\" src=\"cal/calendar-setup.js\"></script>    <script type=\"text/javascript\" src=\"js/script.js\"></script></head><body><img src="images/print/sa.png" style="margin-left:60px" height="130px"> ' + data + ' <br><h6 style="margin-left: 180px;">faizullah firozi wardak 0780002528</h6> </body></html>');

    // دا ولی کار نه کوی
    // printWindow.print();
    // printWindow.close();
  });

  // end of this first document firozi
});
// end of this first document firozi

function calcSalary(){
  var id = $("#emp_id").val();
  $.post("findGross.php" , "employee_id=" + id , function (data) {
    var gross = parseInt(data);

    $.post("findAbsent.php" , "employee_id=" + id , function (data) {
alert(gross);
    });
  });



  $.post("findOvertime.php" , "employee_id=" + id , function (data) {

  });

}


// end section faizullah firozi coding
// 0780002528

$(document).ready(function() {
  $("a#bstn").click(function() {
    Swal.fire({
      position: "top-end",
      icon: "success",
      title: "Your work has been saved",
      showConfirmButton: false,
      timer: 5000
    });
  });
  $("a.delete").on("click", function(e) {
    e.preventDedfault();
    const href = $(this).atrr("href");

    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then(result => {
      if (result.value) {
        Swal.fire("Deleted!", "Your file has been deleted.", "success");
      }
    });
  });

  $("a#btssn").click(function() {
    Swal.fire({
      title: "Are you sure?",
      text: "You won't be able to revert this!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then(result => {
      if (result.value) {
        Swal.fire("Deleted!", "Your file has been deleted.", "success");
      }
    });
  });

  $("a#btssn").click(function() {
    let timerInterval;
    Swal.fire({
      title: "Auto close alert!",
      html: "I will close in <b></b> milliseconds.",
      timer: 2000,
      timerProgressBar: true,
      onBeforeOpen: () => {
        Swal.showLoading();
        timerInterval = setInterval(() => {
          const content = Swal.getContent();
          if (content) {
            const b = content.querySelector("b");
            if (b) {
              b.textContent = Swal.getTimerLeft();
            }
          }
        }, 100);
      },
      onClose: () => {
        clearInterval(timerInterval);
      }
    }).then(result => {
      /* Read more about handling dismissals below */
      if (result.dismiss === Swal.DismissReason.timer) {
        console.log("I was closed by the timer");
      }
    });
  });

  $("a#btn").click(function() {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger"
      },
      buttonsStyling: false
    });

    swalWithBootstrapButtons
      .fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
      })
      .then(result => {
        if (result.value) {
          swalWithBootstrapButtons.fire(
            "Deleted!",
            "Your file has been deleted.",
            "success"
          );
        } else if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.cancel
        ) {
          swalWithBootstrapButtons.fire(
            "Cancelled",
            "Your imaginary file is safe :)",
            "error"
          );
        }
      });
  });
});
