<?php

use App\Manager\Utility\Utility;

/**
 * @param string|null $name
 * @param string $path
 * @return string
 */
function image_url(string|null $name, string $path = ''): string
{
    return Utility::prepare_image_url($name, $path);
}
