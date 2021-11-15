<?php
	/**
     * This file is a part of Ekolo Builder
     * @author Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Routing;

	/**
     * Represents the informations of a route
	 * @package Ekolo\Routing\Route
	 */
	class Route
	{
        /**
         * The action to be performed
         * @var string
         */
        protected $action;
        
        /**
         * The url that the client to request
         * @var string
         */
        public $url;
        
        /**
         * The names of the variables contained in the route
         * @var array
         */
        protected $varsNames;
        
        /**
         * The variables contained in the route
         * @var array
         */
		protected $vars;

        /**
         * Construct
         * @param string $url
         * @param \Closure $controller
         * @param string $action
         * @param array $varsNames
         */
		public function __construct(string $url, $action, array $varsNames)
		{
			$this->setUrl($url);
			$this->setAction($action);
			$this->setVarsNames($varsNames);
		}

		/**
		 * Check if the route contains variables
		 * @return bool
		 */
		public function hasVars()
		{
			return !empty($this->varsNames);
		}

		/**
		 * Check if the url passed in parameter matches that of the route
		 * @param string $url
		 * @return array|bool $matches
		 */
		public function match($url)
		{
			if (preg_match('#^' . $this->url . '$#',$url, $matches)) {
				// for ($i=0; $i < count($matches); $i++) { 
				// 	if ($i > 0 && is_paire($i)) {
				// 		$matches[$i] = preg_replace('#_#', '', $matches[$i]);
				// 	}
				// }
		
				return $matches;
			}else{
				return false;
			}
		}

		/**
		 * Modify the action
		 * @param string|Closure
		 * @return void
		 */
		public function setAction($action)
		{
			$this->action = $action;
		}

		/**
         * Modify the url of route
		 * @param string $url
		 * @return void
		 */
		public function setUrl(string $url)
		{
			$this->url = $url;
		}

		/**
         * Modify the names of variables
		 * @param array $varsNames
		 * @param void
		 */
		public function setVarsNames(array $varsNames)
		{
			$this->varsNames = $varsNames;
		}

		/**
		 * Modify the values of variables
		 * @param $vars
		 */
		public function setVars($vars)
		{
			$this->vars = $vars;
		}

		/**
		 * Return the right action
		 * @return string
		 */
		public function action()
		{
			return $this->action;
		}

		/**
		 * Return the different variables
		 * @return $vars
		 */
		public function vars()
		{
			return $this->vars;
		}

		/**
		 * Return the names of the variables
		 * @return array $varsNames
		 */
		public function varsNames()
		{
			return $this->varsNames;
		}
	}