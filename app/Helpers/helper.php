<?php

use App\Manager\Utility\Utility;
use Illuminate\Support\Facades\Log;

/**
 * @param string|null $name
 * @param string|null $path
 * @return string
 */
function image_url(string|null $name, string|null $path = ''): string
{
    return Utility::prepare_image_url($name, $path);
}

function app_log(string $name, Throwable $throwable, string $type = 'error'): void
{
    Log::{$type}($name, ['message' => $throwable->getMessage(), 'file' => $throwable->getFile(), 'line' => $throwable->getLine(), 'error' => $throwable]);
}

function flash_alert(string $message, string $type = 'success'): void
{
    session()->flash('message', $message);
    session()->flash('class', $type);
}
