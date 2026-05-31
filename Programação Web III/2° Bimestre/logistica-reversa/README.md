<div align="center">
  <img src="https://github.com/vlipe/atividades-3DS/blob/c67225d7f9af108113eb40395e1ffff592b88979/Programa%C3%A7%C3%A3o%20Web%20III/2%C2%B0%20Bimestre/logistica-reversa/public/logo.png" width="150px" alt="Logo GreenLoop">
</div>

## GreenLoop - Rede de Logística Reversa de Eletrônicos

> Este é um sistema desenvolvido em **Laravel** focado na sustentabilidade tecnológica, permitindo que usuários agendem o descarte inteligente de componentes eletrônicos em ecopontos parceiros.

<br>

![Laravel](https://img.shields.io/badge/Laravel-172133?style=for-the-badge&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-10B981?style=for-the-badge&logo=tailwind-css&logoColor=white)

#

### Requisitos Implementados

- **Rota Fallback:** Captura URLs inválidas e redireciona para uma página 404 personalizada integrada ao tema.
- **Migrations:** Modelagem e automatização da tabela `solicitacoes_descarte` no banco de dados.
- **Proteção CSRF:** Formulário protegido nativamente utilizando a diretiva `@csrf` contra ataques maliciosos.
- **Comnetários no Algoritmo:** Código documentado explicando os principais fluxos de inserção e validação.
- **Tema Individual:** Logística Reversa de Eletrônicos.

---

### Telas do Sistema (Views Publicadas)

### 1. Página Inicial (Home)

![Home](home.png)

### 2. Formulário de Agendamento de Descarte
*Interface onde o cidadão informa os dados do eletrônico. Possui validação e proteção CSRF ativa.*
![Formulário](form.png)

### 3. Confirmação e Listagem de Resíduos
*Exibe feedback de sucesso e lista em tempo real todos os descartes registrados no banco de dados através da migration.*
![Sucesso](sucesso.png)

### 4. Página de Erro 404 (Rota Fallback)
*Tela customizada exibida automaticamente caso o usuário tente acessar uma rota inexistente.*
![404](404.png)

---

### Como Executar o Projeto Localmente

1. Clone o repositório:
```bash
   git clone [https://github.com/vlipe/atividades-3DS/edit/main/Programação%20Web%20III/2°%20Bimestre/logistica-reversa](https://github.com/vlipe/atividades-3DS/edit/main/Programação%20Web%20III/2°%20Bimestre/logistica-reversa.git)
