<?php

/**
 * This file is a part of the Ekolo Builder
 * @author Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
 */

namespace Ekolo\Http\Options;

\session_start();

use Ekolo\EkoMagic\ParameterBag;

/**
 * Controls the parameters of $_SESSION (The data coming from a form by the SESSION method)
 */
class Session extends ParameterBag
{

    public function __construct(array $vars = [])
    {
        $_SESSION = !empty($vars) ? array_merge($_SESSION, $vars) : $_SESSION;
        parent::__construct($_SESSION);

    }

    /**
     * Allows you to modify the value of SESSION element
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function set($key, $value)
    {
        parent::set($key, $value);
        $_SESSION[$key] = $value;
    }

    /**
     * Allows you to modify the value of SESSION...
     * @param array $parameters
     * @return void
     */
    public function add(array $parameters = [])
    {
        parent::add($parameters);
        $_SESSION = array_merge($_SESSION, $parameters);
    }

    /**
     * Replaces all variables
     * @param array $parameters
     * @return void
     */
    public function replace(array $parameters = [])
    {
        parent::replace($parameters);
        $_SESSION = $parameters;
    }

    /**
     * Remove a variable
     * @param string $key
     * @return void
     */
    public function remove($key)
    {
        parent::remove($key);
        unset($_SESSION[$key]);
    }

    /**
     * Returns the variable whose key passed in parameter
     * @param string $key
     * @return void
     */
    public function get($key, $default = null)
    {
        parent::get($key, $default);

        return $this->has($key) ? $_SESSION[$key] : null;
    }

    /**
     * Return all variables
     * @return array
     */
    public function all()
    {
        parent::all();

        return $_SESSION;
    }

    /**
     * Return all parameters keys
     * @return array
     */
    public function keys()
    {
        parent::keys();
        return array_keys($_SESSION);
    }

    /**
     * Check if the parameter exists
     * @param string $key
     * @return bool
     */
    public function has($key)
    {
        parent::has($key);
        return array_key_exists($key, $_SESSION);
    }

    /**
     * Return number of parameters
     * @return int
     */
    public function count()
    {
        parent::count();
        return \count($_SESSION);
    }
}
