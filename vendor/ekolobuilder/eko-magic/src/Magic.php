<?php

/**
 * This file is a part of the Ekolo Builder
 * @author Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
 */

namespace Ekolo\EkoMagic;

/**
 * Magic is a magic class ;-) which allows you to make magical calls to methods that don't exist
 */
class Magic
{

    protected $methods = [];

    public function __construct(array $vars = [])
    {
        $this->methods = $vars;
    }

    public function registerMethod($method)
    {
        $this->methods[] = $method;
    }

    public function __set($key, $value)
    {
        $this->methods[$key] = $value;
    }

    public function __get($key)
    {
        return isset($this->methods[$key]) ? $this->methods[$key] : null;
    }

    public function __call($method, $args)
    {
        if (!isset($this->methods[$method])) {
            $this->methods[$method] = null;
        }

        return $this->methods[$method];
    }
}
