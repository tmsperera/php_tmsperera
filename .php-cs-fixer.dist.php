<?php

$rules = [
    '@PSR12' => true,
    '@PHP81Migration' => true,
    'ordered_imports' => ['sort_algorithm' => 'length'],
];

$finder = PhpCsFixer\Finder::create()
    ->exclude('bootstrap')
    ->exclude('node_modules')
    ->exclude('storage')
    ->exclude('vendor')
    ->in(getcwd())
    ->name('*.php')
    ->notName('*.blade.php')
    ->notName('index.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

$config = (new PhpCsFixer\Config())
    ->setRules($rules)
    ->setFinder($finder);

return $config;
