<?php

namespace RccLight\Client\Model;

use \ArrayAccess;
use \RccLight\Client\ObjectSerializer;

class Respuesta implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $apihubModelName = 'Respuesta';
    
    protected static $apihubTypes = [
        'folio_consulta' => 'string',
        'persona' => '\RccLight\Client\Model\PersonaRespuesta',
        'consultas' => '\RccLight\Client\Model\Consulta[]',
        'creditos' => '\RccLight\Client\Model\Credito[]',
        'domicilios' => '\RccLight\Client\Model\Domicilio[]',
        'empleos' => '\RccLight\Client\Model\Empleo[]',
        'scores' => '\RccLight\Client\Model\Score[]',
        'pld' => '\RccLight\Client\Model\PersonaPLD[]'
    ];
    
    protected static $apihubFormats = [
        'folio_consulta' => null,
        'persona' => null,
        'consultas' => null,
        'creditos' => null,
        'domicilios' => null,
        'empleos' => null,
        'scores' => null,
        'pld' => null
    ];
    
    public static function apihubTypes()
    {
        return self::$apihubTypes;
    }
    
    public static function apihubFormats()
    {
        return self::$apihubFormats;
    }
    
    protected static $attributeMap = [
        'folio_consulta' => 'folioConsulta',
        'persona' => 'persona',
        'consultas' => 'consultas',
        'creditos' => 'creditos',
        'domicilios' => 'domicilios',
        'empleos' => 'empleos',
        'scores' => 'scores',
        'pld' => 'pld'
    ];
    
    protected static $setters = [
        'folio_consulta' => 'setFolioConsulta',
        'persona' => 'setPersona',
        'consultas' => 'setConsultas',
        'creditos' => 'setCreditos',
        'domicilios' => 'setDomicilios',
        'empleos' => 'setEmpleos',
        'scores' => 'setScores',
        'pld' => 'setPld'
    ];
    
    protected static $getters = [
        'folio_consulta' => 'getFolioConsulta',
        'persona' => 'getPersona',
        'consultas' => 'getConsultas',
        'creditos' => 'getCreditos',
        'domicilios' => 'getDomicilios',
        'empleos' => 'getEmpleos',
        'scores' => 'getScores',
        'pld' => 'getPld'
    ];
    
    public static function attributeMap()
    {
        return self::$attributeMap;
    }
    
    public static function setters()
    {
        return self::$setters;
    }
    
    public static function getters()
    {
        return self::$getters;
    }
    
    public function getModelName()
    {
        return self::$apihubModelName;
    }
    
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        $this->container['folio_consulta'] = isset($data['folio_consulta']) ? $data['folio_consulta'] : null;
        $this->container['persona'] = isset($data['persona']) ? $data['persona'] : null;
        $this->container['consultas'] = isset($data['consultas']) ? $data['consultas'] : null;
        $this->container['creditos'] = isset($data['creditos']) ? $data['creditos'] : null;
        $this->container['domicilios'] = isset($data['domicilios']) ? $data['domicilios'] : null;
        $this->container['empleos'] = isset($data['empleos']) ? $data['empleos'] : null;
        $this->container['scores'] = isset($data['scores']) ? $data['scores'] : null;
        $this->container['pld'] = isset($data['pld']) ? $data['pld'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getFolioConsulta()
    {
        return $this->container['folio_consulta'];
    }
    
    public function setFolioConsulta($folio_consulta)
    {
        $this->container['folio_consulta'] = $folio_consulta;
        return $this;
    }
    
    public function getPersona()
    {
        return $this->container['persona'];
    }
    
    public function setPersona($persona)
    {
        $this->container['persona'] = $persona;
        return $this;
    }
    
    public function getConsultas()
    {
        return $this->container['consultas'];
    }
    
    public function setConsultas($consultas)
    {
        $this->container['consultas'] = $consultas;
        return $this;
    }
    
    public function getCreditos()
    {
        return $this->container['creditos'];
    }
    
    public function setCreditos($creditos)
    {
        $this->container['creditos'] = $creditos;
        return $this;
    }
    
    public function getDomicilios()
    {
        return $this->container['domicilios'];
    }
    
    public function setDomicilios($domicilios)
    {
        $this->container['domicilios'] = $domicilios;
        return $this;
    }
    
    public function getEmpleos()
    {
        return $this->container['empleos'];
    }
    
    public function setEmpleos($empleos)
    {
        $this->container['empleos'] = $empleos;
        return $this;
    }
    
    public function getScores()
    {
        return $this->container['scores'];
    }
    
    public function setScores($scores)
    {
        $this->container['scores'] = $scores;
        return $this;
    }
    
    public function getPld()
    {
        return $this->container['pld'];
    }
    
    public function setPld($pld)
    {
        $this->container['pld'] = $pld;
        return $this;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}