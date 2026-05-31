<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etec da Zona Leste</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        * { font-family: 'Poppins', sans-serif !important; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col justify-center items-center px-6 py-12">

    <div class="w-full max-w-md bg-white p-8 rounded-3xl shadow-xs border border-gray-100">

        <div class="flex justify-center mb-6">
            <a href="{{ route('home') }}">
                <img src="{{ asset('logo.png') }}" alt="Etec Zona Leste" class="h-14 w-auto object-contain">
            </a>
        </div>

        <h2 class="text-2xl font-bold text-gray-900 text-center mb-1">Cadastre-se</h2>
        <p class="text-sm text-gray-500 text-center mb-8">Crie sua conta institucional para acessar o painel técnico.</p>

        <!-- Erros de Validação Nativos do Laravel Breeze -->
        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-[#B20000] p-4 rounded-2xl mb-5 text-xs font-medium space-y-1">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            <!-- REQUISITO OBRIGATÓRIO: PROTEÇÃO CSRF -->
            <!-- Comentário no Algoritmo: Valida a sessão para o envio seguro de dados de registro -->
            @csrf

            <!-- Nome Completo -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nome Completo</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                       class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:border-[#B20000] focus:bg-white text-sm transition-all text-gray-800">
            </div>

            <!-- E-mail -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Institucional</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                       class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:border-[#B20000] focus:bg-white text-sm transition-all text-gray-800" placeholder="seuemail@etec.sp.gov.br">
            </div>

            <!-- Senha -->
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Definir Senha</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                       class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:border-[#B20000] focus:bg-white text-sm transition-all text-gray-800">
            </div>

            <!-- Confirmar Senha -->
            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-gray-700 mb-2">Confirmar Senha</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                       class="w-full bg-gray-50 border border-gray-200 rounded-2xl px-4 py-3 focus:outline-none focus:border-[#B20000] focus:bg-white text-sm transition-all text-gray-800">
            </div>

            <!-- Botão de Cadastro -->
            <div class="pt-2">
                <button type="submit" class="w-full bg-[#B20000] hover:bg-red-800 text-white py-3.5 rounded-3xl transition duration-300 text-sm cursor-pointer">
                    Cadastrar
                </button>
            </div>

            <!-- Alternar para Login -->
            <div class="text-center pt-5 border-t border-gray-100">
                <p class="text-xs text-gray-500">
                    Já possui uma conta ativa?
                    <a href="{{ route('login') }}" class="text-[#B20000] font-semibold hover:underline">Faça login aqui</a>
                </p>
            </div>
        </form>
    </div>

</body>
</html>
