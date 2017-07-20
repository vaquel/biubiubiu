<?php

function view($view, $data = null)
{
    $views = explode('.', $view);
    $filePath = APP.'/View';
    foreach ($views as $view) {
        $filePath = $filePath . '/' . $view;
    }
    $filePath = $filePath . '.php';
    if (is_file($filePath)) {
        extract($data);
        include $filePath;
    } else {
        throw new \Exception('not found views');
    }
}