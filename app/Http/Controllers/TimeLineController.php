<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Foundation\Http\Middleware\ValidatePostSize;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class TimeLineController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('dashboard', [
            'posts' => Post::with('user')->withCount('comment')->latest('id')->get()
        ]);
    }
}
