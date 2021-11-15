<?php
    /**
     * This file is a part of the Ekolo Builder
     * @author Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Http;
    
    use Ekolo\Http\Options\Server;
    use Ekolo\Http\Options\Headers;

    /**
     * Lists http variables and other features
     */
    class HTTPRequest {

        protected $vars;
		protected $server;
		protected $headers;

        public function __construct()
        {
			$this->server = new Server;
			$this->headers = new Headers;
        }

        /**
		 * Returns the user's IP address
		 * @return string $ip
		 */
		public function getClientIp()
		{
			return $this->server->get('REMOTE_ADDR');
		}

		/**
		 * Returns the user's IP address
		 * @return string $ip
		 */
		public function ip()
		{
			return $this->server->get('REMOTE_ADDR');
		}

		/**
		 * Return the server protocol
		 * @return string
		 */
		public function getServerProtocol()
		{
			return $this->server->get('SERVER_PROTOCOL');
		}

		/**
		 * Forward the remote port
		 * @return string
		 */
		public function getRemotePort()
		{
			return $this->server->get('REMOTE_PORT');
		}

		/**
		 * Return the application from the PHP server and its version
		 * @return string
		 */
		public function getServerSoftware()
		{
			return $this->server->get('SERVER_SOFTWARE');
		}

		/**
		 * Return the server name
		 * @return string
		 */
		public function getSeverName()
		{
			return $this->server->get('SERVER_NAME');
		}

		/**
		 * Return the port whose server is running
		 * @return string
		 */
		public function getServerPort()
		{
			return $this->server->get('SERVER_PORT');
		}

		/**
		 * Return the executed file
		 * @return string
		 */
		public function scriptName()
		{
			return $this->server->get('SCRIPT_NAME');
		}

		/**
		 * Return the path of the executed file
		 * @return string
		 */
		public function scriptFileName()
		{
			return $this->server->get('SCRIPT_FILENAME');
		}

		/**
		 * Return the query string
		 * @return string
		 */
		public function queryString()
		{
			return $this->server->get('QUERY_STRING');
		}

		/**
		 * Return the path of the executed file
		 * @return string
		 */
		public function httpHost()
		{
			return $this->server->get('HTTP_HOST');
		}

		/**
		 * Return the request uri
		 * @return string
		 */
		public function requestUri()
		{
			return $this->server->get('REQUEST_URI');
		}

		/**
		 * Returns the Server instance
		 * @return Ekolo\Http\Server
		 */
		public function server()
		{
			return $this->server;
		}

		/**
		 * Returns the Headers instance
		 * @return Ekolo\Http\Headers
		 */
		public function headers()
		{
			return $this->headers;
		}
    }