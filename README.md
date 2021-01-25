# Maleteo

Primer proyecto con PHP y el framework Symfony utilizando Docker para el despliegue de una base de datos de tipo MySQL, una distribución Alpine y un instalador básico de Symfony.

#

## Descripción

Con esta aplicación se pueden dar de alta nuevos usuarios por medio de usuario y contraseña. Además, tiene una zona de administración privada, con acceso desde el footer, que permite gestionar los usuarios y listar los comentarios.

## Instrucciones

Dispones de un fichero docker-compose.yml con el que levantar el contenedor y al mismo tiempo creará la imagen de Docker. Antes de levantar el contenedor tenemos que modificar el fichero docker-compose.yml y sustituir los valores de user y uid por los que correspondan.

Una vez levantado, podemos asegurarnos que está todo ejecutándose:

```
docker-compose ps
```

Para 'entrar' en el contenedor utilizaremos la opción -u para indicar el usuario creado anteriormente:

```
docker-compose exec -u usuario php bash
```

Finalmente sólo nos queda instalar las dependencias del proyecto:

```shell script
composer install
```

Una vez hecho esto, en la URL http://localhost:8000 tendremos nuestra aplicación Symfony recién instalada.


