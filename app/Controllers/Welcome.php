<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Welcome extends BaseController
{
    public function index()
    {
        return "hello world";
    }

    public function test($name)
    {
        echo "hello from test $name";
    }

    public function _remap($method, ...$params)
    {
        if (method_exists($this, $method)) {
            return $this->$method(...$params);
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
