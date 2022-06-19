<?php


namespace Subwayminder\Console\Commands;


interface ICommandHandler
{
    public function handle(): void;
}