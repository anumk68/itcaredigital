

<!doctype html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="style.css">

  <title>New Setup</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">



  <style>
    /* Add your CSS styles here */

    .hidden {

      display: none;

    }

    .jk-btn {

      padding: 5px 30px 5px 30px;
      background-color: #0096d6;
      border-radius: 5px;

      border: 0px;
      color: #fff;
      font-weight: bold;

    }



    .jk-btn:hover {

      padding: 5px 30px 5px 30px;
      background-color: black;
      border-radius: 5px;

      border: 0px;
      color: #fff;
      font-weight: bold;

    }

    a.num {

      color: #fff;

      text-decoration: none;

    }



    p {

      color: #787878;

      font-family: 'Poppins';

    }



    h4 {

      color: #0d6efd;

      font-weight: 600;

    }



    #loading-bar-spinner.spinner {

      left: 50%;

      margin-left: -20px;

      top: 50%;

      margin-top: -20px;

      position: absolute;

      z-index: 19 !important;

      animation: loading-bar-spinner 400ms linear infinite;

    }



    #loading-bar-spinner.spinner .spinner-icon {

      width: 40px;

      height: 40px;

      border: solid 4px transparent;

      border-top-color: #00C8B1 !important;

      border-left-color: #00C8B1 !important;

      border-radius: 50%;

    }



    @keyframes loading-bar-spinner {

      0% {
        transform: rotate(0deg);
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
        transform: rotate(360deg);
      }

    }







    #pleas {
      display: none;
    }

    #searching-loding {
      display: none;
    }

    #searching-usb {
      display: none;
    } 
    #spooler {
      display: none;
    } 
    #drivers {
      display: none;
    } 
    #files {
      display: none;
    }

    #searching-error {
      display: none;
    }

    #searching-check-usb-cable {
      display: none;
    }

    #searching-check-drivers {
      display: none;
    }

    #offme {
      display: none;
    }

    #showsol {
      display: none;
    }

    #imgoff {
      display: none;
    }
    /* //button */
    .dropdown {
          margin-top: 20px!important;
          border: 1px solid #0d6efd;
          border-radius: 19px !important;
          background: #0d6efd;
          padding: 1px !important;
          list-style: none!important;
        }
        .dropdown li a.heading{
          color: white !important;
        }
        a.heading{
          margin-left: 17px !important;
        }
        ul.dropdown-menu.align-items-center li {
            text-align: center;
             margin-bottom: -13px;
            padding: 0 !important;
        }
        ul.dropdown-menu.align-items-center {
            width: 100% !important;
        }
  </style>





  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script>

    $(document).ready(function () {

      $('#pleas').delay(1000).fadeIn(); $('#pleas').delay(3000).fadeOut();

      // $('#searching-loding').delay(100).fadeIn(); $('#searchingon').delay(3000).fadeOut();

      // $('#searching-usb').delay(2000).fadeIn(); $('#searching-usb').delay(2000).fadeOut();
      // $('#spooler').delay(5000).fadeIn(); $('#spooler').delay(2000).fadeOut();
      // $('#drivers').delay(8000).fadeIn(); $('#drivers').delay(2000).fadeOut();
     
      // $('#files').delay(11000).fadeIn(); $('#files').delay(2000).fadeOut();

      // $('#searching-error').delay(14000).fadeIn(); $('#searching-error').delay(3425000).fadeOut();

      // $('#searching-check-usb-cable').delay(15000).fadeIn(); $('#searching-check-usb-cable').delay(3425000).fadeOut();

      // $('#searching-check-drivers').delay(16500).fadeIn(); $('#searching-check-drivers').delay(3425000).fadeOut();

      // $('#offme').delay(0).fadeIn(); $('#offme').delay(20000).fadeOut();

      // $('#showsol').delay(3500).fadeIn(); $('#showsol').delay(5000).fadeOut();
      $('#showsol').delay(3300).fadeIn(); $('#showsol');




    });





  </script>

</head>

<body style="font-family: 'Poppins';">

  <div class="container-fluid">

    <div class="row">

      <div class="col">

        <p>Verify your printer's USB connection for a seamless setup process.</p>

        <hr />

      </div>

    </div>

  </div>

  <div class="container text-center ">

    <div class="row align-items-center" style="padding: 10px 0px 10px 0px;">

      <div class="col">



        <p id="pleas"><b>Please wait...</b></p>

        <img src="{{ asset('public/images/usb-detup.jpg') }}" class="img-fluid" style="width:45%" alt="...">



      </div>

    </div>

    <div class="row">

      <div class="col" id="initialContent">





        <!-- <div id="offme">

          <div id="loading-bar-spinner" class="spinner">
            <div id="searchingon" class="spinner-icon"></div>
          </div> 



          <p id="searching-usb" style="text-align: center;">

            <span style="display: inline-flex; align-items: center;">

              <img src="{{ asset('public/images/loding.gif') }}" alt="Your Image" style="height: 32px; margin-right: 5px;">

              Searching for USB Ports...

            </span>

          </p>


          <p id="spooler" style="text-align: center;">

            <span style="display: inline-flex; align-items: center;">

              <img src="{{ asset('public/images/loding.gif') }}" alt="Your Image" style="height: 32px; margin-right: 5px;">

              Checking Printer Spooler...

            </span>

          </p>

          <p id="drivers" style="text-align: center;">

            <span style="display: inline-flex; align-items: center;">

              <img src="{{ asset('public/images/loding.gif') }}" alt="Your Image" style="height: 32px; margin-right: 5px;">

              Checking Printer Drivers... 
            </span>

          </p>

          <p id="files" style="text-align: center;">

            <span style="display: inline-flex; align-items: center;">

              <img src="{{ asset('public/images/loding.gif') }}" alt="Your Image" style="height: 32px; margin-right: 5px;">

              Checking Installation Files...

            </span>

          </p>

          
             <p id="searching-error" style="text-align: center; color:red">

              <span style="display: inline-flex; align-items: center;">

                <img src="{{ asset('public/images/loding.gif') }}" alt="Your Image" style="height: 32px; margin-right: 5px;">

                Loading Error...

               </span>

             </p>



          <p id="searching-check-usb-cable" class="myElement">1. Check USB cable connected both side</p>

          <p id="searching-check-drivers">2. Check your device driver (USB Port Drivers)</p>



        </div> -->



        <div id="showsol">

          <div class="">

            <span style="font-size:18px"><b>USB connection failed.</b></span>

            <ul style="color:red" class="list-group">

              <li class="list-group-item">Check USB cable on both ends. <a href="{{ route('iframe_fixing') }}">Retry</a></li>

              <li class="list-group-item">Check USB port drivers. <a href="{{ route('iframe_printer_type_usb') }}">Check Drivers</a></li>

            </ul>

          </div>

          <!-- //dropdown button -->
          <!-- <div class="dropdown mt-5">
            <li class="nav-item" style="list-style: none !important;">
              <a class="nav-link heading" href="">Connect <i class="bi bi-arrow-down-short"></i></a>
              <ul class="dropdown-menu" 
                  aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item nav-link" href="ms-windows-store://pdp?&productid=9p7bp5vnwkx5/">
                          &nbsp;Quick Assist
                      </a>
                  </li>
                  <li><a class="dropdown-item nav-link" href="https://www.ultraviewer.net/en/UltraViewer_setup_6.6_en.exe">
                         &nbsp;Ultraviewer
                      </a>
                  </li>
                  <li><a class="dropdown-item nav-link" href="https://www.zoho.com/assist/join/">
                          &nbsp;Zoho Assist
                      </a>
                  </li>
              </ul>
            </li>
           </div> -->

          <!--  <div class="container text-center" style="padding-top:20px">

              <div  class="row">

              <div class="col-5 ">

                <form action="fixing.html">

                  <button  style="font-size: 13px;" class="btn btn-primary">Fix Issue</button>

                </form>

              </div>

              <div class="col-7 btn_s ">

                  <button id="showModalButton"  style="font-size: 13px;" class="btn btn-primary">Need Assistance?</button>
              

              </div>

            </div>

          </div> -->

        </div>

      </div>

      <div class="hidden" id="modalContent">

        <h4 style="margin-bottom: 20px;">Welcome to Printer Support</h4>

        <div class="container">


          <form id="submitForm" data-success-modal="#success-modal" style="padding: 10px;">

            <input hidden type="text" value="Apr 24 2024 / 04:40 PM;" name="dateTime">



            <input hidden type="text" value="HP PopUP Form" name="fullURL">

            <div class="row gkj">

              <div class="col-md-4 col-lg-4 col-sm-12 text-start">
                <label for="ModelNumber">Model Number:</label>
                <input type="text" class="form-control" name="model_num" id="model_num" required>
                <span id="ModelError"></span>
              </div>

            </div>


            <button type="button" id="widget_button_new"
              style="background-color: #0d6efd;color: #fff;border: 1px solid #fff;padding: 11px 20px 10px 20px;border-radius: 5px; margin-top: 9px"
              class="mt-4">

              Submit</button>

          </form>



        </div>









        <p style="color:black"><b>Your Support Ticket No.:<span id="ticket_no"></span></b> </p>

        <p>We acknowledge the receipt of your query. Our dedicated support engineer will promptly reach out to you.
          Kindly take note of your assigned Support Ticket Number for reference.</p>

        <hr />

        <!-- <button style="background-color: #0d6efd;color: #fff;border: 1px solid #fff;padding: 11px 20px 10px 20px;border-radius: 5px "><a href="tel:+1 (213)814-2927" class="num"><b>Call Now</b></a></button> -->

        <button
          style="background-color: #0d6efd;color: #fff;border: 1px solid #fff;padding: 11px 20px 10px 20px;border-radius: 5px ">


          <p class="number">

          </p>




      </div>

      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- //for dropdown button -->
      <script>
        $(document).ready(function () {
            $('.dropdown').hover(function () {
                $(this).find('.dropdown-menu')
                    .stop(true, true).delay(100).fadeIn(200);
            }, function () {
                $(this).find('.dropdown-menu')
                    .stop(true, true).delay(100).fadeOut(200);
            });
        });
    </script>


      <script>

        $(document).ready(function () {


          $("#showModalButton").click(function () {

            $("#initialContent").hide();
            $('#modalContent').css({ "display": "block" });

          });


          $("#widget_button_new").click(function (event) {

            $("#initialContent").hide();
            event.preventDefault();
            let numReg = /^[0-9]*$/;


            var model_num = $("input[name='model_num']").val();
            var fullName = $("input[name='fullName']").val();
            var phoneNumber = $("input[name='phoneNumber']").val();



            if (model_num == '') {

              $("#model_num").focus();
              return false;
            }

            if (fullName == '') {
              $("#full_name").focus();
              return false;
            }
            if (phoneNumber == '') {
              $("#phone_number").focus();
              return false;
            }
            if (phoneNumber.length < 10 || phoneNumber.length > 11 || !numReg.test(phoneNumber)) {
              $("#phone_number").focus();
              $("#PhoneError").html("Incorrect Number");
              $("#PhoneError").css("color", "red");
              return false;
            }

            var formData = {

              model_num: $("input[name='model_num']").val(),
              fullName: $("input[name='fullName']").val(),
              phoneNumber: $("input[name='phoneNumber']").val(),
              model_type: "HP"

            };

            $.ajax({

              type: "POST",
              url: "",
              data: formData,
              dataType: "json",

              success: function (response) {
                if (response.status === "success") {
                  $("#modalContent").show();
                  $("#submitForm").hide();
                  $("#successMessage").show().text("Your request has been submitted. Ticket Number: " + response.ticketNumber);
                  $("#ticket_no").html(response.ticketNumber);
                }

              }, error: function () {

                alert("An error occurred while submitting the form.");
              }


            });



          });




        });

      </script>



    </div>

</body>

</html>