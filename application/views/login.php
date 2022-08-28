<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap | Ödev Sistemi</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">


    <style>
        :root{
            --bs-success: #198754;
        }

        body{
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: 'Jost', sans-serif;
            background: rgb(29,36,0);
            /*background: linear-gradient(180deg, rgba(29,36,0,0.5951331216080182) 0%, rgba(9,121,25,1) 35%, rgba(0,255,84,1) 100%);*/
            background: radial-gradient(circle at 10% 20%, rgb(85, 149, 27) 0.1%, rgb(183, 219, 87) 90%);
        }

        .main{
            width: 350px;
            height: 500px;
            background: rgba(255,255,255,0.7);
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 5px 20px 50px #000;
            z-index: 555;
        }
        #chk{
            display: none;
        }
        .signup{
            position: relative;
            width:100%;
            height: 100%;
        }
        label{
            color: var(--bs-success);
            font-size: 2.3em;
            justify-content: center;
            display: flex;
            margin: 60px;
            font-weight: bold;
            cursor: pointer;
            transition: .5s ease-in-out;
        }
        input{
            width: 60%;
            height: 20px;
            background: #e0dede;
            justify-content: center;
            display: flex;
            margin: 20px auto;
            padding: 10px;
            border: none;
            outline: none;
            border-radius: 5px;
        }
        button{
            width: 60%;
            height: 40px;
            margin: 10px auto;
            justify-content: center;
            display: block;
            color: #fff;
            background: var(--bs-success);
            font-size: 1em;
            font-weight: bold;
            margin-top: 20px;
            outline: none;
            border: none;
            border-radius: 5px;
            transition: .2s ease-in;
            cursor: pointer;
        }
        button:hover{
            background: #157347;
        }
        .login{
            height: 460px;
            background: #eee;
            border-radius: 60% / 10%;
            transform: translateY(-180px);
            transition: .8s ease-in-out;
        }
        .login label{
            color: #000;
            transform: scale(.6);
        }

        #chk:checked ~ .login{
            transform: translateY(-500px);
        }
        #chk:checked ~ .login label{
            transform: scale(1);
        }
        #chk:checked ~ .signup label{
            transform: scale(.6);
        }


        /*lights*/

        body{
            -webkit-overflow-Y: hidden;
            -moz-overflow-Y: hidden;
            -o-overflow-Y: hidden;
            overflow-y: hidden;
            -webkit-animation: fadeIn 1 1s ease-out;
            -moz-animation: fadeIn 1 1s ease-out;
            -o-animation: fadeIn 1 1s ease-out;
            animation: fadeIn 1 1s ease-out;
        }

        .light {
            position: absolute;
            width: 0px;
            opacity: .75;
            background-color: white;
            box-shadow: #e9f1f1 0px 0px 20px 2px;
            opacity: 0;
            top: 100vh;
            bottom: 0px;
            left: 0px;
            right: 0px;
            margin: auto;
        }

        .x1{
            -webkit-animation: floatUp 4s infinite linear;
            -moz-animation: floatUp 4s infinite linear;
            -o-animation: floatUp 4s infinite linear;
            animation: floatUp 4s infinite linear;
            -webkit-transform: scale(1.0);
            -moz-transform: scale(1.0);
            -o-transform: scale(1.0);
            transform: scale(1.0);
        }

        .x2{
            -webkit-animation: floatUp 7s infinite linear;
            -moz-animation: floatUp 7s infinite linear;
            -o-animation: floatUp 7s infinite linear;
            animation: floatUp 7s infinite linear;
            -webkit-transform: scale(1.6);
            -moz-transform: scale(1.6);
            -o-transform: scale(1.6);
            transform: scale(1.6);
            left: 15%;
        }

        .x3{
            -webkit-animation: floatUp 2.5s infinite linear;
            -moz-animation: floatUp 2.5s infinite linear;
            -o-animation: floatUp 2.5s infinite linear;
            animation: floatUp 2.5s infinite linear;
            -webkit-transform: scale(.5);
            -moz-transform: scale(.5);
            -o-transform: scale(.5);
            transform: scale(.5);
            left: -15%;
        }

        .x4{
            -webkit-animation: floatUp 4.5s infinite linear;
            -moz-animation: floatUp 4.5s infinite linear;
            -o-animation: floatUp 4.5s infinite linear;
            animation: floatUp 4.5s infinite linear;
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
            left: -34%;
        }

        .x5{
            -webkit-animation: floatUp 8s infinite linear;
            -moz-animation: floatUp 8s infinite linear;
            -o-animation: floatUp 8s infinite linear;
            animation: floatUp 8s infinite linear;
            -webkit-transform: scale(2.2);
            -moz-transform: scale(2.2);
            -o-transform: scale(2.2);
            transform: scale(2.2);
            left: -57%;
        }

        .x6{
            -webkit-animation: floatUp 3s infinite linear;
            -moz-animation: floatUp 3s infinite linear;
            -o-animation: floatUp 3s infinite linear;
            animation: floatUp 3s infinite linear;
            -webkit-transform: scale(.8);
            -moz-transform: scale(.8);
            -o-transform: scale(.8);
            transform: scale(.8);
            left: -81%;
        }

        .x7{
            -webkit-animation: floatUp 5.3s infinite linear;
            -moz-animation: floatUp 5.3s infinite linear;
            -o-animation: floatUp 5.3s infinite linear;
            animation: floatUp 5.3s infinite linear;
            -webkit-transform: scale(3.2);
            -moz-transform: scale(3.2);
            -o-transform: scale(3.2);
            transform: scale(3.2);
            left: 37%;
        }

        .x8{
            -webkit-animation: floatUp 4.7s infinite linear;
            -moz-animation: floatUp 4.7s infinite linear;
            -o-animation: floatUp 4.7s infinite linear;
            animation: floatUp 4.7s infinite linear;
            -webkit-transform: scale(1.7);
            -moz-transform: scale(1.7);
            -o-transform: scale(1.7);
            transform: scale(1.7);
            left: 62%;
        }

        .x9{
            -webkit-animation: floatUp 4.1s infinite linear;
            -moz-animation: floatUp 4.1s infinite linear;
            -o-animation: floatUp 4.1s infinite linear;
            animation: floatUp 4.1s infinite linear;
            -webkit-transform: scale(0.9);
            -moz-transform: scale(0.9);
            -o-transform: scale(0.9);
            transform: scale(0.9);
            left: 85%;
        }


        @-webkit-keyframes floatUp{
            0%{top: 100vh; opacity: 0;}
            25%{opacity: 1;}
            50%{top: 0vh; opacity: .8;}
            75%{opacity: 1;}
            100%{top: -100vh; opacity: 0;}
        }
        @-moz-keyframes floatUp{
            0%{top: 100vh; opacity: 0;}
            25%{opacity: 1;}
            50%{top: 0vh; opacity: .8;}
            75%{opacity: 1;}
            100%{top: -100vh; opacity: 0;}
        }
        @-o-keyframes floatUp{
            0%{top: 100vh; opacity: 0;}
            25%{opacity: 1;}
            50%{top: 0vh; opacity: .8;}
            75%{opacity: 1;}
            100%{top: -100vh; opacity: 0;}
        }
        @keyframes floatUp{
            0%{top: 100vh; opacity: 0;}
            25%{opacity: 1;}
            50%{top: 0vh; opacity: .8;}
            75%{opacity: 1;}
            100%{top: -100vh; opacity: 0;}
        }

        @-webkit-keyframes fadeIn{
            from{opacity: 0;}
            to{opacity: 1;}
        }

        @-moz-keyframes fadeIn{
            from{opacity: 0;}
            to{opacity: 1;}
        }

        @-o-keyframes fadeIn{
            from{opacity: 0;}
            to{opacity: 1;}
        }

        @keyframes fadeIn{
            from{opacity: 0;}
            to{opacity: 1;}
        }

        @-webkit-keyframes fadeOut{
            0%{opacity: 0;}
            30%{opacity: 1;}
            80%{opacity: .9;}
            100%{opacity: 0;}
        }

        @-moz-keyframes fadeOut{
            0%{opacity: 0;}
            30%{opacity: 1;}
            80%{opacity: .9;}
            100%{opacity: 0;}
        }

        @-o-keyframes fadeOut{
            0%{opacity: 0;}
            30%{opacity: 1;}
            80%{opacity: .9;}
            100%{opacity: 0;}
        }

        @keyframes fadeOut{
            0%{opacity: 0;}
            30%{opacity: 1;}
            80%{opacity: .9;}
            100%{opacity: 0;}
        }

        @-webkit-keyframes finalFade{
            0%{opacity: 0;}
            30%{opacity: 1;}
            80%{opacity: .9;}
            100%{opacity: 1;}
        }

        @-moz-keyframes finalFade{
            0%{opacity: 0;}
            30%{opacity: 1;}
            80%{opacity: .9;}
            100%{opacity: 1;}
        }

        @-o-keyframes finalFade{
            0%{opacity: 0;}
            30%{opacity: 1;}
            80%{opacity: .9;}
            100%{opacity: 1;}
        }

        @keyframes finalFade{
            0%{opacity: 0;}
            30%{opacity: 1;}
            80%{opacity: .9;}
            100%{opacity: 1;}
        }

        /*books*/
        body{
            position: relative!important;
        }
        #main-books{
            position: absolute;
            width: 100%;
            height: 100%;
        }

        #books {
            width: 100vw;
            height: 100vh;
            min-height: 350px;
            margin: 0;
            position: relative;
            background-color: #111;
            background-image: linear-gradient(to top, #222 5%, #111 6%, #111 7%, transparent 7%), linear-gradient(to bottom, #111 30%, transparent 30%), linear-gradient(to right, #222, #2e2e2e 5%, transparent 5%), linear-gradient(to right, transparent 6%, #222 6%, #2e2e2e 9%, transparent 9%), linear-gradient(to right, transparent 27%, #222 27%, #2e2e2e 34%, transparent 34%), linear-gradient(to right, transparent 51%, #222 51%, #2e2e2e 57%, transparent 57%), linear-gradient(to bottom, #111 35%, transparent 35%), linear-gradient(to right, transparent 42%, #222 42%, #2e2e2e 44%, transparent 44%), linear-gradient(to right, transparent 45%, #222 45%, #2e2e2e 47%, transparent 47%), linear-gradient(to right, transparent 48%, #222 48%, #2e2e2e 50%, transparent 50%), linear-gradient(to right, transparent 87%, #222 87%, #2e2e2e 91%, transparent 91%), linear-gradient(to bottom, #111 37.5%, transparent 37.5%), linear-gradient(to right, transparent 14%, #222 14%, #2e2e2e 20%, transparent 20%), linear-gradient(to bottom, #111 40%, transparent 40%), linear-gradient(to right, transparent 10%, #222 10%, #2e2e2e 13%, transparent 13%), linear-gradient(to right, transparent 21%, #222 21%, #1a1a1a 25%, transparent 25%), linear-gradient(to right, transparent 58%, #222 58%, #2e2e2e 64%, transparent 64%), linear-gradient(to right, transparent 92%, #222 92%, #2e2e2e 95%, transparent 95%), linear-gradient(to bottom, #111 48%, transparent 48%), linear-gradient(to right, transparent 96%, #222 96%, #1a1a1a 99%, transparent 99%), linear-gradient(to bottom, transparent 68.5%, transparent 76%, #111 76%, #111 77.5%, transparent 77.5%, transparent 86%, #111 86%, #111 87.5%, transparent 87.5%), linear-gradient(to right, transparent 35%, #222 35%, #2e2e2e 41%, transparent 41%), linear-gradient(to bottom, #111 68%, transparent 68%), linear-gradient(to right, transparent 78%, #333 78%, #333 80%, transparent 80%, transparent 82%, #333 82%, #333 83%, transparent 83%), linear-gradient(to right, transparent 66%, #222 66%, #2e2e2e 85%, transparent 85%);
            background-size: 300px 150px;
            background-position: center bottom;
        }
        #books:before {
            content: '';
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            background-color: #111;
            background-image: linear-gradient(to top, #d2b48c 5%, #111 6%, #111 7%, transparent 7%), linear-gradient(to bottom, #111 30%, transparent 30%), linear-gradient(to right, #b22222, #871a1a 5%, transparent 5%), linear-gradient(to right, transparent 6%, #ff6347 6%, #ff3814 9%, transparent 9%), linear-gradient(to right, transparent 27%, #556b2f 27%, #39481f 34%, transparent 34%), linear-gradient(to right, transparent 51%, #fa8072 51%, #f85441 57%, transparent 57%), linear-gradient(to bottom, #111 35%, transparent 35%), linear-gradient(to right, transparent 42%, #008080 42%, #004d4d 44%, transparent 44%), linear-gradient(to right, transparent 45%, #008080 45%, #004d4d 47%, transparent 47%), linear-gradient(to right, transparent 48%, #008080 48%, #004d4d 50%, transparent 50%), linear-gradient(to right, transparent 87%, #789 87%, #4f5d6a 91%, transparent 91%), linear-gradient(to bottom, #111 37.5%, transparent 37.5%), linear-gradient(to right, transparent 14%, #bdb76b 14%, #989244 20%, transparent 20%), linear-gradient(to bottom, #111 40%, transparent 40%), linear-gradient(to right, transparent 10%, #808000 10%, #4d4d00 13%, transparent 13%), linear-gradient(to right, transparent 21%, #8b4513 21%, #5e2f0d 25%, transparent 25%), linear-gradient(to right, transparent 58%, #8b4513 58%, #5e2f0d 64%, transparent 64%), linear-gradient(to right, transparent 92%, #2f4f4f 92%, #1c2f2f 95%, transparent 95%), linear-gradient(to bottom, #111 48%, transparent 48%), linear-gradient(to right, transparent 96%, #2f4f4f 96%, #1c2f2f 99%, transparent 99%), linear-gradient(to bottom, transparent 68.5%, transparent 76%, #111 76%, #111 77.5%, transparent 77.5%, transparent 86%, #111 86%, #111 87.5%, transparent 87.5%), linear-gradient(to right, transparent 35%, #cd5c5c 35%, #bc3a3a 41%, transparent 41%), linear-gradient(to bottom, #111 68%, transparent 68%), linear-gradient(to right, transparent 78%, #bc8f8f 78%, #bc8f8f 80%, transparent 80%, transparent 82%, #bc8f8f 82%, #bc8f8f 83%, transparent 83%), linear-gradient(to right, transparent 66%, #a52a2a 66%, #7c2020 85%, transparent 85%);
            background-size: 300px 150px;
            background-position: center bottom;
            clip-path: circle(150px at center center);
            animation: flashlight 5000ms infinite;
        }
        #books:after {
            content: '';
            width: 25px;
            height: 10px;
            position: absolute;
            left: calc(50% + 59px);
            bottom: 100px;
            background-repeat: no-repeat;
            background-image: radial-gradient(circle, #fff 50%, transparent 50%), radial-gradient(circle, #fff 50%, transparent 50%);
            background-size: 10px 10px;
            background-position: left center, right center;
            animation: eyes 5000ms infinite;
        }
        @-moz-keyframes flashlight {
            0%, 9% {
                opacity: 0;
                clip-path: circle(150px at 45% 10%);
            }
            10%, 15%, 85% {
                opacity: 1;
            }
            50% {
                clip-path: circle(150px at 60% 20%);
            }
            54%, 100% {
                clip-path: circle(150px at 55% 92%);
            }
            88%, 100% {
                opacity: 0;
            }
        }
        @-webkit-keyframes flashlight {
            0%, 9% {
                opacity: 0;
                clip-path: circle(150px at 45% 10%);
            }
            10%, 15%, 85% {
                opacity: 1;
            }
            50% {
                clip-path: circle(150px at 60% 20%);
            }
            54%, 100% {
                clip-path: circle(150px at 55% 92%);
            }
            88%, 100% {
                opacity: 0;
            }
        }
        @-o-keyframes flashlight {
            0%, 9% {
                opacity: 0;
                clip-path: circle(150px at 45% 10%);
            }
            10%, 15%, 85% {
                opacity: 1;
            }
            50% {
                clip-path: circle(150px at 60% 20%);
            }
            54%, 100% {
                clip-path: circle(150px at 55% 92%);
            }
            88%, 100% {
                opacity: 0;
            }
        }
        @keyframes flashlight {
            0%, 9% {
                opacity: 0;
                clip-path: circle(150px at 45% 10%);
            }
            10%, 15%, 85% {
                opacity: 1;
            }
            50% {
                clip-path: circle(150px at 60% 20%);
            }
            54%, 100% {
                clip-path: circle(150px at 55% 92%);
            }
            88%, 100% {
                opacity: 0;
            }
        }
        @-moz-keyframes eyes {
            0%, 52% {
                opacity: 0;
            }
            53%, 87% {
                opacity: 1;
            }
            64% {
                transform: scaleY(1);
            }
            67% {
                transform: scaleY(0);
            }
            70% {
                transform: scaleY(1);
            }
            88%, 100% {
                opacity: 0;
            }
        }
        @-webkit-keyframes eyes {
            0%, 52% {
                opacity: 0;
            }
            53%, 87% {
                opacity: 1;
            }
            64% {
                transform: scaleY(1);
            }
            67% {
                transform: scaleY(0);
            }
            70% {
                transform: scaleY(1);
            }
            88%, 100% {
                opacity: 0;
            }
        }
        @-o-keyframes eyes {
            0%, 52% {
                opacity: 0;
            }
            53%, 87% {
                opacity: 1;
            }
            64% {
                transform: scaleY(1);
            }
            67% {
                transform: scaleY(0);
            }
            70% {
                transform: scaleY(1);
            }
            88%, 100% {
                opacity: 0;
            }
        }
        @keyframes eyes {
            0%, 52% {
                opacity: 0;
            }
            53%, 87% {
                opacity: 1;
            }
            64% {
                transform: scaleY(1);
            }
            67% {
                transform: scaleY(0);
            }
            70% {
                transform: scaleY(1);
            }
            88%, 100% {
                opacity: 0;
            }
        }

    </style>

</head>
<body>

<div id="main-books">
    <div id="books" style=""></div>
</div>

<div class="main">
    <input type="checkbox" id="chk" aria-hidden="true" checked>

    <div class="signup">
        <form method="post" action="<?=base_url('Login/Signup')?>">
            <label for="chk" aria-hidden="true">Kayıt Ol</label>
            <input type="text" name="txt" placeholder="Kullanıcı Adı" required="">
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="pass" placeholder="Şifre" required="">
            <button>Kayıt Ol</button>
        </form>
    </div>

    <div class="login">
        <form method="post" action="<?=base_url('Login/Signin')?>">
            <label for="chk" aria-hidden="true">Giriş Yap</label>
            <input type="text" name="email" placeholder="Email" required="">
            <input type="password" name="pass" placeholder="Şifre" required="">
            <button>Giriş</button>
            <?php if($error !== 0){ ?>
                <div style="display: flex; justify-content: center; margin-top: 1rem; color: red; font-weight: bolder">
                    <?= match ($error){
                        "1" => "Kullanıcı adı veya şifrenizi boş bırakamazsınız",
                        "2" => "Kullanıcı Adı veya Şifreniz Yanlış",
                    }?>
                </div>
            <?php } ?>
        </form>
    </div>
</div>



<div class='light x1'></div>
<div class='light x2'></div>
<div class='light x3'></div>
<div class='light x4'></div>
<div class='light x5'></div>
<div class='light x6'></div>
<div class='light x7'></div>
<div class='light x8'></div>
<div class='light x9'></div>
</body>
</html>