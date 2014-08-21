<?php
namespace Snowfire\Sprinkles\Commanding;

interface CommandBusInterface
{
	public function execute(Command $command);
}