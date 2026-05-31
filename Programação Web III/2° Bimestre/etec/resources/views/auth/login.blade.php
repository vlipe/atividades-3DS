<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etec da Zona Leste</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        * { font-family: 'Poppins', sans-serif !important; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col justify-center items-center px-6 py-12">

    <div class="w-full max-w-md bg-white p-8 rounded-3xl shadow-xs border border-gray-100">

        <!-- Logotipo Centralizado -->
        <div class="flex justify-center mb-6">
            <a href="{{ route('home') }}">
                <img src="{{ asset('logo.png') }}" alt="Etec Zona Leste" class="h-14 w-auto object-contain">
            </a>
        </div>

        <h2 class="text-2xl font-bold text-gray-900 text-center mb-1">Área do Aluno</h2>
        <p class="text-sm text-gray-500 text-center mb-8">Insira suas credenciais para acessar o back-end de notas.</p>

        <!-- Erros de Validação Nativos do Laravel Breeze -->
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-[#B20000] p-4 rounded-2xl mb-5 text-xs font-medium space-y-1">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            <!-- REQUISITO OBRIGATÓRIO: PROTEÇÃO CSRF -->
            <!-- Comentário no Algoritmo: Garante a integridade da requisição POST via Token de Sessão -->
            @csrf

            <!-- Campo E-mail -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Institucional</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                       class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:border-[#B20000] focus:bg-white text-sm transition-all text-gray-800">
            </div>

            <!-- Campo Senha -->
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Senha</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:border-[#B20000] focus:bg-white text-sm transition-all text-gray-800">
            </div>

            <!-- Lembrar-me -->
            <div class="flex items-center text-sm">
                <label for="remember_me" class="inline-flex items-center select-none text-gray-600 cursor-pointer">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-[#B20000] focus:ring-[#B20000] h-4 w-4">
                    <span class="ms-2 text-xs">Lembrar neste dispositivo</span>
                </label>
            </div>

            <!-- Botão de Login -->
            <div class="pt-2">
                <button type="submit" class="w-full bg-[#B20000] hover:bg-red-800 text-white py-3.5 rounded-3xl transition duration-300 text-sm shadow-md shadow-red-700/10">
                    Entrar
                </button>
            </div>

            <!-- Alternar para Cadastro -->
            <div class="text-center pt-5 border-t border-gray-100">
                <p class="text-xs text-gray-500">
                    Não possui cadastro acadêmico?
                    <a href="{{ route('register') }}" class="text-[#B20000] font-semibold hover:underline">Cadastre-se aqui</a>
                </p>
            </div>
        </form>
    </div>

</body>
</html>
