<?php

declare(strict_types=1);

namespace Framework;

/**
 * Class TemplateEngine
 * Handles rendering templates with provided data.
 */
class TemplateEngine
{
    private string $basePath;

    /**
     * TemplateEngine constructor.
     * @param string $basePath The base path for templates.
     */
    public function __construct(string $basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     * Renders the specified template using provided data.
     *
     * @param string $template The template file name.
     * @param array $data An associative array of data to be used in the template.
     */
    public function render(string $template, array $data = [])
    {
        extract($data);
        include $this->resolve($template);
    }

    /**
     * Resolves the path of the template file.
     *
     * @param string $path The path to the template file.
     * @return string The resolved template file path.
     */
    public function resolve(string $path)
    {
        return $this->basePath . "/" . $path;
    }
}
