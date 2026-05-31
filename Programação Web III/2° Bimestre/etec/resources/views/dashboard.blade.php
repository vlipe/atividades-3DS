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
<body class="bg-gray-50 text-gray-800 min-h-screen flex flex-col justify-between">

    <header class="p-8">
        <div class="container mx-auto flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('logo.png') }}" alt="Etec Zona Leste" class="h-14 w-auto object-contain">
            </a>

            <nav class="flex items-center space-x-1 font-medium text-sm">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-[#B20000] px-10 py-2.5 transition">Início</a>
                <a href="{{ route('cursos') }}" class="text-gray-600 hover:text-[#B20000] px-10 py-2.5 transition">Cursos</a>
                <a href="{{ route('eventos') }}" class="text-gray-600 hover:text-[#B20000] px-10 py-2.5 transition">Eventos</a>
                <a href="{{ route('contato.form') }}" class="text-gray-600 hover:text-[#B20000] px-10 py-2.5 transition">Contato</a>
            </nav>

            <div class="flex items-center gap-4">
                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="text-xs font-semibold text-gray-400 hover:text-[#B20000] transition mr-2">
                        Sair do Sistema
                    </a>
                </form>

                <a href="{{ route('dashboard') }}" class="bg-[#B20000] border-2 border-[#B20000] text-white px-7 py-2.5 rounded-full text-sm font-semibold transition-all">
                    Área do Aluno
                </a>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12 flex-grow max-w-5xl">

        <div class="bg-white rounded-3xl p-8 shadow-xs border border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
            <div>
                <span class="text-red-700 text-xs font-bold tracking-wide uppercase">Ambiente Acadêmico Protegido</span>
                <h3 class="text-2xl font-extrabold text-gray-900 mt-1">Olá, {{ Auth::user()->name }}!</h3>
                <p class="text-gray-500 text-sm mt-1">Bem-vindo à sua área restrita de consulta de menções acadêmicas.</p>
            </div>
            <span class="bg-red-50 text-[#B20000] text-xs font-bold px-5 py-2.5 rounded-full border border-red-100">
                RM: {{ str_pad(Auth::user()->id, 5, '0', STR_PAD_LEFT) }}
            </span>
        </div>

        <div class="bg-white rounded-3xl shadow-xs border border-gray-100 overflow-hidden mb-12">
            <div class="p-6 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                <h4 class="font-bold text-gray-700">Rendimento por Componente Curricular</h4>
                <span class="text-xs font-medium text-gray-400">Ano Letivo: 2026</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-gray-100 text-xs font-bold uppercase tracking-wider text-gray-400 bg-gray-50/30">
                            <th class="py-4 px-6">Componente Curricular</th>
                            <th class="py-4 px-6 text-center">Avaliação P1</th>
                            <th class="py-4 px-6 text-center">Avaliação P2</th>
                            <th class="py-4 px-6 text-center">Média Final</th>
                            <th class="py-4 px-6 text-center">Situação</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm text-gray-600">
                        @forelse($notas as $nota)
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-4 px-6 font-semibold text-gray-900">{{ $nota->componente_curricular }}</td>
                                <td class="py-4 px-6 text-center">{{ number_format($nota->nota_p1, 1) }}</td>
                                <td class="py-4 px-6 text-center">{{ number_format($nota->nota_p2, 1) }}</td>
                                <td class="py-4 px-6 text-center font-bold text-gray-900">{{ number_format($nota->media, 1) }}</td>
                                <td class="py-4 px-6 text-center">
                                    @if($nota->media >= 6.0)
                                        <span class="bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-100">Aprovado</span>
                                    @else
                                        <span class="bg-red-50 text-[#B20000] px-3 py-1 rounded-full text-xs font-bold border border-red-100">Retido</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-4 px-6 font-semibold text-gray-900">Desenvolvimento de Sistemas Embutidos</td>
                                <td class="py-4 px-6 text-center">9.0</td>
                                <td class="py-4 px-6 text-center">8.5</td>
                                <td class="py-4 px-6 text-center font-bold text-gray-900">8.8</td>
                                <td class="py-4 px-6 text-center">
                                    <span class="bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-100">Aprovado</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-4 px-6 font-semibold text-gray-900">Programação Web III</td>
                                <td class="py-4 px-6 text-center">10.0</td>
                                <td class="py-4 px-6 text-center">9.5</td>
                                <td class="py-4 px-6 text-center font-bold text-gray-900">9.8</td>
                                <td class="py-4 px-6 text-center">
                                    <span class="bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-100">Aprovado</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50/50 transition-colors">
                                <td class="py-4 px-6 font-semibold text-gray-900">Banco de Dados Avançado</td>
                                <td class="py-4 px-6 text-center">5.0</td>
                                <td class="py-4 px-6 text-center">6.0</td>
                                <td class="py-4 px-6 text-center font-bold text-gray-900">5.5</td>
                                <td class="py-4 px-6 text-center">
                                    <span class="bg-red-50 text-[#B20000] px-3 py-1 rounded-full text-xs font-bold border border-red-100">Retido</span>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <footer class="mt-auto">
        <div class="container mx-auto px-8 py-10 max-w-5xl flex flex-col md:flex-row justify-between items-start gap-8 text-sm text-gray-600">

            <div class="space-y-2">
                <h4 class="font-bold text-gray-900 text-base">Etec da Zona Leste</h4>
                <p>Avenida Águia de Haia, 2.633 - Cidade AE Carvalho - São Paulo/SP - CEP: 03694-000</p>
                <p><span class="font-medium text-gray-900">Telefone:</span> (11) 2045-4000 / 2045-4016</p>
                <p><span class="font-medium text-gray-900">Horário de funcionamento:</span> Seg. a Sex. das 09h às 21h</p>
            </div>

            <div class="flex flex-col gap-3 md:items-end">
                <div class="flex items-center gap-4">
                    <a href="#" class="text-[#B20000] hover:text-[#B20000] transition" aria-label="Facebook">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                    </a>
                    <a href="#" class="text-[#B20000] hover:text-[#B20000] transition" aria-label="Instagram">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0 3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <a href="#" class="text-[#B20000] hover:text-[#B20000] transition" aria-label="Whatsapp">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.717-1.454L0 24zm6.59-3.536c1.659.985 3.415 1.503 5.41 1.505 5.54.004 10.05-4.501 10.054-10.044.002-2.684-1.038-5.207-2.93-7.098-1.892-1.891-4.41-2.929-7.098-2.931-5.542 0-10.052 4.506-10.056 10.05a10.03 10.03 0 001.554 5.307l-.983 3.591 3.674-.963zm10.42-7.144c-.287-.143-1.696-.838-1.959-.933-.262-.096-.454-.143-.646.143-.192.287-.743.933-.91 1.124-.167.192-.335.215-.622.072-2.96-1.478-4.14-2.124-5.783-4.945-.262-.451.262-.419.75-.143.192.108.43.215.574.43.143.215.072.406-.036.598-.108.192-.646.74-.79 1.124-.143.383-.047.67.048.861.096.191.765 1.243 1.91 2.262 1.472 1.312 2.716 1.716 3.1 1.91.383.191.622.167.861-.071.239-.239.933-1.077 1.172-1.434.239-.358.478-.287.765-.143.287.143 1.817.861 2.128.981.311.12.514.179.586.299.072.119.072.693-.216.981-.287.287-1.41 1.41-1.96 1.41z"/></svg>
                    </a>
                    <a href="#" class="text-[#B20000] hover:text-[#B20000] transition" aria-label="Youtube">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93-.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                </div>
                <p class="text-xs text-gray-400 mt-2">&copy; 2026 ETEC Zona Leste - Centro Paula Souza.</p>
            </div>

        </div>
    </footer>
</body>
</html>
