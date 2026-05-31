<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenLoop</title>

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
<body class="bg-gray-900 text-gray-100 min-h-screen py-12 px-6">
    <div class="container mx-auto max-w-3xl">
        <div class="bg-emerald-500/10 border border-emerald-500/30 p-6 rounded-2xl text-center mb-10">

            <h2 class="text-2xl text-emerald-400 mt-2">Descarte Registrado com Sucesso!</h2>
            <p class="text-gray-300 mt-1">Obrigado por contribuir com o meio ambiente.</p>
            <a href="{{ route('home') }}" class="inline-block mt-4 text-sm text-emerald-400 hover:text-emerald-300">Voltar para a Home</a>
        </div>

        <h3 class="text-xl mb-4 text-gray-300">Últimos descartes registrados na rede:</h3>
        <div class="space-y-4">
            @foreach($descartes as $item)
                <div class="bg-gray-800 p-5 rounded-xl border border-gray-700">
                    <div class="flex justify-between items-start">
                        <div>
                            <span class="text-xs bg-emerald-500/20 text-emerald-400 px-2 py-1 rounded">
                                {{ $item->tipo_eletronico }}
                            </span>
                            <h4 class="text-lg font-light mt-2 text-white">{{ $item->modelo ?? 'Modelo não especificado' }}</h4>
                            <p class="text-sm text-gray-400 mt-1"><span class="text-gray-500">Estado:</span> {{ $item->descricao_estado }}</p>
                        </div>
                        <div class="text-right text-xs text-gray-500">
                            <p class="font-medium text-emerald-400/80">{{ $item->ponto_coleta }}</p>
                            <p class="mt-1">Doador: {{ $item->nome_usuario }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
