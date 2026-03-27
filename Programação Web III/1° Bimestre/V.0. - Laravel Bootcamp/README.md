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

### Como rodar o projeto localmente

Siga os passos abaixo para configurar o ambiente:

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

5.  **Criar o link de armazenamento (Vital para as fotos de perfil):**
    ```bash
    php artisan storage:link
    ```

6.  **Instalar dependências de assets e rodar:**
    ```bash
    npm install
    npm run dev
    # Em outro terminal:
    php artisan serve
    ```

#

### Estrutura de Dados (Banco de Dados)

O sistema utiliza duas tabelas principais relacionadas:
- **Users:** Armazena dados de autenticação e o caminho do `profile_image`.
- **Projects:** Registra os logs, vinculando-os ao `user_id` e armazenando `title`, `description`, `status` e `tech_stack`.

#

Criado por Felipe Vivencio.
