<?php namespace Snowfire\Sprinkles\Eventing;


use Illuminate\Support\ServiceProvider;

class EventingServiceProvider extends ServiceProvider {


	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$config = $this->app['config']->get('sprinkles::eventing');

		foreach ($config['listeners'] as $listener) {
			$this->app['events']->listen($config['prefix'] . '.*', $listener);
		}

	}
}