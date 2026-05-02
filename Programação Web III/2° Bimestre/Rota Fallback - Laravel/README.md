<div align="center">
  <img src="https://github.com/vlipe/atividades-3DS/blob/d4c8a57e0b6dbddf02cc2a8d72f1b08df8ce47a4/Programa%C3%A7%C3%A3o%20Web%20III/1%C2%B0%20Bimestre/V.0.%20-%20Laravel%20Bootcamp/projeto-pw3/public/imagens/logo.png" width="150px" alt="Logo V.0">
</div>

# V.0 | Dashboard de Gerenciamento de Projetos e Logs

> O **V.0** é um sistema web desenvolvido para centralizar o registro de progresso em projetos de hardware (IoT) e software. Criado com foco na agilidade do desenvolvedor, ele permite documentar cada etapa da montagem e programação em tempo real.

<br>

![Laravel](https://img.shields.io/badge/Laravel-172133?style=for-the-badge&logo=laravel&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-155dfc?style=for-the-badge&logo=tailwind-css&logoColor=white)

#

### Funcionalidades Principais

- **Dashboard Dinâmico:** Alternância entre visualização de lista e formulário sem recarregamento de página. 
- **Gerenciamento de Logs (CRUD):** Criação, leitura, edição via modal e exclusão de registros de atividades.
- **Tratamento de Rotas (Fallback):** Sistema de captura de URLs inexistentes, redirecionando o usuário para uma página 404 personalizada que mantém a identidade visual do dashboard.
- **Perfil Avançado:** Upload de avatar com **editor de recorte (crop)** integrado no frontend para padronização de imagens.
- **Interface Premium:** Design Dark Mode inspirado em dashboards modernos, utilizando ícones vetoriais (Lucide) e componentes customizados.

#

### Tecnologias Utilizadas

### Back-End
- **Framework:** [Laravel 11](https://laravel.com/) 
- **Banco de Dados:** SQLite 
- **Autenticação:** Sistema nativo de Session/Auth do Laravel. 

### Front-End
- **Estilização:** [Tailwind CSS](https://tailwindcss.com/) <br>
- **Ícones:** [Lucide Icons](https://lucide.dev/) <br>
- **Processamento de Imagem:** [Cropper.js](https://fengyuanchen.github.io/cropperjs/) (Recorte de avatar via Base64). <br>
- **Componentes:** Tailwind Plus Elements. <br>

#

### Capturas de tela da aplicação

<img src="https://github.com/vlipe/atividades-3DS/blob/b831969ccfc5a9127b698bef254e08130b42c2c2/Programa%C3%A7%C3%A3o%20Web%20III/1%C2%B0%20Bimestre/V.0.%20-%20Laravel%20Bootcamp/projeto-pw3/public/imagens/print-1.png">
<img src="https://github.com/vlipe/atividades-3DS/blob/b831969ccfc5a9127b698bef254e08130b42c2c2/Programa%C3%A7%C3%A3o%20Web%20III/1%C2%B0%20Bimestre/V.0.%20-%20Laravel%20Bootcamp/projeto-pw3/public/imagens/print-2.png">

#### Tratamento de Erros (404 Customizado)
*Página disparada através da rota fallback para garantir a UX mesmo em caminhos inexistentes.*
<img src="https://github.com/vlipe/atividades-3DS/blob/f54fde9667a7af28ff661dcf96de8113a5eec30d/Programa%C3%A7%C3%A3o%20Web%20III/2%C2%B0%20Bimestre/Rota%20Fallback%20-%20Laravel/projeto-pw3/public/imagens/print-fallback.png">

#

### Como rodar o projeto localmente

1.  **Clonar o repositório:**
    ```bash
    git clone [https://github.com/vlipe/atividades-3DS.git](https://github.com/vlipe/atividades-3DS.git)
    ```

2.  **Instalar dependências do PHP:**
    ```bash
    composer install
    ```

3.  **Configurar o ambiente:**
    * Renomeie o arquivo `.env.example` para `.env`.
    * Crie um arquivo vazio em `database/database.sqlite`.

4.  **Gerar chave e migrar banco:**
    ```bash
    php artisan key:generate
    php artisan migrate
    ```

5.  **Rodar o servidor:**
    ```bash
    npm install
    npm run dev
    # Em outro terminal:
    php artisan serve
    ```

6.  **Testar a Rota Fallback:**
    Acesse `http://localhost:8000/qualquer-rota-inexistente` para visualizar a página de erro personalizada.

#

### Estrutura de Dados (Banco de Dados)

O sistema utiliza duas tabelas principais relacionadas:
- **Users:** Armazena dados de autenticação e o caminho do `profile_image`.
- **Projects:** Registra os logs, vinculando-os ao `user_id` e armazenando `title`, `description`, `status` e `tech_stack`.

#
