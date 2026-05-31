<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenLoop</title>
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
<body class="bg-gray-900 text-gray-100 min-h-screen">
    <div class="container mx-auto max-w-xl py-12 px-6">
        <a href="{{ route('home') }}" class="text-emerald-400 hover:underline text-sm flex items-center mb-6">Voltar para a Home</a>

        <div class="bg-gray-800 p-8 rounded-2xl shadow-xl border border-gray-700">
            <h2 class="text-2xl mb-6 text-emerald-400 text-center">Formulário de Descarte</h2>

            <form action="{{ route('descarte.salvar') }}" method="POST" class="space-y-5">

                <!-- REQUISITO OBRIGATÓRIO: CSRF PROTECTION -->
    <!-- Comentário no Algoritmo: A diretiva @csrf gera um token criptografado único para esta sessão.
         O middleware do Laravel valida esse token no envio do POST para garantir que a requisição
         partiu genuinamente do nosso site, bloqueando ataques de falsificação (Cross-Site Request Forgery). -->
    @csrf
    
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Seu Nome Completo</label>
                    <input type="text" name="nome_usuario" required class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:border-emerald-500 text-white">
                </div>

                <div>
                    <label class="block text-sm text-gray-400 mb-1">Tipo de Eletrônico</label>
                    <select name="tipo_eletronico" required class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:border-emerald-500 text-white">
                        <option value="">Selecione uma opção</option>
                        <option value="Smartphone / Celular">Smartphone / Celular</option>
                        <option value="Notebook / Computador">Notebook / Computador</option>
                        <option value="Placa de Circuito / Hardware">Placa de Circuito / Hardware</option>
                        <option value="Bateria / Carregador">Bateria / Carregador</option>
                        <option value="Outros">Outros</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm text-gray-400 mb-1">Modelo/Marca (Opcional)</label>
                    <input type="text" name="modelo" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:border-emerald-500 text-white" placeholder="Ex: iPhone 11, Samsung Expert...">
                </div>

                <div>
                    <label class="block text-sm text-gray-400 mb-1">Estado de Conservação / Condições</label>
                    <textarea name="descricao_estado" rows="3" required class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:border-emerald-500 text-white" placeholder="Descreva brevemente o estado do item..."></textarea>
                </div>

                <div>
                    <label class="block text-sm text-gray-400 mb-1">Ponto de Coleta Desejado</label>
                    <select name="ponto_coleta" required class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-2 focus:outline-none focus:border-emerald-500 text-white">
                        <option value="Ecoponto Leste - Itaquera">Ecoponto Leste - Itaquera</option>
                        <option value="Ponto de Entrega ETEC Zona Leste">Ponto de Entrega ETEC Zona Leste</option>
                        <option value="Centro de Reciclagem Tech - Centro">Centro de Reciclagem Tech - Centro</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-emerald-500 hover:bg-emerald-600 text-white py-3 rounded-3xl transition mt-4 cursor-pointer">
                    Confirmar e Agendar Coleta
                </button>
            </form>
        </div>
    </div>
</body>
</html>
