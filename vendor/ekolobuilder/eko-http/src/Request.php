<?php
    /**
     * This file is a part of the Ekolo Builder
     * @author Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
	namespace Ekolo\Http;

	use Ekolo\Http\Options\Params;
	use Ekolo\Http\Options\Bodies;
	use Ekolo\Http\Options\Files;
	use Ekolo\Http\Options\Session;

    /**
     * @see Ekolo\Http\RequestInterface
     */
    class Request extends HTTPRequest {

		protected $params,
				  $body, 
				  $bodies,
				  $files,
				  $input,
				  $session;

		public function __construct()
		{
			parent::__construct();
			$this->params = new Params;
			$this->files  = new Files;
			$this->body   = new Bodies;
			$this->session = new Session;
		}

        /**
		 * Handles and returns data of type GET stored in $_GET
		 * @param string $key The key to the variable
		 * @param mixed $default The default value in case this variable does not exist
		 * @return mixed|Params
		 */
		public function params($key = null, $default = null)
		{
			if ($key) {
				return $this->params->has($key) ? $this->params->get($key) : $default;
			}else {
				return $this->params;
			}
		}
		
		/**
		 * Handles and returns data of type POST stored in $_POST
		 * @param string $key
		 * @param mixed $default
		 * @return mixed|Bodies
		 */
		public function body($key = null, $default = null)
		{
			if ($key) {
				return $this->body->has($key) ? $this->body->get($key) : $default;
			}else {
				return $this->body;
			}
		}

		/**
		 * Handles and returns data of type SESSION stored in $_SESSION
		 * @param string $key
		 * @param mixed $default
		 * @return mixed|Session
		 */
		public function session($key = null, $default = null)
		{
			if ($key) {
				return $this->session->has($key) ? $this->session->get($key) : $default;
			}else {
				return $this->session;
			}
		}

		/**
		 * Handles and returns data of type FILES stored $_FILES
		 * @param string $key
		 * @param mixed $default 
		 * @return mixed|Files
		 */
		public function files($key = null, $default = null)
		{
			if ($key) {
				return $this->files->has($key) ? $this->files->get($key) : $default;
			}else {
				return $this->files;
			}
		}
		
		/**
		 * Handles and returns data of type POST stored
		 * @param string $key 
		 * @param mixed $default 
		 * @return mixed|Bodies
		 */
		public function input($key = null, $default = null)
		{
			return $this->body($key, $default);
		}
        
        /**
		 * Check if there is a variable $_GET [$ key]
		 * @param string $key
		 * @return bool
		 */
		public function paramExists($key)
		{
			return $this->params->has($key);
		}

		/**
		 * Return the method whose request was launched
		 * @return string
		 */
		public function method()
		{
			return $this->server->get('REQUEST_METHOD') ? $this->server->get('REQUEST_METHOD') : 'GET';
		}

		/**
		 * Return the uri (url) requested by the client
		 * @return string
		 */
		public function uri()
		{
			return $this->requestUri();
		}

		/**
		 * Check if the request is in AJAX or not
		 * @return bool
		 */
		public function ajax()
		{
			return 'XMLHttpRequest' == $this->headers->get('X-Requested-With');
		}
    }