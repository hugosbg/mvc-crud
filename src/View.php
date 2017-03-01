<?php

class View
{
    public function make($template, array $data)
    {
        ob_start();
        extract($data);
        $file = __DIR__ . '/View/' . $template;
        if (!file_exists($file)) {
            throw new \Exception(
                sprintf('Arquivo %s não existe', $file)
            );
        }
        require $file;
        return ob_get_clean();
    }
}
