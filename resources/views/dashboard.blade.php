<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Welcome Message --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Welcome, {{ Auth::user()->name }}!
                </div>
            </div>
            {{-- Recommended Posts --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" 
            style="margin-top: 5px; display:flex;align-items: center;justify-content: center;flex-wrap:wrap;">
                @foreach (Auth::user()->posts as $post)
                <a href="{{ route('home.show', ['id' => $post->id]) }}">
                <div style="border: 1px solid;border-color: orange;padding: 10px;box-shadow: 5px 10px #ff9933;
                height: 125px;width: 1100px;position: relative;top: 20px;margin-bottom: 20px; ">
                        Poster: {{$post->user->name}}
                    <br>Title: {{$post->title}}
                    <br>Comments: {{$post->comments->count()}}</div></a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
