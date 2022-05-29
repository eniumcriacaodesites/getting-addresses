# Detalhes
Este pacote deverá fornecer um ponto de partida para se trabalhar com endereços, que deve receber dados através de um relacionamento [polimórfico](https://laravel.com/docs/9.x/eloquent-relationships#polymorphic-relationships), possibilitando a intergração do pacote com as models do seu sistema,  
# Cadastrado dinâmico de endereço com localização no mapa
Em Andamento
# Localização de endereços com API do Google Maps
Em Andamento
# Estados e Cidades do Brasil a partir da API do IBGE

Esta ação cria e atualiza todos os estados e cidades do Brasil a partir de uma integração com a API do IBGE

## Instalação
```
composer require eniumcriacaosites/getting-addresses
```
Assim que terminar você precisar registrar o ServiceProvider no seu arquivo `app.php`
```
// config/app.php

'providers' => [
    EniumCriacaoSites\GettingAddresses\Providers\GettingAddressServiceProvider::class,
];
```

Agora execute o comando abaixo para publicar as configurações necessárias
```
php artisan vendor:publish --provider="EniumCriacaoSites\GettingAddresses\Providers\GettingAddressServiceProvider"
```

Execute o comando abaixo para criar as tabelas no banco de dados
```
php artisan migrate
```

E por fim adicione a configuração abaixo no seu arquivo `.env`
```
IBGE_REST_INTEGRATION_HOST="https://servicodados.ibge.gov.br/api/v1"
```

## Utilização

Para importar todos os estados e cidades da API do IBGE basta executar o comando abaixo:
```
php artisan ibge:import-states-cities
```

## Observações

- Sempre que rodar o  *php artisan ibge:import-states-cities* a aplicação criar ou atualiza os dados
- Se deseja que a aplicação atualize a base de dados periodicamente, crie uma tarefa *CRON* em seu servidor para excutar o comando. 

