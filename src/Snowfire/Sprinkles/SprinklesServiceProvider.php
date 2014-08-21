<?php namespace Snowfire\Sprinkles;

use Illuminate\Support\ServiceProvider;

class SprinklesServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('team_snowfire/sprinkles');
		$this->app->register('Snowfire\Sprinkles\Eventing\EventingServiceProvider');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->singleton('commandBus', function($app)
		{
			return $app->make('Snowfire\Sprinkles\Commanding\ValidationCommandBus');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
