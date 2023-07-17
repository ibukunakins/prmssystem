<?php


/**
 * @param $value
 * @param string $dash
 * @return string
 */
function display($value, $dash = '-')
{
    if (empty($value))
    {
        return $dash;
    }

    return $value;
}

function user_avatar($width, $username = null)
{
    if ($username)
    {
        $user = \App\Models\User::whereUsername($username)->first();
    } else
    {
        $user = auth()->user();
    }

    if ($image = $user->image)
    {
        return asset($image->thumbnail($width, $width));
    } else
    {
        return asset('img/avatar.png');
    }
}

/**
 * @param $width
 * @param null $entity
 * @return mixed
 */
function thumbnail($width, $height = null, $entity = null)
{
    $height ?: $height = $width;

    if ( ! is_null($entity))
    {
        if ($image = $entity->image)
        {
            return asset($image->thumbnail($width, $height));
        }
    }

    return asset(setting('placeholder'));
}

/**
 * @param $query
 * @return mixed
 */
function setting($query)
{
    $setting = \App\Models\Setting::fetch($query)->first();

    return $setting ? $setting->value : null;
}

