<?php

namespace App\Traits;

trait HasGravatar
{
	public $gravatarEmail = 'email';

	public function getGravatarAttribute() {
		$hash = md5(strtolower(trim($this->attributes[$this->gravatarEmail])));
		return 'https://www.gravatar.com/avatar/' . $hash;
	}
}