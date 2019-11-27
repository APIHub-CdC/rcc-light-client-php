# Reporte-de-crédito-consolidado-light-client-php

Este reporte muestra el historial crediticio, el cumplimiento de pago de los compromisos que la persona ha adquirido con entidades financieras, no financieras e instituciones comerciales que dan crédito o participan en actividades afines al crédito.

## Requisitos

PHP 7.1 ó superior

### Dependencias adicionales
- Se debe contar con las siguientes dependencias de PHP:
    - ext-curl
    - ext-mbstring
- En caso de no ser así, para linux use los siguientes comandos

```sh
#ejemplo con php en versión 7.3 para otra versión colocar php{version}-curl
apt-get install php7.3-curl
apt-get install php7.3-mbstring
```
- Composer [vea como instalar][1]

## Instalación

Ejecutar: `composer install`

## Guía de inicio

### Paso 1. Agregar el producto a la aplicación

Al iniciar sesión seguir os siguientes pasos:

 1. Dar clic en la sección "**Mis aplicaciones**".
 2. Seleccionar la aplicación.
 3. Ir a la pestaña de "**Editar '@tuApp**' ".
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/edit_applications.jpg" width="900">
    </p>
 4. Al abrirse la ventana emergente, seleccionar el producto.
 5. Dar clic en el botón "**Guardar App**":
    <p align="center">
      <img src="https://github.com/APIHub-CdC/imagenes-cdc/blob/master/selected_product.jpg" width="400">
    </p>

### Paso 2. Capturar los datos de la petición

Los siguientes datos a modificar se encuentran en ***test/Api/ReporteDeCrditoConsolidadoLightFICOScorePLDApiTest.php***

Es importante contar con el setUp() que se encargará de inicializar la url. Modificar la URL ***('the_url')*** de la petición del objeto ***$config***, como se muestra en el siguiente fragmento de código:

```php
<?php
public function setUp()
{
    $config = new \RccLight\Client\Configuration();
    $config->setHost('the_url');

    $password = getenv('KEY_PASSWORD');
    $this->signer = new \RccLight\Client\Interceptor\KeyHandler(null, null, $password);
    $events = new \RccLight\Client\Interceptor\MiddlewareEvents($this->signer);
    $handler = \GuzzleHttp\HandlerStack::create();
    $handler->push($events->add_signature_header('x-signature'));
    $handler->push($events->verify_signature_header('x-signature'));
    $client = new \GuzzleHttp\Client(['handler' => $handler]);

    $this->apiInstance = new \RccLight\Client\Api\ReporteDeCreditoConsolidadoLightFICOScorePLDApi($client, $config);
    $this->x_api_key = "your_api_key";
    $this->username = "your_username";
    $this->password = "your_password";
}  
```
```php

<?php
/**
* Este es el método que se será ejecutado en la prueba ubicado en path/to/repository/test/Api/ReporteDeCrditoConsolidadoLightFICOScorePLDApiTest.php 

*/
public function testGetFullReporte()
{
    $x_full_report = true;
    $request = new \RccLight\Client\Model\PersonaPeticion();
    $request->setPrimerNombre("XXXXX");
    $request->setSegundoNombre("XXXXX");
    $request->setApellidoPaterno("XXXXX");
    $request->setApellidoMaterno("XXXXX");
    $request->setApellidoAdicional(null);
    $request->setFechaNacimiento("yyyy-MM-dd");

    try {
        $result = $this->apiInstance->getReporte($this->x_api_key, $this->username,  $this->password, $request, $x_full_report);
        $this->assertNotNull($result);
        echo "testGetFullReporte finished\n";
    } catch (Exception $e) {
        echo 'Exception when calling ReporteDeCreditoConsolidadoLightFICOScorePLDApi->getReporte: ', $e->getMessage(), PHP_EOL;
    }
}
?>
```
## Pruebas unitarias

Para ejecutar las pruebas unitarias:

```sh
./vendor/bin/phpunit
```

[1]: https://getcomposer.org/doc/00-intro.md#installation-linux-unix-macos
