<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--Socket.io scirpt-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <h1 class="modal-title">What's your nickname?</h1>
            <input id="nickname-input" class="custom-input" type="text" />
        </div>

    </div>

    <!--Big wrapper-->
    <div class="big-wrapper">
        <!--Chat Wrapper -->
        <div class="chat-wrapper">
            <div class="simple-chat-title-container">
                <header>
                    <h1>{{ env('APP_NAME') }}</h1>
                </header>
            </div>

            <!--Messages container-->
            <div id="chatroom">
                <div id="chatroom-history"></div>
                <!--x is typing goes here-->
                <div id="feedback"></div>
            </div>

            <!-- Input zone -->
            <div id="input_zone">
                <input id="message" class="vertical-align custom-input" type="text" />
                <label class="custom-file-upload">
                    <input id="message_img" type="file" accept=".jpg,.jpeg,.png" class="vertical-align input-file-hidden" />
                    <i class="fa fa-cloud-upload"></i>
                </label>
                <button id="send_message" class="vertical-align btn" type="button">Send</button>
            </div>

        </div>
        <!-- Online User Wrapper-->
        <div class="online-user-wrapper">
            <div class="online-user-header-container">
                <header>
                    <h2>Online Users</h2>
                </header>
            </div>
            <div>
                <!--Online users goes here-->
                <ul id="users-list">
                </ul>
            </div>
        </div>
    </div>
    <!--jQuery script-->
    <script src="https://code.jquery.com/jquery-latest.min.js"></script>
    <!--Scripts-->
    <script src="./js/chat.js"></script>
    <script src="./js/modalScript.js"></script>
</body>

</html>