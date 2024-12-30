@extends('main.layout')
@section('content')

    <div class="container mx-auto p-6">
        <!-- Başlık -->
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Yeni Forum Ekle</h1>

        <!-- Forum Ekleme Formu -->
        <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
            <form action="/forum/add" method="POST">
                @csrf

                <!-- Forum Adı -->
                <div class="mb-4">
                    <label for="forum_name" class="block text-sm font-medium text-gray-700 mb-1">Forum Adı</label>
                    <input type="text" id="forum_name" name="forum_name"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="Forum başlığını giriniz" required>
                </div>

                <!-- Kategori -->
                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                    <select id="category" name="category"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                        <option value="">Kategori seçiniz</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Forum Açıklaması -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Forum Açıklaması</label>
                    <textarea id="description" name="description" rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                              placeholder="Forum açıklamasını giriniz" required></textarea>
                </div>

                <!-- Tartışma Başlığı -->
                <div class="mb-4">
                    <label for="discussion_title" class="block text-sm font-medium text-gray-700 mb-1">Tartışma Başlığı</label>
                    <input type="text" id="discussion_title" name="discussion_title"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="Tartışma başlığını giriniz" required>
                </div>

                <!-- Tartışma İçeriği -->
                <div class="mb-4">
                    <label for="discussion_content" class="block text-sm font-medium text-gray-700 mb-1">Tartışma İçeriği</label>
                    <textarea id="discussion_content" name="discussion_content" rows="4"
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                              placeholder="Tartışma içeriğini giriniz" required></textarea>
                </div>

                <!-- Kaydet Butonu -->
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Kaydet
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection




