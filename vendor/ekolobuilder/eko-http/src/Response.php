<?php
    /**
     * This file is a part of the Ekolo Builder
     * @author Don de Dieu BOLENGE <dondedieubolenge@gmail.com>
     */
    namespace Ekolo\Http;
    
    use Ekolo\Http\Options\Server;
    use Ekolo\Http\Options\Headers;

    /**
     * Manage http responses
     */
    class Response
    {
        /**
         * Variables to send to views
         * @var array
         */
        protected $vars = [];

        /**
         * Object of the Server class
         * @var Server
         */
        protected $server;

        /**
         * The view file to display
         * @var string
         */
        protected $fileView;

        public function __construct()
        {
            $this->server = new Server;
        }

        /**
         * Allows you to add the headers in the response to be given
         * @param array $headers
         * @return void
         */
        public function addHeaders(array $headers = [])
        {
            if (!empty($headers)) {
                foreach ($headers as $header) {
                    header($header);
                }
            }
        }

        /**
         * Allows you to add a new variable to the view
         * @param string $var The name of the variable
         * @param mixed $value The value to add to the variable
         */
        public function addVar(string $var, $value)
        {
            $this->vars[$var] = $value;
        }

        /**
         * Allows you to redirect to another url
         * @param string $url
         * @return void
         */
        public function redirect(string $url)
        {
            $this->addHeaders(['Location: '.$url]);
            exit;
        }

        /**
         * Allows to modify the status
         * @param int $status The status code
         * @return void
         */
        public function setStatus(int $status = null)
        {
            if (!empty($status)) {
                $this->addHeaders([$this->server->SERVER_PROTOCOL().' '.$status]);
            }
        }

        /**
         * Allows to return the data
         * @param mixed $data The data to display
         * @param array $headers The headers to send
         * @param mixed $status The status
         */
        public function send($data, array $headers = [], int $status = null)
        {
            $this->addHeaders($headers);
            $this->setStatus($status);

            if (in_array('Content-Type: application/json', $headers)) {
                echo json_encode($data);
            }else {
                if (!is_array($data)) {
                    echo $data;
                }else {
                    echo '<pre>';
                    print_r($data);
                    echo '</pre>';
                    die();
                }
            }
        }
        
        /**
         * Return data in JSON format
         * @param mixed $data
         * @param mixed $status
         */
        public function json($data, array $headers = [], int $status = null)
        {
            $headers[] = 'Content-Type: application/json';
            $this->send($data, $headers, $status);
        }

        /**
         * Return the instance of Ekolo\Http\Options\Server
         * @return Server
         */
        public function server()
        {
            return $this->server;
        }
    }
    