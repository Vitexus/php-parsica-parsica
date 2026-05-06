<?php

declare(strict_types=1);

require_once '/usr/share/php/Composer/InstalledVersions.php';

require_once '/usr/share/php/Parsica/Parsica/characters.php';
require_once '/usr/share/php/Parsica/Parsica/combinators.php';
require_once '/usr/share/php/Parsica/Parsica/numeric.php';
require_once '/usr/share/php/Parsica/Parsica/predicates.php';
require_once '/usr/share/php/Parsica/Parsica/primitives.php';
require_once '/usr/share/php/Parsica/Parsica/recursion.php';
require_once '/usr/share/php/Parsica/Parsica/sideEffects.php';
require_once '/usr/share/php/Parsica/Parsica/space.php';
require_once '/usr/share/php/Parsica/Parsica/strings.php';
require_once '/usr/share/php/Parsica/Parsica/Expression/expression.php';
require_once '/usr/share/php/Parsica/Parsica/Internal/FP.php';
require_once '/usr/share/php/Parsica/Parsica/Curry/functions.php';

spl_autoload_register(function (string $class): void {
    $prefix = 'Parsica\\Parsica\\';
    if (str_starts_with($class, $prefix)) {
        $file = '/usr/share/php/Parsica/Parsica/' . str_replace('\\', '/', substr($class, strlen($prefix))) . '.php';
        if (file_exists($file)) {
            require $file;
        }
    }
});

(function (): void {
    $versions = [];
    foreach (\Composer\InstalledVersions::getAllRawData() as $d) {
        $versions = array_merge($versions, $d['versions'] ?? []);
    }
    $name    = 'unknown';
    $version = '0.0.0';
    $versions[$name] = ['pretty_version' => $version, 'version' => $version,
        'reference' => null, 'type' => 'library', 'install_path' => __DIR__,
        'aliases' => [], 'dev_requirement' => false];
    \Composer\InstalledVersions::reload([
        'root' => ['name' => $name, 'pretty_version' => $version, 'version' => $version,
            'reference' => null, 'type' => 'library', 'install_path' => __DIR__,
            'aliases' => [], 'dev' => false],
        'versions' => $versions,
    ]);
})();
