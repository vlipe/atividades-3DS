### Portal de Acesso Restrito — Controle por Middlewares e Model
> Aplicação web desenvolvida em PHP com o framework Laravel, implementando controle de fluxo de acesso através de Middlewares acoplados a rotas e renderização de visualizações customizadas (Views).

O projeto funciona como uma barreira de segurança acadêmica, demonstrando o funcionamento do ciclo de requisição HTTP no Laravel onde o acesso não autorizado intercepta o fluxo e exibe uma interface informativa e estilizada contendo:
- Mensagem oficial de boas-vindas ao portal.
- Alerta visual de restrição e negação de credenciais.
- Instruções de suporte para contato com o administrador do sistema.

### Tecnologias e Arquitetura
- **Framework:** Laravel 11 (PHP 8.4)
- **Gerenciamento de Fluxo:** Middlewares personalizadas (`VerificaAcesso`)
- **Arquitetura & Rotas:** MVC simplificado com rotas web protegidas (`routes/web.php`)
- **Interface Gráfica:** Blade Templates, HTML5, CSS3 Customizado e Tipografia Local (`Coolvetica` + Google Fonts `Geist`)
- **Empacotador de Ativos:** Vite

### Estrutura do Projeto
- **Middleware (`app/Http/Middleware/VerificaAcesso.php`):** Intercepta a requisição para validar permissões e retornar a resposta de bloqueio formatada.
- **Controller (`app/Http/Controllers/PortalController.php`):** Gerencia as ações direcionadas aos endpoints do portal.
- **Visualização (`resources/views/acesso_negado.blade.php`):** Interface front-end estilizada em formato de card moderno inspirada em padrões de design atuais.