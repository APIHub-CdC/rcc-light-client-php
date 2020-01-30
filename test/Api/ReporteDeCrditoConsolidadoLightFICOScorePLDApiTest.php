<?php

namespace RccLight\Client;

use \GuzzleHttp\Client;
use \GuzzleHttp\Event\Emitter;
use \GuzzleHttp\Middleware;
use \GuzzleHttp\HandlerStack as handlerStack;

use \RccLight\Client\Configuration;
use \RccLight\Client\ApiException;
use \RccLight\Client\ObjectSerializer;

class ReporteDeCrditoConsolidadoLightConFICOScoreApiTest extends \PHPUnit_Framework_TestCase
{
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

        $this->apiInstance = new \RccLight\Client\Api\ReporteDeCrditoConsolidadoLightConFICOScoreApi($client, $config);
        $this->x_api_key = "your_api_key";
        $this->username = "your_username";
        $this->password = "your_password";
    }

    public function testGetFullReporte()
    {
        $x_full_report = true;
        $request = new \RccLight\Client\Model\Persona();
        $request->setNombres("XXXXX");
        $request->setSegundoNombre("XXXXX");
        $request->setApellidoPaterno("XXXXX");
        $request->setApellidoMaterno("XXXXX");

        try {
            $result = $this->apiInstance->getReporte($this->x_api_key, $this->username,  $this->password, $request, $x_full_report);
            $this->assertNotNull($result);
            echo "testGetFullReporte finished\n";
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoConsolidadoLightConFICOScoreApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }

    public function testGetSegmentedReporte()
    {
        $x_full_report = false;
        $request = new \RccLight\Client\Model\Persona();
        $request->setNombres("XXXXX");
        $request->setSegundoNombre("XXXXX");
        $request->setApellidoPaterno("XXXXX");
        $request->setApellidoMaterno("XXXXX");

        try {
            $result = $this->apiInstance->getReporte($this->x_api_key, $this->username,  $this->password, $request, $x_full_report);
            $this->assertNotNull($result);
            echo "testGetSegmentedReporte finished\n";
            return $result->getFolioConsulta();
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoConsolidadoLightConFICOScoreApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    }

    /**
     * @depends testGetSegmentedReporte
     */
    public function testGetCreditos($folioConsulta){
        try {
            $result = $this->apiInstance->getCreditos($folioConsulta, $this->x_api_key, $this->username,  $this->password);
            $this->assertTrue($result->getCreditos() !== null);
            echo "testGetCreditos finished\n";
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getCreditos: ', $e->getMessage(), PHP_EOL;
        }
    }

    /**
     * @depends testGetSegmentedReporte
     */
    public function testGetDomicilios($folioConsulta){
        try {
            $result = $this->apiInstance->getDomicilios($folioConsulta, $this->x_api_key, $this->username,  $this->password);
            $this->assertTrue($result->getDomicilios() !== null);
            echo "testGetDomicilios finished\n";
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getDomicilios: ', $e->getMessage(), PHP_EOL;
        }
    }

    /**
     * @depends testGetSegmentedReporte
     */
    public function testGetEmpleos($folioConsulta){
        try {
            $result = $this->apiInstance->getEmpleos($folioConsulta, $this->x_api_key, $this->username,  $this->password);
            $this->assertTrue($result->getEmpleos() !== null);
            echo "testGetEmpleos finished\n";
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getEmpleos: ', $e->getMessage(), PHP_EOL;
        }
    }

    /**
     * @depends testGetSegmentedReporte
     */
    public function testGetConsultas($folioConsulta){
        try {
            $result = $this->apiInstance->getConsultas($folioConsulta, $this->x_api_key, $this->username,  $this->password);
            $this->assertTrue($result->getConsultas() !== null);
            echo "testGetConsultas finished\n";
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getConsultas: ', $e->getMessage(), PHP_EOL;
        }
    }

    /**
     * @depends testGetSegmentedReporte
     */
    public function testGetScores($folioConsulta){
        try {
            $result = $this->apiInstance->getScores($folioConsulta, $this->x_api_key, $this->username,  $this->password);
            $this->assertTrue($result->getScores() !== null);
            echo "testGetScores finished\n";
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getScores: ', $e->getMessage(), PHP_EOL;
        }
    }

    /**
     * @depends testGetSegmentedReporte
     */
    public function testGetMensajes($folioConsulta){
        try {
            $result = $this->apiInstance->getMensajes($folioConsulta, $this->x_api_key, $this->username,  $this->password);
            $this->assertTrue($result->getMensajes() !== null);
            echo "testGetMensajes finished\n";
        } catch (Exception $e) {
            echo 'Exception when calling ReporteDeCrditoApi->getMensajes: ', $e->getMessage(), PHP_EOL;
        }
    }
    
}
