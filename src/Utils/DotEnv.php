<?php

namespace App\Utils;

class DotEnv
{
    private string $path;

    public function __construct(string $path)
    {
        if(!file_exists($path)) {
            throw new \InvalidArgumentException(printf("'%s', %s", $path, FILE_NOT_EXIST));
        }
        $this->path = $path;
    }

    public function read(): void
    {
        if(!is_readable($this->path)) {
            throw new \RuntimeException(printf("'%s', %s", $this->path, FILE_NOT_READEBLE));
        }

        $lines = file($this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {

            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            if (!array_key_exists($name, $_ENV)) {
                putenv(sprintf('%s=%s', $name, $value));
                $_ENV[$name] = $value;
            }
        }
    }
}