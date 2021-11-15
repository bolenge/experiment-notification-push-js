<?php
    /**
     * This file is a part of the Ekolo Builder
     * @author Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Http\Options;
    
    use Ekolo\EkoMagic\ParameterBag;

    /**
     * Controls the parameters of $ _POST (The data coming from a form by the POST method)
     */
    class Bodies extends ParameterBag {

        public function __construct(array $vars = [])
        {
            parse_str(file_get_contents('php://input'), $_POST);
            $_POST = !empty($vars) ? array_merge($_POST, $vars) : $_POST;
            parent::__construct($_POST);
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
            $_POST[$key] = $value;
        }

        /**
         * Allows you to modify the value of POST...
         * @param array $parameters
         * @return void
         */
        public function add(array $parameters = [])
        {
            parent::add($parameters);
            $_POST = array_merge($_POST, $parameters);
        }

        /**
         * Replaces all variables
         * @param array $parameters
         * @return void
         */
        public function replace(array $parameters = [])
        {
            parent::replace($parameters);
            $_POST = $parameters;
        }

        /**
         * Remove a variable
         * @param string $key
         * @return void
         */
        public function remove($key)
        {
            parent::remove($key);
            unset($_POST[$key]);
        }

        /**
         * Returns the variable whose key passed in parameter
         * @param string $key
         * @return void
         */
        public function get($key, $default = null)
        {
            parent::get($key, $default);

            return $this->has($key) ? $_POST[$key] : null;
        }

        /**
         * Return all variables
         * @return array
         */
        public function all()
        {
            parent::all();

            return $_POST;
        }

        /**
         * Return all parameters keys
         * @return array
         */
        public function keys()
        {
            parent::keys();
            return array_keys($_POST);
        }

        /**
         * Check if the parameter exists
         * @param string $key
         * @return bool
         */
        public function has($key)
        {
            parent::has($key);
            return array_key_exists($key, $_POST);
        }

        /**
         * Return number of parameters
         * @return int
         */
        public function count()
        {
            parent::count();
            return \count($_POST);
        }
    }