<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Voch Tech</title>
        <link rel="shortcut icon" href="https://vochtech.com.br/img/icon-voch.svg" type="image">
        @livewireStyles
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-amber-500">
            <!-- Page Heading -->
            @include('layouts.header')
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
           
        </div>
        <!-- Footer-->
        @livewireScripts
        <script src="https://kit.fontawesome.com/a56b987c24.js" crossorigin="anonymous"></script>
    </body>
</html>