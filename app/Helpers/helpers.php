<?php 

function site(string $key)
{
	return cache('site')->$key;
}

function active(string $url, string $res = 'active', $group = null): String
{

	$active = $group ? request()->is($url.'/*') || request()->is($url) : request()->is($url);

	return $active ? $res : '';
}

function image(string $img, string $path = 'cover'): String
{
	return asset('storage/'.$path.'/'.$img);
}

function localDate(string $date): String
{
	return date('d M Y', strtotime($date));
}

function badge(array $replace, string $subject = '<span class="badge badge-color">text</span>'): String
{
	$search = ['color', 'text'];

	return str_replace($search, $replace, $subject);
}

function randomBadge(string $text): String
{
	$colors = ['red', 'green', 'yellow', 'blue', 'indigo', 'purple', 'pink'];

	$replace = [\Arr::Random($colors), $text];

	$subject = '<span class="badge color">text</span>';
	$search = ['color', 'text'];

	return str_replace($search, $replace, $subject);
}

 ?>