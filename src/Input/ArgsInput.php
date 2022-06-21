<?php

namespace Subwayminder\Console\Input;

class ArgsInput extends Input
{
    /**
     * Реализует простой парсинг для консольного ввода
     */
    protected function parse(): void
    {
        foreach ($this->tokens as $token) {
            if (str_starts_with($token, '{')) $this->addArgument($token);
            elseif (str_starts_with($token, '[')) $this->addParam($token);
            else $this->addArgument($token);
        }
    }


}