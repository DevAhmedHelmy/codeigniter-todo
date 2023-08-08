<?php

namespace App\Controllers;

use App\Models\Post;

class Home extends BaseController
{
    public function index(): string
    {
        $model = model(Post::class);
        $posts= $model->findAll();
        return view('welcome_message', [
            'posts' => $posts
        ]);
    }
}
