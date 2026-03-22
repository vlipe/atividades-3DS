<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee & Code</title>
    @vite('resources/css/app.css')
    <link rel="icon" type="image/png" href="{{ asset('imagens/xicara.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Russo+One&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fdfaf7;
        }
    </style>
</head>

<body class="antialiased">

    <div class="relative min-w-full min-h-screen overflow-hidden">

        <nav class="w-full bg-white/80 backdrop-blur-md md:hidden h-20 flex justify-between items-center px-6 border-b border-stone-100 sticky top-0 z-50">
            <button id="mobile-menu-button" class="p-2 text-stone-900">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="font-black italic text-xl tracking-tighter uppercase">Coffee & Code</div>
            <div class="w-8"></div>
        </nav>

        <header class="hidden md:flex w-full h-24 max-w-[90%] 2xl:max-w-[85%] mx-auto mt-10 justify-between items-center
                         backdrop-blur-xl rounded-[55px] py-4 px-8 border border-white/30">

            <div class="flex items-center w-9/12 gap-8">
    <div class="shrink-0 flex items-center justify-center p-1 rounded-xl bg-white/20 border border-white/20">
        <img src="{{ asset('imagens/xicara.png') }}" alt="Logo Coffee & Code" class="h-10 w-auto">
    </div>

                <div class="bg-white backdrop-blur-sm flex rounded-full w-full h-16 items-center p-1 overflow-hidden ">
                    <div class="w-36 h-full rounded-full flex justify-center items-center bg-[#efb5c3] text-white text-sm tracking-widest cursor-pointer transition-all">
                        Início
                    </div>

                    <nav class="flex flex-1 justify-around px-4">
                        <a href="#" class="text-[#efb5c3] hover:text-stone-900 text-sm transition-all duration-300">Menu</a>
                        <a href="#" class="text-[#efb5c3] hover:text-stone-900 text-sm transition-all duration-300">Grãos</a>
                        <a href="#" class="text-[#efb5c3] hover:text-stone-900 text-sm transition-all duration-300">Assinatura</a>
                        <a href="#" class="text-[#efb5c3] hover:text-stone-900 text-sm transition-all duration-300">Unidades</a>
                    </nav>
                </div>
            </div>

            <div class="flex items-center justify-end w-3/12 gap-4 ml-8">
                <a href="/cadastro" class="text-[#efb5c3] text-sm hover:text-[#e45c87] transition-all duration-500 px-2">
                    Cadastre-se
                </a>
                <a href="/login" class="bg-[#efb5c3] text-white w-32 h-12 flex justify-center items-center rounded-[30px] border-2 border-[#efb5c3]
                                      hover:bg-transparent hover:border-transparent hover:text-[#e45c87] transition-all duration-300 text-sm">
                    Login
                </a>
            </div>
        </header>

        <main class="flex flex-col items-center justify-center mt-24 px-6 text-center max-w-4xl mx-auto">

    <h1 class="font-coffee text-6xl md:text-7xl text-[#efb5c3] leading-none drop-shadow-[0_0_15px_rgba(239,181,195,0.2)]">
        Olá, seja bem-vindo ao <br>
        <span class="text-stone-900 ">Coffee & Code.</span>
    </h1>

    <div class="relative group mt-4 ml-14">
        <div class="absolute -inset-1"></div>
        <img src="{{ asset('imagens/xicara.png') }}"
             alt="Imagem de café e código"
             class="relative w-80 md:w-[18rem] object-cover">
    </div>

    <p class="mt-10 text-stone-500 font-medium max-w-md leading-relaxed text-sm md:text-base">
        Sinta o aroma do grão e o som do teclado mecânico.
        <span class="block mt-2 text-stone-400 italic">
            Cadastre-se ou faça login para utilizar todas as funções localizadas na barra acima.
        </span>
    </p>

    <div class="mt-8 flex gap-4">
        <div class="h-1 w-12 bg-stone-200 rounded-full"></div>
        <div class="h-1 w-4 bg-[#efb5c3] rounded-full"></div>
        <div class="h-1 w-1 bg-stone-200 rounded-full"></div>
    </div>
</main>

    </div>

</body>

</html>
