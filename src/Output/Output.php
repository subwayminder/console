<?php


namespace Subwayminder\Console\Output;


class Output
{
    const SPACE = ' ';

    public function writeLn(int $tabSize, string $message): void
    {
        echo PHP_EOL.str_repeat(self::SPACE, $tabSize).$message.PHP_EOL;
    }
}