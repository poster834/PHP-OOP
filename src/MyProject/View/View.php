<?php
namespace MyProject\View;

class View 
{
    private $templatesPath;

    public function __construct($templatesPath)
    {
        $this->templatesPath = $templatesPath;
    }

    public function renderHtml(string $templateName, array $vars=[])
    {
        extract($vars);
        include str_replace('/', '\\',$this->templatesPath.'/'.$templateName);

    }
}