<?php

namespace Policeamunice\MVC\Resources;

use Twig\Loader\FilesystemLoader as TwigFileLoader;
use Twig\Environment as TwigEnvironment;

class TemplatesLoader
{
    private static TwigEnvironment $twig;

    public static function init(): void
    {
        $loader = new TwigFileLoader('templates');
        self::$twig = new TwigEnvironment($loader);
    }

    public static function load(string $name, array $data): string
    {
        return self::$twig->render($name . '.twig', $data);
    }
}
