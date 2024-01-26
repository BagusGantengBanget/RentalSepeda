<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome | Rental-Bagus </title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Chango&display=swap" rel="stylesheet"> 
        <!-- Styles -->
        <style>
            html, body {
                background: url("/images/back1.jpg");
                font-family: 'Archivo Black', sans-serif;
                font-weight: 200; 
                margin: 0;
                height: 100%;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items:center;
                display: flex;
                justify-content: right;
                margin-left:10%;
                margin-right:10%;
            }

            .position-ref {
                position: relative;
            }

           /*  .top-right {
                position: absolute;
                right: 22%;
                top: 500px;;
            }
            */
            .content {
                text-align: left;
                float:center;
                margin-left:55%; 
                /* margin-right:10%; */ 
                letter-spacing: .1rem;

            }

            .title {
                font-size: 40px;
            }

            .links > a {
                color: #ffffff;
                padding: 15px 60px;
                font-size: 14px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                border-radius: 10px 10px 10px 10px;
                background-color:rgba(12, 11, 11, 0.8);
            }

            .m-b-md {
            padding-top: 0px;
            color: #ffffff;
            }

            .p{
                font-size: 10px;
                color: black;
            }

            .container1{
                font-size: 20px;
                color: #ffffff;
                text-align: left;
                padding-top: 15px;
                position: flex;
                line-height:48px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center {{-- position-ref --}} full-height">
            
            <div class="content">

                <div class="title m-b-md">
                    Temukan Sepeda <br> Onthel Pilihanmu.
                </div>
                <div class="container">
                    <p>Kami Memiliki Beragam jenis Sepeda <br>Onthel yang bisa kamu gunakan.</p>
                </div>

                <div class="container1">
                    @if (Route::has('login'))
                    <div class="links">
                        @auth
                        <a href="{{ url('/home') }}">Home</a>
                        @else
                        <a href="{{ route('login') }}">Login</a>
                        
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                        @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
