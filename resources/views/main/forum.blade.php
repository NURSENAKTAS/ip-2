@extends('main.layout')
@section('content')
    <div class="container mx-auto p-6 space-y-8">
        <!-- Üst Başlık ve Buton -->
        <div class="flex justify-between items-center">
            <a href="/forum/add"
               class="inline-block px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-800 text-white font-semibold rounded-lg shadow hover:scale-105 transform transition duration-300 ease-in-out">
                + Yeni Forum Ekle
            </a>
        </div>

        <!-- Forum Listesi -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Forum Başlıkları</h2>
            <div class="divide-y divide-gray-200">
                @foreach($forums as $forum)
                    <!-- Forum Kartı -->
                    <div class="py-6">
                        <div class="flex items-center justify-between">
                            <a href="/discussion/{{$forum->id}}" class="text-lg font-bold text-blue-400 hover:underline">
                                {{ $forum->forum_name }}
                            </a>
                            <span class="text-sm text-gray-500">
                            Son Güncelleme: {{ $forum->updated_at ? $forum->updated_at->format('d M Y') : 'Güncellenmedi' }}
                        </span>
                        </div>

                        <!-- Tartışma Listesi -->
                        <div class="mt-4 space-y-4">
                            @foreach($forum->discussions->take(3) as $discussion)
                                <div class="bg-gray-50 p-4 rounded-lg shadow-sm hover:bg-gray-100 transition">
                                    <p class="text-base text-gray-800 font-medium">{{ $discussion->content }}</p>
                                    <p class="text-sm text-gray-600 mt-1">
                                        <span class="font-semibold">Yazar:</span> {{ $discussion->user->user_name }}
                                    </p>

                                    <!-- Yorumlar -->
                                    <div class="mt-2 pl-4 border-l-4 border-blue-500 space-y-2">
                                        <h4 class="text-sm font-semibold text-gray-700">Yorumlar:</h4>
                                        @foreach($discussion->comments->take(2) as $comment)
                                            <p class="text-sm text-gray-600">
                                                <span class="font-bold text-gray-800">#{{ $comment->user->user_name  }}:</span> {{ $comment->comment_text }}
                                            </p>
                                        @endforeach
                                        @if($discussion->comments->count() > 2)
                                            <a href="#" class="text-blue-600 text-sm font-medium hover:underline">Tüm yorumları gör</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
