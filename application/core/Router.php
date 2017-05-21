<?php
/**
 * Created by PhpStorm.
 * User: daniel687
 * Date: 5/10/17
 * Time: 7:54 AM
 */

/**
 * @access public
 * @package Core
 */

class Router
{

    /** @var null The controller */
    private $controller = null;

    /** @var null The method (of the above controller), often also named "action" */
    private $action = null;

    /** @var array URL parameters */
    private $params = array();

    /**
     * "Start" the application:
     * Analyze the URL elements and calls the according controller/method or the fallback
     */
    public function __construct()
    {
        // parse the Uri to retrieve Controller Method and Params

        $this->parseUri();


    }

    public function run(){
        // check for controller: no controller given ? then load start-page
        if (!$this->controller) {

            $page = new Home();
            $page->index();
        }

        else{
            //ROUTE TO THE API
            $this->route();
        }
    }

    private function route(){
        if (file_exists(APP . 'controller/' . $this->controller . '.php')) {

            // here we did check for controller: does such a controller exist ?

            // if so, then load this file and create this controller
            // example: if controller would be "car", then this line would translate into: $this->car = new car();
            require APP . 'controller/' . $this->controller . '.php';
            $this->controller = new $this->controller();

            // check for method: does such a method exist in the controller ?
            if (method_exists($this->controller, $this->action)) {


                if (!empty($this->params)) {
                    // Call the method and pass arguments to it

                    $this->controller->{$this->action}($this->params);
                } else {
                    // If no parameters are given, just call the method without parameters, like $this->home->method();
                    $this->controller->{$this->action}();
                }

            } else {

                if (strlen($this->action) == 0) {
                    // no action defined: call the default index() method of a selected controller
                    $this->controller->index();
                }
                else {

                    $page = new Problem();
                    $page->index();
                }
            }
        } else {


            $page = new Problem();
            $page->index();
        }
    }



    /**
     * Get and parse the URL
     */


    protected function parseUri() {
        $path = trim(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), "/");
        $method= $_SERVER['REQUEST_METHOD'];
        $path = explode('/', $path);


        $this->controller = isset($path[0]) ? $path[0] : null;
        $this->controller = ucfirst($this->controller);
        $this->action = isset($method) ? strtolower($method) : null;


        // Remove controller from the split URL
        unset($path[0]);

        // Rebase array keys and store the URL params
        $this->params = array_values($path);

    }


}