<?php
namespace Subwayminder\Console;

class Input
{
    public array $tokens;

    public function __construct()
    {
        $argv = $argv ?? $_SERVER['argv'] ?? [];

        // strip the application name
        array_shift($argv);

        $this->tokens = $argv;
    }

    public function test(){
        var_dump($this->tokens);
//        $command = $argv[1];
//        $argv = array_slice($argv, 2);
//        echo 'command is '. $command. PHP_EOL;
//        var_dump($argv);
//
//        $match = [];
//        foreach ($argv as $k=>$arg)
//        {
//            preg_match('#\([.*?]\)#', $arg, $match);
//        }
    }
}