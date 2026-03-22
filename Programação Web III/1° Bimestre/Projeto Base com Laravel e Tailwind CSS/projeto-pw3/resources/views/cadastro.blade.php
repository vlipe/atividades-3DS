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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fdfaf7;
        }
    </style>
</head>

<body class="antialiased min-h-screen flex items-center justify-center p-4 md:p-0">

    <div class="bg-white w-full max-w-5xl min-h-[700px] rounded-[40px] shadow-2xl shadow-stone-200/50 flex flex-col md:flex-row overflow-hidden border-4 border-white">

        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center relative">

            <div class="mb-2">
                <a href="/" class="inline-flex items-center group transition-all">
                    <div class="w-12 h-12 bg-[#efb5c3]/10 rounded-2xl flex items-center justify-center group-hover:bg-[#efb5c3]/20 transition-colors">
                        <img src="{{ asset('imagens/xicara.png') }}" alt="Logo" class="h-7 w-auto">
                    </div>
                </a>
            </div>

            <div class="mt-6">
                <h2 class="text-4xl font-extrabold text-stone-900 tracking-tight">Crie sua conta!</h2>
                <p class="text-stone-400 mt-2 text-sm">Junte-se à comunidade <span class="text-[#efb5c3] font-semibold">Coffee & Code</span>.</p>
            </div>

            <form action="#" class="mt-8 space-y-4">
                <div>
                    <label class="text-xs font-bold uppercase tracking-widest text-stone-400 ml-1">Nome Completo</label>
                    <input type="text" placeholder="Como quer ser chamado?"
                           class="w-full text-sm mt-1.5 px-6 py-4 rounded-2xl bg-stone-50 border border-stone-100 focus:border-[#efb5c3] focus:ring-4 focus:ring-[#efb5c3]/10 outline-none transition-all placeholder:text-stone-300">
                </div>

                <div>
                    <label class="text-xs font-bold uppercase tracking-widest text-stone-400 ml-1">E-mail</label>
                    <input type="email" placeholder="seu@email.com"
                           class="w-full text-sm mt-1.5 px-6 py-4 rounded-2xl bg-stone-50 border border-stone-100 focus:border-[#efb5c3] focus:ring-4 focus:ring-[#efb5c3]/10 outline-none transition-all placeholder:text-stone-300">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="relative">
                        <label class="text-xs font-bold uppercase tracking-widest text-stone-400 ml-1">Senha</label>
                        <input type="password" placeholder="Sua senha"
                               class="w-full text-sm mt-1.5 px-6 py-4 rounded-2xl bg-stone-50 border border-stone-100 focus:border-[#efb5c3] focus:ring-4 focus:ring-[#efb5c3]/10 outline-none transition-all placeholder:text-stone-300">
                    </div>
                    <div class="relative">
                        <label class="text-xs font-bold uppercase tracking-widest text-stone-400 ml-1">Confirmar</label>
                        <input type="password" placeholder="Repita a senha"
                               class="w-full text-sm mt-1.5 px-6 py-4 rounded-2xl bg-stone-50 border border-stone-100 focus:border-[#efb5c3] focus:ring-4 focus:ring-[#efb5c3]/10 outline-none transition-all placeholder:text-stone-300">
                    </div>
                </div>

                <div class="flex items-center gap-2 px-2 py-2">
                    <input type="checkbox" id="terms" class="accent-[#efb5c3] h-4 w-4">
                    <label for="terms" class="text-xs text-stone-400">Eu aceito os <a href="#" class="text-[#efb5c3]">Termos e Condições</a></label>
                </div>

                <button class="w-full bg-stone-900 text-white py-4 rounded-2xl hover:bg-[#efb5c3] hover:shadow-[#efb5c3]/40 transition-all duration-300 transform cursor-pointer mt-2">
                    Criar Conta
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-stone-400">
                Já possui uma conta? <a href="/login" class="text-[#efb5c3] hover:underline">Faça login</a>
            </p>
        </div>

        <div class="hidden md:flex w-1/2 bg-[#f4fbf9] p-12 items-center justify-center relative">
            <div class="text-center relative z-10">
                <div class="relative inline-block group">
                    <div class="absolute -inset-4 bg-[#efb5c3]/20 rounded-full blur-2xl group-hover:bg-[#efb5c3]/40 transition duration-1000"></div>
                    <img src="{{ asset('imagens/xicara.png') }}" alt="Ilustração" class="relative w-64 drop-shadow-2xl">
                </div>

                <h3 class="mt-12 text-2xl font-bold text-stone-800 leading-tight">Comece sua jornada <br> com a melhor experiência.</h3>
                <p class="mt-4 text-stone-400 text-sm max-w-[280px] mx-auto leading-relaxed">Prepare o café, abra o editor e deixe a criatividade fluir.</p>

                <div class="mt-10 flex justify-center gap-2">
                    <div class="h-1.5 w-1.5 bg-stone-200 rounded-full"></div>
                    <div class="h-1.5 w-6 bg-[#efb5c3] rounded-full"></div>
                    <div class="h-1.5 w-1.5 bg-stone-200 rounded-full"></div>
                </div>
            </div>

            <div class="absolute top-20 right-20 w-12 h-12 bg-white rounded-full flex items-center justify-center text-xl">✨</div>
            <div class="absolute bottom-20 left-20 w-16 h-16 bg-white rounded-full flex items-center justify-center text-2xl">☕</div>
        </div>
    </div>

</body>

</html>
