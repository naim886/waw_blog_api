<?php

use App\Manager\Utility\Utility;

/**
 * @param string $name
 * @param string $path
 * @return string
 */
function image_url(string $name, string $path = ''): string
{
    return Utility::prepare_image_url($name, $path);
}
