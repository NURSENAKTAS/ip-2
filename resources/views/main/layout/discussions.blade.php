@extends("main.layout")
@section("content")
    <div class="container mx-auto p-8 space-y-8">
        <!-- Tartışma Başlığı -->
        <div class="bg-white p-8 rounded-lg shadow-md border border-gray-200">

            <h1 class="text-2xl font-bold text-gray-800 mb-4">{{$discussions->title}} </h1>
            <p class="text-lg text-gray-700"> {{$discussions->content}} </p>
            <p class="text-sm text-gray-500 mt-4">
                <span class="font-semibold">Yazar:</span>  {{$user_name}}
            </p>
        </div>

        <!-- Yorumlar -->
        <div class="bg-gray-50 p-8 rounded-lg shadow-md border border-gray-300 space-y-6">
            <h2 class="text-xl font-semibold text-gray-800">Yorumlar</h2>

                <div class="p-4 bg-white rounded-lg shadow-sm border border-gray-200">
                    @foreach($comments as $comment)
                    <p class="text-sm text-gray-800">
                        <span class="font-bold text-gray-900"> {{$comment->user->user_name}} :</span>
                        {{$comment->comment_text}}
                    </p>
                    @endforeach
                </div>
        </div>

        <!-- Yeni Yorum Ekleme -->
        @if(Auth::user())
        <div class="bg-white p-4 rounded-lg shadow-md border border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Yorum Ekle</h3>
            <form action="/discussion/{{$discussions->id}}" method="POST" class="space-y-4">
                @csrf
                <textarea name="comment_text" class="w-full p-1 border rounded-s shadow-sm focus:ring focus:ring-blue-200" rows="2" placeholder="Yorumunuzu buraya yazın..." required></textarea>
                <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow-md hover:bg-blue-600 transition">
                    Gönder
                </button>
            </form>
        </div>
        @endif
    </div>

@endsection
