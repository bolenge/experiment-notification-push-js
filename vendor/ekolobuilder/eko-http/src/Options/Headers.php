<?php
   /**
     * This file is a part of the Ekolo Builder
     * @author Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Http\Options;
    
    use Ekolo\EkoMagic\ParameterBag;

    /**
     * Manage the headers
     */
    class Headers extends ParameterBag {

        protected $headers;

        public function __construct(array $vars = [])
        {
            $headers = function_exists('getallheaders') ? \getallheaders() :[];
            $this->headers = !empty($vars) ? $vars : $headers;
            parent::__construct($this->headers);
        }
    }