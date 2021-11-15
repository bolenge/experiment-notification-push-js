<?php

    /**
     * This file is a part of the Ekolo Builder
     * @author Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\EkoMagic;

    use Ekolo\EkoMagic\Magic;

    /**
     * Allows you to manage variables (parameters), their initialization, modifications and uses
     */
    class ParameterBag extends Magic  implements \Countable
    {
        protected $parameters = [];

        public function __construct(array $parameters = [])
        {
            $this->add($parameters);
            parent::__construct($this->parameters);
        }

        /**
         * Return the parameters
         * @return array
         */
        public function all()
        {
            return $this->parameters;
        }

        /**
         * Return the parameters keys
         * @return array
         */
        public function keys()
        {
            return array_keys($this->parameters);
        }

        /**
         * Replace old parameters with new ones
         * @param array $parameters
         */
        public function replace(array $parameters = [])
        {
            $this->parameters = $parameters;
        }

        /**
         * Adding new parameters
         * @param array $parameters
         */
        public function add(array $parameters = [])
        {
            $this->parameters = array_replace($this->parameters, $parameters);
            $this->generateAttributes();
        }

        /**
         * Return the parameter by key
         * @param string $key 
         * @param mixed $default The default value in case this parameter does not exist
         * @return mixed
         */
        public function get($key, $default = null)
        {
            return array_key_exists($key, $this->parameters) ? $this->parameters[$key] : $default;
        }

        /**
         * Modify the parameter by key
         * @param string $key
         * @param mixed $value
         */
        public function set($key, $value)
        {
            $this->parameters[$key] = $value;
            $this->generateAttributes();
        }

        /**
         * Check if the parameter exists
         * @param string $key
         * @return bool
         */
        public function has($key)
        {
            return array_key_exists($key, $this->parameters);
        }

        /**
         * Remove a parameter by its key
         * @param string $key
         */
        public function remove($key)
        {
            unset($this->parameters[$key]);
        }

        /**
         * Returns The number of parameters
         * @return int
         */
        public function count()
        {
            return \count($this->parameters);
        }

        /**
         * Allows you to generate magic attributes
         */
        private function generateAttributes()
        {
            if ($this->count() > 0) {
                foreach ($this->parameters as $key => $value) {
                    $this->$key = $value;
                }
            }
        }
    }
    