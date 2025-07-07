<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Computer Issues - Diagnose and Solve</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('public/images/main.svg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        div {
            border-radius: 8px;
        }

        button.random {
            border: 1px solid #152545;
            color: #152545;
            padding: 7px;
            border-radius: 4px;
            margin-bottom: 4px;
        }

        button.cmn_btns {
            border: 1px solid #152545;
            color: #152545;
            padding: 7px;
            border-radius: 4px;
            margin-bottom: 4px;
        }

        button.random:hover {
            background: lightgray;
        }

        li {
            list-style-type: none;
        }

        span.dis_text {
            font-family: monospace;
        }

        div.main_message_bot {
            margin-left: -32px;
        }
    </style>
</head>

<body>
    <header class="hp_printer mb-3">
        <nav class="navbar navbar-expand-lg navbar-light" style="background:<?php echo $bg; ?>;">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('public/images/main.png') }}"
                        alt="..."></a>
                <p class="fw-bold text-white">Virtual Chat</p>
            </div>
        </nav>
    </header>

    <section class="message_bot_main">
        <div class="container-fluid">
            <div class="row">
                <div class="main_chat_process">
                    <ul>
                        <li>
                            <div class="main_message_bot show_intro">
                                <!-- <div class="img_messsage_bot"><i class="fa fa-desktop" aria-hidden="true"
                                        style="color:<?php echo $bg; ?>"></i></div> -->
                                <div class="content_chat p-4" style="background:#E8E8E8;width:700px;">
                                    <p>Welcome, to the chat I will try my best to assist you.<br>
                                        <span class="dis_text"
                                            style="font-size:13px;color:<?php echo $bg; ?>;font-weight:bold;">
                                            Virtual Assistant: <?php echo $time; ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <div class="main_message_bot show_issues">
                                <!-- <div class="img_messsage_bot"><i class="fa fa-desktop" aria-hidden="true"
                                        style="color:<?php echo $bg; ?>"></i></div> -->
                                <div class="content_chat p-4" style="background:#E8E8E8;width:700px;">
                                    <p>Please select your printer issue.</p>
                                    <table>
                                        <tr>
                                            <td>
                                                <button class="printer_btn btn_issue <?php echo $v; ?>"
                                                    style="border:1px solid <?php echo $bg; ?>;color:<?php echo $bg; ?>"
                                                    data-value="download_driver">Download Drivers</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><button class="printer_btn btn_issue <?php echo $v; ?>"
                                                    style="border:1px solid <?php echo $bg; ?>;color:<?php echo $bg; ?>"
                                                    data-value="printer_setup">Printer Setup</button></td>
                                        </tr>
                                        <tr>
                                            <td><button class="printer_btn btn_issue <?php echo $v; ?>"
                                                    style="border:1px solid <?php echo $bg; ?>;color:<?php echo $bg; ?>"
                                                    data-value="printer_offline">Printer
                                                    Offline</button></td>
                                        </tr>
                                        <tr>
                                            <td><button class="printer_btn btn_issue <?php echo $v; ?>"
                                                    style="border:1px solid <?php echo $bg; ?>;color:<?php echo $bg; ?>"
                                                    data-value="wireless_printer">Wireless

                                                    Printer</button></td>
                                        </tr>
                                        <tr>
                                            <td><button class="printer_btn btn_issue <?php echo $v; ?>"
                                                    style="border:1px solid <?php echo $bg; ?>;color:<?php echo $bg; ?>"
                                                    data-value="scanner_issues">Scanner

                                                    Issues</button></td>
                                        </tr>
                                        <tr>
                                            <td><button class="printer_btn btn_issue <?php echo $v; ?>"
                                                    style="border:1px solid <?php echo $bg; ?>;color:<?php echo $bg; ?>"
                                                    data-value="ink_not_printing">Ink Not

                                                    Printing</button></td>
                                        </tr>
                                        <tr>
                                            <td><button class="printer_btn btn_issue <?php echo $v; ?>"
                                                    style="border:1px solid <?php echo $bg; ?>;color:<?php echo $bg; ?>"
                                                    data-value="cartridge_issues">Cartridge

                                                    Issues</button></td>
                                        </tr>
                                        <tr>
                                            <td><button class="printer_btn btn_issue <?php echo $v; ?>"
                                                    style="border:1px solid <?php echo $bg; ?>;color:<?php echo $bg; ?>"
                                                    data-value="job_stuck_queue">Job Stuck

                                                    Queue</button></td>
                                        </tr>
                                        <tr>
                                            <td><button class="printer_btn btn_issue <?php echo $v; ?>"
                                                    style="border:1px solid <?php echo $bg; ?>;color:<?php echo $bg; ?>"
                                                    data-value="paper_jam_issue">Paper Jam
                                                    Issue</button></td>
                                        </tr>
                                        <tr>
                                            <td><button class="printer_btn btn_issue <?php echo $v; ?>"
                                                    style="border:1px solid <?php echo $bg; ?>;color:<?php echo $bg; ?>"
                                                    data-value="instant_ink_issues">Instant Ink

                                                    Issues</button></td>
                                        </tr>
                                        <tr>
                                            <td><button class="printer_btn btn_issue <?php echo $v; ?>"
                                                    style="border:1px solid <?php echo $bg; ?>;color:<?php echo $bg; ?>"
                                                    data-value="carriage_jammed">Carriage

                                                    Jammed</button></td>
                                        </tr>
                                        <tr>
                                            <td><button class="printer_btn btn_issue <?php echo $v; ?>"
                                                    style="border:1px solid <?php echo $bg; ?>;color:<?php echo $bg; ?>"
                                                    data-value="fax_issues">Fax Issues</button>
                                            </td>
                                        </tr>
                                    </table>

                                    <span class="dis_text"
                                        style="font-size:13px;color:<?php echo $bg; ?>;font-weight:bold;">
                                        Virtual Assistant: <?php echo $time; ?>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <!-- //reply -->

                    <ul>
                        <li class="position_set">
                            <div class="ahead d-flex justify-content-end">
                                <div class="main_message_bot main_end" id="user_div" style="display:none;">
                                    <div class="content_chat p-4" style="background:#E8E8E8;width:700px;">
                                        <p id="user_reply"></p>
                                        <span class="dis_text" style="font-size:13px;color:green;font-weight:bold;">
                                            Chat User: <?php echo $time; ?>
                                        </span>
                                    </div>

                                    <div class="img_message_botSSS text-end">
                                        <i class="fa fa-user" aria-hidden="true"
                                            style="color:<?php echo $bg; ?>;font-size:20px;"></i>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <!-- //solution -->
                    <ul>
                        <li>
                            <div class="main_message_bot show_steps" id="solution_output">
                                <!-- <div class="img_messsage_bot"><i class="fa fa-desktop" aria-hidden="true"
                                        style="color:<?php echo $bg; ?>"></i></div> -->
                                <div class="content_chat p-4" id="solution_div"
                                    style="background:#E8E8E8;width:700px;display:none;">
                                    <p>Kindly, follow these steps...</p>
                                    <p id="solution_outputs"><?php echo $sol; ?></p>
                                    <span class="dis_text"
                                        style="font-size:13px;color:<?php echo $bg; ?>;font-weight:bold;">
                                        Virtual Assistant: <?php echo $time; ?>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <!-- //for yes no -->
                    <ul>
                        <li>
                            <div class="main_message_bot show_worthy" id="valuable" style="display:none;">
                                <!-- <div class="img_messsage_bot"><i class="fa fa-desktop" aria-hidden="true"
                                        style="color:<?php echo $bg; ?>"></i></div> -->
                                <div class="content_chat p-4" style="background:#E8E8E8;width:700px;">
                                    <p>Is the issue resolved?</p>
                                    <table>
                                        <tr>
                                            <td><button class="printer_btn cmn_btns"
                                                    style="border:1px solid <?php echo $bg; ?>;color:<?php echo $bg; ?>"
                                                    onclick="show_thanks_div()">Yes</button></td>
                                            <td>&nbsp;</td>
                                            <td><button class="printer_btn cmn_btns"
                                                    style="border:1px solid <?php echo $bg; ?>;color:<?php echo $bg; ?>"
                                                    onclick="show_live_chat_div()">No</button>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- <div class="mt-4">
                                        <p id="solution_output"><?php echo $sol; ?></p>
                                    </div> -->
                                    <span class="dis_text"
                                        style="font-size:13px;color:<?php echo $bg; ?>;font-weight:bold;">
                                        Virtual Assistant: <?php echo $time; ?>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <!-- //feedback div if yes -->
                    <ul>
                        <li>
                            <div class="main_message_bot" id="thanks_div" style="display: none;">
                                <!-- <div class="img_messsage_bot"><i class="fa fa-desktop" aria-hidden="true"
                                        style="color:<?php echo $bg; ?>"></i></div> -->
                                <div class="content_chat p-4" style="background:#E8E8E8;width:700px;">
                                    <div>
                                        <p>Thank you. I would appreciate your feedback.</p>

                                        <form id="feedbackForm" autocomplete="off">
                                            <input type="text" name="name" id="name" placeholder="Your Name" class="form-control w-50 mb-1" required>
                                            <input type="email" name="email" id="email" placeholder="Your Email" class="form-control w-50 mb-1" required>
                                            <div style="display: flex;gap: 7px;">
                                                <select name="code" id="code" class="form-control mb-1" style="width: 13%;">
                                                    @foreach ($code as $phone_code)
                                                        <option value="{{ $phone_code->code }}">
                                                            {{ $phone_code->country . ' ' . $phone_code->code }}</option>
                                                    @endforeach
                                                </select>
                                                <input style="width:36%;" type="text" pattern="\d{10}" maxlength="10" name="phone" id="phone" placeholder="Your Phone Number" class="form-control mb-1" required>
                                            </div>
                                            
                                            <textarea class="form-control w-50" name="feedback" id="feedback" placeholder="Enter your feedback" required></textarea>
                                            <button class="form-control mt-3 text-box w-25 btn-primary" type="submit">Submit</button>
                                        </form>

                                    </div>
                                    <p>
                                        <span class="dis_text"
                                            style="font-size:13px;color:<?php echo $bg; ?>;font-weight:bold;">
                                            Virtual Assistant: <?php echo $time; ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <!-- //gratitude div if yes -->

                    <ul>
                        <li>
                            <div class="main_message_bot" id="gratitude_div" style="display: none;">
                                <!-- <div class="img_messsage_bot"><i class="fa fa-desktop" aria-hidden="true"
                                        style="color:<?php echo $bg; ?>"></i></div> -->
                                <div class="content_chat p-4" style="background:#E8E8E8;width:700px;">
                                    <div>
                                        <p>Thanks for your feedback.</p>
                                    </div>
                                    <p>
                                        <span class="dis_text"
                                            style="font-size:13px;color:<?php echo $bg; ?>;font-weight:bold;">
                                            Virtual Assistant: <?php echo $time; ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- //live chat div if no -->

                    <ul>
                        <li>
                            <div class="main_message_bot" id="live_chat_div" style="display:none">
                                <!-- <div class="img_messsage_bot"><i class="fa fa-desktop" aria-hidden="true"
                                        style="color:<?php echo $bg; ?>"></i></div> -->

                                <div class="content_chat p-4" style="background:#E8E8E8;width:700px;">
                                    <div>
                                        <button class="form-control mt-3 text-box w-25 btn-primary p-1"
                                        onclick="parent.LiveChatWidget.call('maximize')">Chat With Live Agent</button>
                                    </div>
                                    <p>
                                        <span class="dis_text"
                                            style="font-size:13px;color:<?php echo $bg; ?>;font-weight:bold;">
                                            Virtual Assistant: <?php echo $time; ?>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- <script src="//code.jivosite.com/widget/2ABZpvAVqe" async></script> -->
    <!--Start of Tawk.to Script-->
    <!-- <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/6703ebf1cec6d0125df2bdf5/1i9jl3alf';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script> -->
    <!--End of Tawk.to Script-->

    <!-- Start of LiveChat (www.livechat.com) code -->
<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 18071466;
    window.__lc.integration_name = "manual_channels";
    window.__lc.product_name = "livechat";
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<noscript><a href="https://www.livechat.com/chat-with/18071466/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
<!-- End of LiveChat code -->

    <script>
        document.getElementById('feedbackForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let phone = document.getElementById('phone').value;
    let feed = document.getElementById('feedback').value;
    let code = document.getElementById('code').value;
    let type = 'virtual_chat';
    $.ajax({
        type: 'POST',
        url: '{{ route('contact-add') }}',
        data: {
            full_name: name,
            email: email,
            contact: phone,
            message: feed,
            type:type,
            code:code,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            console.log("Response: ", response);
            showTypingEffect("#gratitude_div", 2000, () => {
                $("#gratitude_div").show();
                window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
                setTimeout(() => {
                    window.location.href = '{{ route("home") }}';
                }, 4000);
            });
        }
    });
});
        $(document).ready(function () {
            let actionValue = "<?php echo isset($_GET['action']) ? 'download_driver' : ''; ?>";

            if (actionValue !== '') {
                $(".show_intro, .show_issues").hide();
                showTypingEffect(".show_intro", 2000, () => {
                    showTypingEffect(".show_issues", 4000);
                });

                setTimeout(() => { $(".btn_issue").trigger("click"); }, 8000);
            }

            $(".btn_issue").click(function () {
                show_valuable();
                show_solution_div();
                show_user_reply();

                let issue = actionValue !== '' ? actionValue : $(this).attr("data-value");

                let formattedIssue = issue.replace(/_/g, " ").replace(/\b\w/g, (char) => char.toUpperCase());
                $("#user_reply").html("<b>" + formattedIssue + "</b>");

                showTypingEffect("#solution_output p:eq(1)", 3000, () => {
                    // $.post(window.location.href, { issue: issue }, function (response) {
                    //     $("#solution_output p").eq(1).html(response);
                    // }).fail(function () {
                    //     $("#solution_output p").eq(1).html("Error retrieving solution.");
                    // });
                });
            });

            //new_one
            $(".random").click(function () {
                let issue = $(this).attr('data-value');
                $.ajax({
                    type: 'POST',
                    url: '{{ route('get_solution') }}',
                    data: {
                        issue: issue,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        $('#solution_outputs').html(response.solution);
                    },
                    error: function () {
                        $('#solution_outputs').html('<span class="text-danger">Something went wrong!</span>');
                    }
                });
            });

            $(".show_intro, .show_issues").hide();
            showTypingEffect(".show_intro", 2000, () => {
                showTypingEffect(".show_issues", 4000);
            });
        });

        // ✅ **Function to show "Typing..." ONLY ONCE before content appears**
        function showTypingEffect(element, delay, callback = null) {
            if ($(element).data("typing-shown")) return; // Already shown, don't show again

            let typingDiv = $("<div class='img_messsage_bot' style='color:<?php echo $bg; ?>;margin-left:-32px;'><i class='fa fa-desktop' aria-hidden='true'style='color:<?php echo $bg; ?>'></i>&nbsp;Typing...</div>");
            $(element).before(typingDiv);
            $(element).data("typing-shown", true); // Mark this element so it doesn't repeat

            setTimeout(() => {
                typingDiv.fadeOut(() => {
                    typingDiv.remove();
                    $(element).fadeIn();
                    if (callback) callback(); // Run next step if provided
                });
            }, delay);
        }

        function show_valuable() {
            showTypingEffect("#valuable", 2000, () => {
                $("#valuable").show();
                window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
            });
        }

        function show_solution_div() {
            showTypingEffect("#solution_div", 2000, () => {
                $("#solution_div").show();
                window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
            });
        }

        function show_user_reply() {
            showTypingEffect("#user_div", 2000, () => {
                $("#user_div").show();
                window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
            });
        }


        function show_valuable() {
            showTypingEffect("#valuable", 2000);
            setTimeout(() => {
                $("#valuable").show();
                window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
            }, 5000);
        }

        function show_solution_div() {
            showTypingEffect("#solution_div", 2000);
            setTimeout(() => {
                $("#solution_div").show();
                window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
            }, 5000);
        }

        function show_user_reply() {
            showTypingEffect("#user_div", 2000);
            setTimeout(() => {
                $("#user_div").show();
                window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
            }, 2000);
        }


        function show_thanks_div() {
            showTypingEffect("#thanks_div", 2000, () => {
                $("#thanks_div").show();
                window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
            });
        }

        function show_gratitude_div() {
            event.preventDefault();
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let phone = document.getElementById('phone').value;
    let feed = document.getElementById('feedback').value;

    $.ajax({
        type: 'POST',
        url: '{{ url()->current() }}', // Same blade file
        data: {
            name: name,
            email: email,
            phone: phone,
            feedback: feed,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            console.log("Response: ", response);
            showTypingEffect("#gratitude_div", 2000, () => {
                $("#gratitude_div").show();
                window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
                setTimeout(() => {
                    window.location.href = '{{ route("home") }}';
                }, 4000);
            });
        }
    });
}


        function show_live_chat_div() {
            showTypingEffect("#live_chat_div", 2000, () => {
                $("#live_chat_div").show();
                window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
            });
        }
    </script>

</body>

</html>