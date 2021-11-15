<?php

/**
 * This file is a part of the Ekolo Builder
 * @author Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
 */

namespace Ekolo\Http\Options;

use Ekolo\EkoMagic\ParameterBag;

/**
 * Controls the parameters of $ _SERVER (The data coming from a form by the POST method)
 */
class Server extends ParameterBag
{

    public function __construct(array $vars = [])
    {
        $vars = !empty($vars) ? $vars : $_SERVER;
        parent::__construct($vars);
    }

    /**
     * Allows you to modify the value of POST element
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set($key, $value)
    {
        parent::set($key, $value);
        $_SERVER[$key] = $value;
    }

    /**
     * Allows you to modify the value of POST...
     * @param array $parameters
     * @return void
     */
    public function add(array $parameters = [])
    {
        parent::add($parameters);
        $_SERVER = array_merge($_SERVER, $parameters);
    }

    /**
     * Replaces all variables
     * @param array $parameters
     * @return void
     */
    public function replace(array $parameters = [])
    {
        parent::replace($parameters);
        $_SERVER = $parameters;
    }

    /**
     * Remove a variable
     * @param string $key
     * @return void
     */
    public function remove($key)
    {
        parent::remove($key);
        unset($_SERVER[$key]);
    }

    /**
     * Returns the variable whose key passed in parameter
     * @param string $key
     * @return void
     */
    public function get($key, $default = null)
    {
        parent::get($key, $default);

        return $this->has($key) ? $_SERVER[$key] : null;
    }

    /**
     * Return all variables
     * @return array
     */
    public function all()
    {
        parent::all();

        return $_SERVER;
    }

    /**
     * Return all parameters keys
     * @return array
     */
    public function keys()
    {
        parent::keys();
        return array_keys($_SERVER);
    }

    /**
     * Check if the parameter exists
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        parent::has($key);
        return array_key_exists($key, $_SERVER);
    }

    /**
     * Return number of parameters
     * @return int
     */
    public function count()
    {
        parent::count();
        return \count($_SERVER);
    }
}
