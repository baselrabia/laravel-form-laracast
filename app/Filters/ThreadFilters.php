<?php

namespace App\Filters;

use App\User;

class ThreadFilters extends Filters
{
	// Register filters to operate on
	protected $filters = ['by','popular'];

	// Filter the query by a given username
	protected function by($username)
	{
		$user = User::where('name', $username)->firstOrFail();
		
		return $this->builder->where('user_id', $user->id);
	}

	// Filter the query by popularity
	protected function popular()
	{		
		return $this->builder->orderBy('replies_count','desc');
	}
}