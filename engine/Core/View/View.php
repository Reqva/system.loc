<?php

namespace Engine\Core\View;

class View
{
    public function render($page)
    {
        $pagePath = ROOT_DIR . '/system/View/' . $page . '.php';

        require $pagePath;
    }
}