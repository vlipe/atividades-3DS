<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V.0</title>
    <link rel="icon" type="image/png" href="{{ asset('imagens/logo.png') }}">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Russo+One&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: radial-gradient(circle at center, #1e293b 0%, #0f172a 100%);
            background-attachment: fixed;
        }
    </style>
</head>

<body class="antialiased text-slate-200">

    <div class="relative min-w-full min-h-screen overflow-hidden">

        <nav class="w-full bg-slate-900/80 backdrop-blur-md md:hidden h-20 flex justify-between items-center px-6 border-b border-slate-800 sticky top-0 z-50">
            <button id="mobile-menu-button" class="p-2 text-blue-400">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="font-black italic text-xl tracking-tighter uppercase text-white">V.0</div>
            <div class="w-8"></div>
        </nav>

        <header class="hidden md:grid grid-cols-3 w-full h-24 max-w-[90%] 2xl:max-w-[85%] mx-auto mt-10 items-center backdrop-blur-xl rounded-[55px] py-4 px-10 border border-slate-700/50 bg-slate-900/40">

            <div class="flex items-center justify-start">
                <img src="{{ asset('imagens/logo.png') }}" alt="Logo V.0" class="h-10 w-auto">
            </div>

            <div class="flex justify-center">
                <div class="bg-slate-800/50 backdrop-blur-sm flex rounded-full w-full max-w-md h-16 items-center p-1 overflow-hidden border border-slate-700/50">
                    <div class="w-36 h-full rounded-full flex justify-center items-center bg-blue-600 text-white text-sm tracking-widest cursor-pointer transition-all shadow-lg shadow-blue-900/20">
                        Início
                    </div>
                    <nav class="flex flex-1 justify-around px-4">
                        <a href="{{ route('projects.index') }}" class="text-slate-400 hover:text-blue-400 text-sm transition-all duration-300">Projetos</a>
                        <a href="https://github.com/seu-usuario" target="_blank" class="text-slate-400 hover:text-blue-400 text-sm transition-all duration-300">GitHub</a>
                    </nav>
                </div>
            </div>

            <div class="flex items-center justify-end gap-4">
                @guest
                    <a href="{{ route('cadastro') }}" class="text-slate-400 text-sm hover:text-blue-400 transition-all px-2">
                        Cadastre-se
                    </a>
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white w-32 h-12 flex justify-center items-center rounded-[30px] border-2 border-blue-600 hover:bg-transparent hover:text-blue-400 transition-all text-sm font-semibold">
                        Login
                    </a>
                @endguest

                @auth
                    <a href="/configuracoes" class="group relative">
                        <div class="w-10 h-10 rounded-full border-2 border-slate-700 overflow-hidden group-hover:border-blue-500 transition-all flex items-center justify-center bg-slate-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-slate-400 group-hover:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                    </a>
                    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="bg-slate-800 text-red-400 w-24 h-10 flex justify-center items-center rounded-full border border-slate-700 hover:border-red-500 hover:bg-red-500 hover:text-white transition-all text-sm cursor-pointer">
                        Sair
                    </button>
                @endauth
            </div>
        </header>

        <main class="flex flex-col items-center justify-center mt-24 px-6 text-center max-w-4xl mx-auto">
            <h1 class="text-5xl md:text-7xl text-blue-500 leading-tight font-bold tracking-tight">
                Comece a registrar <br>
                <span class="text-white">desde a Versão Zero.</span>
            </h1>
            <p class="mt-12 text-slate-400 font-medium max-w-2xl leading-relaxed text-base md:text-lg">
                Bem-vindo ao seu diário de bordo técnico. Aqui você pode documentar o progresso de seus projetos de hardware e aplicações full-stack.
                <button class="mt-10 mb-10 bg-blue-600 border-2 border-blue-600 text-white px-6 py-2 text-sm rounded-full hover:bg-transparent hover:border-blue-600 cursor-pointer transition-colors block mx-auto">
                    <a href="./projects/">Registrar Progesso</a>
                </button>
                <span class="block mt-4 text-white font-light text-sm">
                    Acesse a plataforma GitHub para visualizar a documentação completa dos repositórios e status de deploy.
                </span>
            </p>
        </main>

    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
    </form>

</body>

</html>
