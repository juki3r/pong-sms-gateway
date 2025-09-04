<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pong SMS Gateway</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    @vite('resources/css/app.css')
</head>
<style>
    body {
        background-color: #f2f2f2;
        height: 100vh;
        width: 100vw;
    }
    /* Custom Hamburger Button */
    .custom-toggler {
        border: none !important;
        outline: none !important;
        box-shadow: none !important;
        background: transparent;
        padding: 0.75rem;
        cursor: pointer;
    }

    .custom-toggler:focus {
        outline: none !important;
        box-shadow: none !important;
    }

    /* Hamburger container */
    .toggler-icon {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        width: 70px;   /* adjust size for balance */
        height: 45px;  /* smaller for proportional look */
        position: relative;
    }

    /* Hamburger lines */
    .toggler-icon span {
        height: 6px;
        width: 100%;
        background-color: #000;
        border-radius: 2px;
        transition: all 0.3s ease-in-out;
        position: relative;
    }

    /* Animate into X */
    .custom-toggler:not(.collapsed) .toggler-icon span:nth-child(1) {
        transform: rotate(45deg);
        position: absolute;
        top: 12px;  /* move to center */
        background-color: red;
    }

    .custom-toggler:not(.collapsed) .toggler-icon span:nth-child(2) {
        opacity: 0; /* vanish */
    }

    .custom-toggler:not(.collapsed) .toggler-icon span:nth-child(3) {
        transform: rotate(-45deg);
        position: absolute;
        top: 12px;  /* move to center */
        background-color: red;
    }

    #mobile_nav{
        font-size: 42px;
    }

    .header{
        font-size: 42px;
    }
    #credits_top{
        font-size: 22px;
    }

    @media screen and (min-width: 1040px) {
        .header {
            font-size: 22px;
        }
        #credits_top{
            font-size: 13px;
        }
    }

    .title_logo{
        font-size: 46px;
        font-weight: bold;
    }
</style>

<body>

    <div class="container-fluid-break w-100 h-100 d-flex flex-column">

       <div class="">
            @include('layouts.navigation')
       </div>

       <div class="main">
            <!-- Page Heading -->
            @isset($header)
                <header class="p-4">
                        {{ $header }}
                </header>
            @endisset

            {{ $slot }}
       </div>

       <div class="footer text-center m-auto mb-0">
        &copy PONG-MTA&trade; - 2025

       </div>



    </div>

  
</body>



