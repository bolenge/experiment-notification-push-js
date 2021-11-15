<?php

/**
 * This file is a part of the Ekolo Builder
 * @author Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
 */

namespace Ekolo\Http\Options;

use Ekolo\EkoMagic\ParameterBag;

/**
 * Controls the parameters of $ _GET (The data coming from a form by the GET method)
 */
class Params extends ParameterBag
{

    public function __construct(array $vars = [])
    {
        $_GET = !empty($vars) ? array_merge($_GET, $vars) : $_GET;
        parent::__construct($_GET);
    }

    /**
     * Allows you to modify the value of GET element
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set($key, $value)
    {
        parent::set($key, $value);
        $_GET[$key] = $value;
    }

    /**
     * Allows you to modify the value of GET...
     * @param array $parameters
     * @return void
     */
    public function add(array $parameters = [])
    {
        parent::add($parameters);
        $_GET = array_merge($_GET, $parameters);
    }

    /**
     * Replaces all variables
     * @param array $parameters
     * @return void
     */
    public function replace(array $parameters = [])
    {
        parent::replace($parameters);
        $_GET = $parameters;
    }

    /**
     * Remove a variable
     * @param string $key
     * @return void
     */
    public function remove($key)
    {
        parent::remove($key);
        unset($_GET[$key]);
    }

    /**
     * Returns the variable whose key passed in parameter
     * @param string $key
     * @return void
     */
    public function get($key, $default = null)
    {
        parent::get($key, $default);

        return $this->has($key) ? $_GET[$key] : null;
    }

    /**
     * Return all variables
     * @return array
     */
    public function all()
    {
        parent::all();

        return $_GET;
    }

    /**
     * Return all parameters keys
     * @return array
     */
    public function keys()
    {
        parent::keys();
        return array_keys($_GET);
    }

    /**
     * Check if the parameter exists
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        parent::has($key);
        return array_key_exists($key, $_GET);
    }

    /**
     * Return number of parameters
     * @return int
     */
    public function count()
    {
        parent::count();
        return \count($_GET);
    }
}
