# Template renderer

## Installation
### Docker
run  
``docker build -f .docker/Dockerfile -t renderer .
``

``docker run -d --name renderer -p 8000:8000 -t --name renderer renderer``

## Run application

In order to render template call endpoint:
``localhost:8000/api/render?context=``

You can choose on of the following contexts:
1. table
2. row

So, the final endpoint will look as following:

``localhost:8000/api/render?context=table``

``localhost:8000/api/render?context=row``

## Tests
In order to run tests, please execute the following command after successful ``composer install`` command:

`` php artisan test --filter TemplatingRowContextTest
``

`` php artisan test --filter TemplatingTableContextTest
``

I don't know why, if we run all tests in batch, test TemplatingTableContextTest takes wrong template file.

``php artisan test --testsuite=Unit
``
