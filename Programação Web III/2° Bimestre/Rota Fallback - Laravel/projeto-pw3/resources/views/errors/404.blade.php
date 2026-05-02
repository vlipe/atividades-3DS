<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página não encontrada</title>
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
    <div class="relative min-w-full min-h-screen overflow-hidden flex flex-col items-center justify-center">

        <div class="absolute top-10 flex items-center justify-center w-full">
            <img src="{{ asset('imagens/logo.png') }}" alt="Logo V.0" class="h-12 w-auto opacity-50">
        </div>

        <main class="text-center px-6 max-w-4xl mx-auto">
            <h1 class="text-[120px] md:text-[180px] font-black text-blue-600/20 leading-none absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 select-none z-0">
                404
            </h1>

            <div class="relative z-10">
                <h2 class="text-4xl md:text-6xl text-white font-bold tracking-tight">
                    Caminho <span class="text-blue-500">não encontrado.</span>
                </h2>
                <p class="mt-8 text-slate-400 font-medium max-w-md mx-auto leading-relaxed text-base md:text-lg">
                    Parece que você tentou acessar uma versão que ainda não existe ou o endereço foi movido.
                </p>

                <div class="mt-12">
                    <a href="{{ url('/') }}" class="inline-block bg-blue-600 border-2 border-blue-600 text-white px-10 py-3 text-sm rounded-full hover:bg-transparent hover:text-blue-400 transition-all">
                        Voltar ao Início
                    </a>
                </div>
            </div>
        </main>

    </div>
</body>
</html>
