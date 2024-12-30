<!-- Navbar -->
<nav class="bg-gradient-to-r from-green-500 via-teal-500 to-blue-500 text-white p-5">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <a href="#" class="text-3xl font-bold tracking-tight">
            <img src="{{asset("assets/img/logo.png")}}" alt="Forum Logo" class="h-12 w-auto"></a>
        <div class="space-x-6">
            <div class="flex items-center space-x-4"> <!-- Flex container ile öğeleri yatayda hizalayalım -->
                @foreach($pages as $page)
                    @if($page->page_name == "Kayıt Ol / Giriş Yap")
                        @guest
                            <a href="{{$page->page_slug}}" class="flex items-center hover:text-gray-300">
                                <i class="fas fa-sign-in-alt mr-2"></i>{{$page->page_name}}
                            </a>
                        @else
                            <!-- Kullanıcı ikonunu göster -->
                            <a href="#" class="flex items-center hover:text-gray-300">
                                <i class="fas fa-user-circle text-xl mr-2"></i> <!-- Kullanıcı ikonu -->
                                <i class="hidden">Kullanıcı</i>
                            </a>
                             {{Auth::user()->user_name}}
                        @endguest
                    @else
                        <a href="{{$page->page_slug}}" class="hover:text-gray-300"><i>{{$page->page_name}}</i></a>
                    @endif
                @endforeach

                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="hover:text-gray-300">
                            <i class="fas fa-sign-out-alt mr-2"></i>Çıkış Yap
                        </button>
                    </form>

                @endauth
            </div>


        </div>
    </div>
</nav>
