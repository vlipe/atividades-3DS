<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Não Encontrada</title>
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
<body class="bg-gray-900 text-gray-100 min-h-screen flex flex-col justify-center items-center p-6">
    <div class="text-center">
        <span class="text-7xl font-extrabold text-emerald-500 block mb-4">404</span>
        <h1 class="text-3xl mb-2">Página Desconectada da Rede</h1>
        <p class="text-gray-400 max-w-md mx-auto mb-8">A URL que você tentou acessar não existe ou foi removida.</p>
        <a href="{{ route('home') }}" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-3xl transition">
            Voltar ao Início
        </a>
    </div>
</body>
</html>
