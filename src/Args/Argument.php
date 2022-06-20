<?php
namespace Subwayminder\Console\Args;

class Argument
{
    private string $name;
    private string $description;
    private bool $required;

    public function __construct(string $name, string $description, bool $required = false)
    {
        $this->name = $name;
        $this->description = $description;
        $this->required = $required;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function isRequired()
    {
        return $this->required;
    }
}