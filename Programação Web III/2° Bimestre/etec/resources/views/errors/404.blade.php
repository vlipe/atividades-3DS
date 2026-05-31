<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Não Encontrada - Etec Zona Leste</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        * { font-family: 'Poppins', sans-serif !important; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col justify-center items-center p-6">
    <div class="text-center max-w-md bg-white p-8 rounded-3xl shadow-xs border border-gray-100">
        <span class="text-6xl font-extrabold text-[#B20000] block mb-4">404</span>
        <h1 class="text-2xl font-bold text-gray-900 mb-2">Página Fora do Sistema</h1>
        <p class="text-gray-500 text-sm mb-6">O endereço digitado não corresponde a nenhuma seção da Etec Zona Leste.</p>
        <a href="{{ route('home') }}" class="inline-block bg-[#B20000] hover:bg-red-800 text-white font-semibold px-6 py-2.5 rounded-full text-sm transition duration-300">
            Voltar ao Início
        </a>
    </div>
</body>
</html>
