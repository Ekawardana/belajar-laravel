<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class StorePostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $data = $request->validate([
        //     'body' => ['required', 'min:8']
        // ]);

        // $data['user_id'] = $request->user()->id;
        //
        // $request->user()->posts()->create($data);

        $request->user()->posts()->create($request->validate([
            'body' => ['required', 'min:8']
        ]));


        return redirect()->back()->with('success', 'Posted!!');
    }
}
