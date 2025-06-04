# FIND EVENTS

Bem-vindo ao **FIND EVENTS**, uma plataforma completa de eventos! Aqui você pode criar, editar e participar de eventos de outras pessoas. Gerencie seus próprios eventos, descubra novas oportunidades e conecte-se com outros participantes de forma simples e prática.

## Funcionalidades
- [x] Autenticação e autorização
- [x] Visualizar eventos
- [x] Filtro de eventos por título, participantes, localização e se é público
- [x] Crie e saia de eventos

## Demonstração
1. Visualizar eventos

https://github.com/user-attachments/assets/bfc27776-d413-4a29-a8f0-f1a5fa8d39e1

3. Filtrar eventos

https://github.com/user-attachments/assets/f538b61f-8ca0-46a6-a735-30589899fc6e

4. Criar e sair de eventos

https://github.com/user-attachments/assets/ed4e5e98-8baf-426a-9081-8a4806c64929

## Tecnologias Utilizadas
- **Laravel 12**
- **PHP 8.2+**
- **Jetstream** (autenticação)
- **Livewire**
- **TailwindCSS**
- **Vite**
- **MySQL** (padrão, mas pode ser PostgreSQL ou SQLite)

## Instalação

Este projeto foi desenvolvido utilizando o [Laravel Sail](https://laravel.com/docs/12.x/sail), que facilita a configuração do ambiente com Docker. **Recomendado:** utilize o Sail para evitar problemas de dependências e garantir que tudo funcione igual ao ambiente de desenvolvimento original.

### 1. Usando Laravel Sail (Docker) — Recomendado

1. **Clone o repositório:**
   ```zsh
   git clone https://github.com/Matheussandi/find-events-laravel.git
   cd find-events-laravel
   ```
2. **Instale as dependências PHP:**
   ```zsh
   ./vendor/bin/sail composer install
   ```
3. **Instale as dependências JavaScript:**
   ```zsh
   ./vendor/bin/sail npm install
   ```
4. **Copie o arquivo de ambiente:**
   ```zsh
   cp .env.example .env
   ```
5. **Gere a chave da aplicação:**
   ```zsh
   ./vendor/bin/sail artisan key:generate
   ```
6. **Configure o banco de dados:**
   - Por padrão, usa MySQL (já configurado no docker-compose). Se quiser usar PostgreSQL, edite o `docker-compose.yml` e `.env`.
7. **Suba os containers:**
   ```zsh
   ./vendor/bin/sail up -d
   ```
8. **Rode as migrations e seeders:**
   ```zsh
   ./vendor/bin/sail artisan migrate --seed
   ```
9. **Inicie o servidor de desenvolvimento:**
   ```zsh
   ./vendor/bin/sail npm run dev
   # O servidor PHP já estará rodando no container
   ```

> Você pode prefixar qualquer comando PHP, Artisan ou NPM com `./vendor/bin/sail` para rodar dentro do container.

---

### 2. Rodando Localmente (sem Docker)

> **Atenção:** Você precisará ter PHP 8.2+, Composer, Node.js, NPM e um banco MySQL/PostgreSQL instalados na sua máquina.

1. **Clone o repositório:**
   ```zsh
   git clone https://github.com/Matheussandi/find-events-laravel.git
   cd find-events-laravel
   ```
2. **Instale as dependências PHP:**
   ```zsh
   composer install
   ```
3. **Instale as dependências JavaScript:**
   ```zsh
   npm install
   ```
4. **Copie o arquivo de ambiente:**
   ```zsh
   cp .env.example .env
   ```
5. **Gere a chave da aplicação:**
   ```zsh
   php artisan key:generate
   ```
6. **Configure o banco de dados:**
   - Edite o arquivo `.env` com as credenciais do seu banco (MySQL ou PostgreSQL).
7. **Rode as migrations e seeders:**
   ```zsh
   php artisan migrate --seed
   ```
8. **Inicie o servidor de desenvolvimento:**
   ```zsh
   npm run dev & php artisan serve
   ```
   Ou use o comando integrado:
   ```zsh
   composer run dev
   ```

## Testes

Execute os testes automatizados com:
```zsh
php artisan test
```

## Estrutura do Projeto
- `app/` - Código principal (controllers, models, etc.)
- `database/migrations/` - Migrations do banco de dados
- `resources/views/` - Views Blade
- `routes/web.php` - Rotas web
- `public/` - Arquivos públicos

## Configuração
- Variáveis de ambiente no arquivo `.env`
- Idioma padrão: pt_BR (com fallback para inglês)
- Para personalizar itens de eventos, edite as migrations e views relacionadas

## Scripts Úteis
- `npm run dev` — Inicia o Vite em modo desenvolvimento
- `npm run build` — Gera os arquivos para produção
- `composer run dev` — Sobe tudo (PHP, filas, logs, Vite) em paralelo

## Contribuição
Contribuições são bem-vindas! Abra uma issue ou envie um pull request.
