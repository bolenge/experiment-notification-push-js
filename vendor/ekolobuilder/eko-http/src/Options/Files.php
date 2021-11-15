<?php
    /**
     * This file is a part of the Ekolo Builder
     * @author Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Http\Options;
    
    use Ekolo\EkoMagic\ParameterBag;

    /**
     * Controls the parameters of $ _FILES (The data coming from a form by the POST method)
     */
    class Files extends ParameterBag {

        public function __construct(array $vars = [])
        {
            $_FILES = !empty($vars) ? array_merge($_FILES, $vars) : $_FILES;
            parent::__construct($_FILES);
        }

        /**
         * Modify a variable
         * @param string $key
         * @param mixed $value
         * @return void
         */
        public function set($key, $value)
        {
            parent::set($key, $value);
            $_FILES[$key] = $value;
        }

        /**
         * Add new variable
         * @param array $parameters
         * @return void
         */
        public function add(array $parameters = [])
        {
            parent::add($parameters);
            $_FILES = array_merge($_FILES, $parameters);
        }

        /**
         * Replace the variables
         * @param array $parameters
         * @return void
         */
        public function replace(array $parameters = [])
        {
            parent::replace($parameters);
            $_FILES = $parameters;
        }

        /**
         * Remove a variable
         * @param string $key
         * @return void
         */
        public function remove($key)
        {
            parent::remove($key);
            unset($_FILES[$key]);
        }

        /**
         * Return a variable
         * @param string $key
         * @return void
         */
        public function get($key, $default = null)
        {
            parent::get($key, $default);

            return $this->has($key) ? $_FILES[$key] : null;
        }

        /**
         * Return all variables
         * @return array
         */
        public function all()
        {
            parent::all();

            return $_FILES;
        }

        /**
         * Return the variables keys
         * @return array
         */
        public function keys()
        {
            parent::keys();
            return array_keys($_FILES);
        }

        /**
         * Check if the parameter exists
         * @param string $key
         * @return bool
         */
        public function has($key)
        {
            parent::has($key);
            return array_key_exists($key, $_FILES);
        }

        /**
         * Return number of variables
         * @return int
         */
        public function count()
        {
            parent::count();
            return \count($_FILES);
        }
    }