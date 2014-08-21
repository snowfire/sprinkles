<?php

namespace Snowfire\Sprinkles\Storing;

use Snowfire\Sprinkles\Eventing\EventGeneratorTrait;

abstract class Storage extends \Eloquent {

	use EventGeneratorTrait;

} 