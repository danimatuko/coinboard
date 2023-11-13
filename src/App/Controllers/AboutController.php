<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;

/**
 * Class AboutController
 * Handles functionalities related to the about page.
 */
class AboutController
{
    private TemplateEngine $view;

    /**
     * AboutController constructor.
     * Initializes the TemplateEngine for rendering views.
     */
    public function __construct()
    {
        $this->view  = new TemplateEngine(Paths::VIEW);
    }

    /**
     * Renders the about page view.
     */
    public function about()
    {
        $this->view->render("about.php", ["title" => 'About page']);
    }
}
