@extends("main.layout")
@section("content")
    <!-- Hero Section -->
    <header class="bg-gradient-to-r from-green-600 to-blue-600 text-white text-center py-20">
        <h1 class="text-5xl font-bold leading-tight">Welcome to the Forum!</h1>
        <p class="mt-2 text-lg max-w-2xl mx-auto">Join discussions, share your thoughts, and meet new people. Start
            exploring today!</p>
        <div class="mt-6">
            <a href="#categories"
               class="bg-white text-green-600 px-8 py-3 rounded-full text-lg font-semibold hover:bg-gray-100">Explore
                Categories</a>
        </div>
    </header>

    <!-- Categories Section -->

    <section id="categories" class="max-w-7xl mx-auto p-8">
        <h2 class="text-3xl font-semibold text-green-700 mb-5">Explore Categories</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            <!-- General Discussion -->
            @foreach($categories as $category)
                <div
                    class="bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 ease-in-out hover:scale-105 transform">
                    <div class="flex items-center space-x-4">
                        <span
                            class="bg-green-500 text-white p-3 rounded-full text-xl">{{$category->category_icon}}</span>
                        <h3 class="text-2xl font-semibold">{{$category->category_name}}</h3>
                    </div>
                    <p class="mt-4 text-gray-600">Discuss any topic that interests you, from news to personal
                        experiences!</p>
                </div>
            @endforeach
        </div>
    </section>


    <!-- Latest Posts Section -->
    <section class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-6">

            <h2 class="text-3xl font-semibold text-green-700 mb-6">SON PAYLAŞILANLAR</h2>
            <div class="space-y-6">
                @foreach($forums as $forum)
                <div class="bg-gray-100 p-6 rounded-lg shadow-lg hover:bg-gray-200 transition duration-200 ease-in-out">
                    <h3 class="font-semibold text-xl">{{$forum->forum_name}}</h3>
                    <p class="text-gray-700 mt-2">{{$forum->description}}</p>
                    <!-- Likes and Comments Section -->
                    <div class="flex items-center justify-between mt-4">
                        <button class="bg-gray-300 text-gray-700 px-4 py-2 rounded-full text-sm hover:bg-gray-400">❤️
                            Like
                        </button>
                        <div class="flex items-center space-x-4">
                            <button class="text-sm text-gray-600">💬 Comment</button>
                            <button class="text-sm text-blue-500">📤 Share</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

@endsection
