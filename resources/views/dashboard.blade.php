<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timeline') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('post.store')}}" method="post">
                        @csrf
                        <div class="">
                            <textarea name="body" class="w-full rounded block textarea @error ('body') textarea-error @enderror textarea-bordered textarea-ghost" rows="3" placeholder="Tulis Postingan...">{{old('body')}}</textarea>
                            @error('body')
                                <span class="text-error">{{$message}}</span>
                            @enderror
                        </div>
                    
                        <input type="submit" value="Post" class="btn mt-3 text-white">
                    </form>
                </div>
            </div>

            @foreach($posts as $post)
            <div class="card w-full bg-base-100 shadow-xl my-3">
                <div class="card-body bg-white text-gray-600">
                    <h2 class="card-title">{{$post->user->name}} - <span class="text-gray-400">{{$post->created_at->diffForHumans()}}</span></h2>
                    <p>{{$post->body}}</p>
                </div>
                <div class="card-actions bg-white justify-end">
                    <a href="{{route('post.show', $post)}}" class="link link-hover mx-4 mb-3 text-gray-700">Comment({{$post->comment_count}})</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>