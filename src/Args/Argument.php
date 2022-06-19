<?php
namespace Subwayminder\Console\Args;

class Argument
{
    private string $name;
    private string $description;
    private bool $required;

    public function __construct(string $name, string $description, bool $required)
    {

    }
}