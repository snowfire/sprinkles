<?php namespace Snowfire\Sprinkles\Storing;

use Snowfire\Sprinkles\Eventing\EventGeneratorTrait;

abstract class Repository {

	use EventGeneratorTrait;

	/**
	 * @param $search
	 * @param $columns
	 * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
	 * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
	 */
	protected function search($search, $columns, $query)
	{
		if ($search)
		{
			$query->where(function($query) use ($search, $columns)
			{
				foreach ($columns as $column)
				{
					$query->orWhere($column, 'LIKE', "%{$search}%");
				}
			});
		}

		return $query;
	}

}