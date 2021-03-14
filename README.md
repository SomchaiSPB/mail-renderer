# Template renderer

[Task url](https://docs.google.com/document/d/1MJlEKHZpjuuG2ZUyPSmMd3Eda2o0K9_Il5MVBpF2KO4/edit#)

## Installation
### Docker
run  
``docker build -f .docker/Dockerfile -t renderer .
``

``docker run -d -p 8000:8000 -t --name renderer renderer``

## Run application

In order to render template call endpoint:
``localhost:8000/api/render?context=``

You can choose one of the following contexts:
1. table
2. row

So, the final endpoint will look as following:

``localhost:8000/api/render?context=table``

``localhost:8000/api/render?context=row``

## Tests
In order to run tests, please execute the following command after successful ``composer install`` command:

`` php artisan test --testsuite=Unit
``
