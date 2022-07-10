<?php

namespace Policeamunice\MVC\Resources;

use Symfony\Component\Yaml\Yaml as SymfonyYaml;

class ConfigsParser
{
    public static function parse(string $name): array
    {
        return SymfonyYaml::parseFile(__DIR__ . '/configs/' . $name);
    }
}
