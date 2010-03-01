<?php
/**
 * Class from http://framework.zend.com/wiki/display/ZFDEV2/Zend+Framework+2.0+Roadmap
 */
namespace Mkk;

class Options
{
    public static function setOptions($object, array $options)
    {
        if (!is_object($object)) {
            return;
        }
        foreach ($options as $key => $value) {
            $key = str_replace('_', ' ', strtolower($key));
            $key = str_replace(' ', '', ucwords($key));
            $method = 'set' . $key;
            if (method_exists($object, $method)) {
                $object->$method($value);
            }
        }
    }

    public static function setConstructorOptions($object, $options)
    {
        if ($options instanceof Zend_Config) {
            $options = $options->toArray();
        }
        if (is_array($options)) {
            self::setOptions($object, $options);
        }
    }
}