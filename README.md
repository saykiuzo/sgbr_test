<p align="center">
    Teste SGBR
</p>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Logo Laravel"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Status da Compilação"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Downloads Totais"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Última Versão Estável"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="Licença"></a>
</p>

# Pré-requisitos

Antes de começar, certifique-se de ter o seguinte instalado:

- Versão PHP  8.1 ou superior
- Composer versão  2.0 ou superior
- Um editor de código (VS Code, PHPStorm, etc.)
- Um servidor de desenvolvimento (XAMPP, WAMP, etc.)

Para verificar sua versão do PHP, execute o seguinte comando no seu terminal:

```bash
    php -v
```

## Instalação e Configuração

1. Clonar este repositório
2. Instalar Laravel  10: Baixe e instale o Laravel  10 usando o Composer:

```bash
    composer global require laravel/installer
```

3. Navegar até o repositório clonado:

```bash
    cd sgbr_test
```

4. Configurar Banco de Dados: Configure sua conexão de banco de dados no arquivo `.env`.
5. Executar Migrações: Após configurar o banco de dados, execute as migrações para criar as tabelas necessárias:

```bash
    php artisan migrate
```

Você pode configurar o ambiente Docker executando esses comandos:

```bash
    docker-compose up -d
```

## Testes

O repositório inclui testes unitários para o modelo Place. Para executá-los, rode:

```bash
    php artisan test
```

Se você deseja usar Insomnia ou a Coleção Postman, pode importar o `collections.json`.

Adicione também os seguintes passos para executar o ambiente Laravel utilizando Sail:

- Iniciar o ambiente Sail:

```bash
    ./vendor/bin/sail up
```

- Executar as migrações dentro do ambiente Sail:

```bash
    ./vendor/bin/sail php artisan migrate
```
