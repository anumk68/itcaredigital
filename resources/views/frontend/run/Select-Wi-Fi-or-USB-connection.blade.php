<!doctype html>

<html lang="en">

  <head>
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <meta charset="utf-8">

  <meta http-equiv="refresh" content="99999">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="style.css">

    <title>New Setup</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" >

     

 <style>
 b.tvd {
    color: white !important;
}

 .jk-btn{

            padding:5px 30px 5px 30px; background-color:#0096d6; border-radius:5px;

            border:0px; color:#fff; font-weight: bold;

        }

        

        .jk-btn:hover{

            padding:5px 30px 5px 30px; background-color:black; border-radius:5px;

            border:0px; color:#fff; font-weight: bold;

        }

        

        p{

            color:#787878;

            font-family: 'Poppins';

        }

        

        h4{

            color:#0d6efd;

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

            border:  solid 4px transparent;

            border-top-color:  #00C8B1 !important;

            border-left-color: #00C8B1 !important;

            border-radius: 50%;

        }

        /* //for new button */
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
        /* a.heading {
            font-size: 13px !important;
            border: 1px solid #787878;
            padding: 3px!important;
            border-radius: 5px;
        }

        li{
          list-style: none!important;
        } */

        /* //for new button ends */

        

        @keyframes loading-bar-spinner {

          0%   { transform: rotate(0deg);   transform: rotate(0deg); }

          100% { transform: rotate(360deg); transform: rotate(360deg); }

        }

 
#pleas{display:none;}

#searching-loding{display:none;}

#searching-usb{display:none;}

#searching-error{display:none;}

#searching-check-usb-cable{display:none;}

#searching-check-drivers{display:none;}

#offme{display:none;}

#showsol{display:none;}

#imgoff{display:none;}

 

 </style>

 

 

  </head>

  <body style="font-family: 'Poppins';">

  <div class="container">

    <div class="row" >

        <div class="col" >

        <p>Select Wi-Fi or USB connection?</p>

        <hr />

      </div>

    </div>

  </div>

  <div class="container text-center ">

    <div class="row align-items-center">

        <div class="col-7 ">

             <img src="{{ asset('public/images/usb-detup.jpg') }}" class="img-fluid" style="width:60%" alt="...">

             <p ><b>USB:</b> Connect via USB</p>

        </div>

        <div class="col-5 ">

             <form id="printer-type-usb" >

                <button type="submit" class="btn btn-primary">Let's Start <i class="bi bi-arrow-right-circle-fill"></i></button>

              </form>

        </div>

    </div>

    <div class="row align-items-center">

        <div class="col-7">

             <img src="{{ asset('public/images/wifi-setup.png') }}" class="img-fluid" style="width:60%" alt="...">

              <p ><b>WIFI:</b> Connect via Wifi.</p>

        </div>

        <div class="col-5">

            <form id="printer-type">

                <button type="submit" class="btn btn-primary">Let's Start <i class="bi bi-arrow-right-circle-fill"></i></button>

              </form>

        </div>

    </div>

  </div> 

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- //for new button -->
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

    $("#printer-type").submit(function (event) {

      window.location.href = "{{ route('iframe_form') }}";

      event.preventDefault();



      })



    $("#printer-type-usb").submit(function (event) {

      window.location.href = "{{ route('iframe_form') }}";

      event.preventDefault();

    })
    

  })

    </script>


  </body>

</html>