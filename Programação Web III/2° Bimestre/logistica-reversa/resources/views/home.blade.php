<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logística Reversa de Eletrônicos</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        * {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-100 min-h-screen flex flex-col justify-between">
    <header class="p-6">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
            <img src="{{ asset('logo.png') }}" alt="GreenLoop Logo" class="h-18 w-auto object-contain transition-transform group-hover:scale-105">
            <nav class="space-x-4">
                <a href="{{ route('descarte.form') }}" class="bg-emerald-500 hover:bg-transparent hover:border-b2-emerald-500 text-gray-905 px-4 py-2 rounded-3xl transition duration-300 hover:text-emerald-500">Descartar Agora</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-6 py-16 text-center max-w-3xl">
        <h2 class="text-5xl font-extrabold mt-2 mb-6 leading-tight">Dê o destino certo ao seu <span class="text-emerald-400">lixo eletrônico</span>.</h2>
        <p class="text-gray-400 text-lg mb-8">Nossa plataforma conecta você a pontos de coleta autorizados para reciclagem e descarte seguro de componentes eletrônicos, evitando a contaminação do meio ambiente.</p>
        <a href="{{ route('descarte.form') }}" class="inline-block bg-emerald-500 hover:bg-emerald-600 text-white text-lg px-8 py-4 rounded-4xl">
            Iniciar Agendamento de Descarte
        </a>
    </main>

    <footer class="p-6 text-center text-gray-600 text-sm">
        &copy; 2026 GreenLoop - ETEC Zona Leste. Todos os direitos reservados.
    </footer>
</body>
</html>
