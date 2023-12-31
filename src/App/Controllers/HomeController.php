<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;

/**
 * Class HomeController
 * Manages home-related functionalities and views.
 */
class HomeController
{
    private TemplateEngine $view;

    /**
     * HomeController constructor.
     * Initializes the TemplateEngine for rendering views.
     */
    public function __construct()
    {
        $this->view  = new TemplateEngine(Paths::VIEW);
    }

    /**
     * Renders the home page view.
     */
    public function home()
    {
        $this->view->render("index.php", ["title" => 'Home page']);
    }
}
