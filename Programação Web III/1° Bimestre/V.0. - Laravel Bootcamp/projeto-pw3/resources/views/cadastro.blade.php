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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0f172a;
        }
    </style>
</head>

<body class="antialiased min-h-screen flex items-center justify-center p-4 md:p-0">

    <div class="bg-slate-900 w-full max-w-5xl min-h-[700px] rounded-[40px] shadow-2xl shadow-blue-900/20 flex flex-col md:flex-row overflow-hidden border border-slate-800">

        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center relative">

            <div class="mb-2">
                <a href="/" class="inline-flex items-center group transition-all">
                    <div class=" flex items-center justify-center">
                        <img src="{{ asset('imagens/logo.png') }}" alt="Logo V.0" class="h-10 w-auto">
                    </div>
                </a>
            </div>

            <div class="mt-6">
                <h2 class="text-4xl font-bold text-white tracking-tight">Crie sua conta!</h2>
                <p class="text-slate-400 mt-2 text-sm">Inicie seu registro no <span class="text-blue-500 font-semibold">V.0</span>.</p>
            </div>

            <form action="{{ route('cadastro') }}" method="POST" class="mt-8 space-y-4">
                @csrf
                <div>
                    <label class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Nome Completo</label>
                    <input type="text" name="name" placeholder="Insira seu nome?"
                           class="w-full text-sm mt-1.5 px-6 py-4 rounded-2xl bg-slate-800 border border-slate-700 text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all placeholder:text-slate-600">
                </div>

                <div>
                    <label class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">E-mail</label>
                    <input type="email" name="email" placeholder="seu@email.com"
                           class="w-full text-sm mt-1.5 px-6 py-4 rounded-2xl bg-slate-800 border border-slate-700 text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all placeholder:text-slate-600">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="relative">
                        <label class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Senha</label>
                        <input type="password" name="password" placeholder="Sua senha"
                               class="w-full text-sm mt-1.5 px-6 py-4 rounded-2xl bg-slate-800 border border-slate-700 text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all placeholder:text-slate-600">
                    </div>
                    <div class="relative">
                        <label class="text-xs font-bold uppercase tracking-widest text-slate-500 ml-1">Confirmar</label>
                        <input type="password" name="password_confirmation" placeholder="Repita a senha"
                               class="w-full text-sm mt-1.5 px-6 py-4 rounded-2xl bg-slate-800 border border-slate-700 text-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all placeholder:text-slate-600">
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-4 rounded-2xl hover:bg-blue-700 transition-all duration-300 transform active:scale-[0.98] cursor-pointer mt-2">
                    Criar Conta
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-slate-500">
                Já possui uma conta? <a href="/login" class="text-blue-500 hover:underline">Faça login</a>
            </p>
        </div>

        <div class="hidden md:flex w-1/2 bg-slate-800/50 p-12 items-center justify-center relative overflow-hidden">
            <div class="absolute top-0 left-0 w-64 h-64 bg-blue-600/10 rounded-full blur-3xl"></div>

            <div class="text-center relative z-10">
                <div class="relative inline-block group">
                    <div class="absolute -inset-4 bg-blue-500/20 rounded-full blur-2xl group-hover:bg-blue-500/40 transition duration-1000"></div>
                    <div class="relative bg-slate-900 border border-slate-700 p-8 rounded-[40px] shadow-2xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-32 h-32 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </div>

                <h3 class="mt-12 text-2xl text-white leading-tight">Potencialize seus <br> projetos hoje mesmo.</h3>
                <p class="mt-4 text-slate-400 text-sm max-w-[280px] mx-auto leading-relaxed">Organize suas ideias, documente seus protótipos e compartilhe seu progresso.</p>

                <div class="mt-10 flex justify-center gap-2">
                    <div class="h-1.5 w-1.5 bg-slate-700 rounded-full"></div>
                    <div class="h-1.5 w-6 bg-blue-600 rounded-full"></div>
                    <div class="h-1.5 w-1.5 bg-slate-700 rounded-full"></div>
                </div>
            </div>

            <div class="absolute top-20 left-20 w-12 h-12 bg-slate-800 border border-slate-700 rounded-full flex items-center justify-center text-xl shadow-lg">🛠️</div>
            <div class="absolute bottom-20 right-20 w-16 h-16 bg-slate-800 border border-slate-700 rounded-full flex items-center justify-center text-2xl shadow-lg">🚀</div>
        </div>
    </div>

</body>

</html>
