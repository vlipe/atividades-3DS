<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso Restrito</title>
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Geist:wght@300;400;500;600&display=swap');

        @font-face {
            font-family: 'Coolvetica';
            src: url('/fontes/Coolvetica-Light.otf') format('opentype');
            font-weight: normal;
            font-style: normal;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {  
            font-family: 'Geist', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .site-header {
            position: absolute;
            top: 30px;
            left: 40px;
            display: flex;
            align-items: center;
        }

        .site-logo {
            height: 60px;
            width: auto;
            object-fit: contain;
        }

        .card-container {
            position: relative;
            background: #ffffff;
            border-radius: 24px;
            padding: 20px 35px 35px 35px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
            text-align: left;
        }

        .badge-bolinha {
            position: absolute;
            top: -20px;
            left: -20px;
            width: 46px;
            height: 46px;
            background: #022c89;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .badge-bolinha svg {
            width: 30px;
            height: 30px;
            fill: #ffffff;
        }

        .card-title {
            font-family: 'Coolvetica', sans-serif;
            font-size: 1.8rem;
            color: #022c89;
            margin-top: 5px;
            margin-bottom: 12px;
            letter-spacing: 0.5px;
        }

        .card-text {
            font-size: 1rem;
            color: #475569;
            line-height: 1.5;
            margin-bottom: 6px;
        }

        .card-footer-text {
            font-size: 0.9rem;
            color: #64748b;
            margin-top: 12px;
            padding-top: 12px;
            border-top: 1px solid #f1f5f9;
        }

    </style>
</head>
<body>

    <header class="site-header">
        <img src="{{ asset('imagens/Logo.png') }}" alt="Logo" class="site-logo">
    </header>

    <div class="card-container">
        
        <div class="badge-bolinha">
            <svg viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
            </svg>
        </div>

        <h2 class="card-title">Bem vindo ao portal</h2>
        <p class="card-text">Seu acesso não foi autorizado.</p>
        <p class="card-footer-text">Entrar em contato com o administrador.</p>
    </div>

</body>
</html>