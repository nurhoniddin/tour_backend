<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/images/bg-themes/zomin.png') }}" style="width:189px" class="logo-icon" alt="logo icon">
        </a>
    </div>
    <ul class="sidebar-menu do-nicescrol">
        <li class="sidebar-header"></li>
        <li>
            <a href="{{ route('home') }}">
                <i class="fa fa-home"></i> <span class="text-uppercase">Bosh sahifa</span>
            </a>
        </li>
        <li class="{{ request()->routeIs('category.index') ? 'active' : '' }}">
            <a  href="{{ route('category.index') }}">
                <i class="fa fa-list"></i> <span class="text-uppercase">Kategoriyalar
                    <span class="badge badge-primary">
                            @php
                                echo \App\Models\Category::all()->count();
                            @endphp
                    </span>
                </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('posts.index') ? 'active' : '' }}">
            <a href="{{ route('posts.index') }}">
                <i class="fa fa-newspaper-o"></i> <span class="text-uppercase">Yangiliklar
                    <span class="badge badge-primary">
                      @php
                          echo \App\Models\Post::all()->count();
                      @endphp
                    </span>
                </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('gcategory.index') ? 'active' : '' }}">
            <a href="{{ route('gcategory.index') }}">
                <i class="fa fa-photo"></i> <span class="text-uppercase">Gallery Kategory
                    <span class="badge badge-primary">
                      @php
                          echo \App\Models\Gcategory::all()->count();
                      @endphp
                    </span>
                </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('gallery.index') ? 'active' : '' }}">
            <a href="{{ route('gallery.index') }}">
                <i class="fa fa-file-image-o"></i> <span class="text-uppercase">Gallery
                    <span class="badge badge-primary">
                      @php
                          echo \App\Models\Gallery::all()->count();
                      @endphp
                    </span>
                </span>
            </a>
        </li>
{{--        dropdown new menu--}}
        {{--        dropdown new menu--}}
{{--        <li class="{{ request()->routeIs('tags.index') ? 'active' : '' }}">--}}
{{--            <a href="{{ route('tags.index') }}">--}}
{{--                <i class="fa fa-tags"></i> <span class="text-uppercase">Teglar--}}
{{--              <span class="badge badge-primary">--}}
{{--                      @php--}}
{{--                          echo \App\Models\Tag::all()->count();--}}
{{--                      @endphp--}}
{{--              </span>--}}
{{--                </span>--}}
{{--            </a>--}}
{{--        </li>--}}


{{--        <li class="{{ request()->routeIs('questions.index') ? 'active' : '' }}">--}}
{{--            <a href="{{ route('question.index') }}">--}}
{{--                <i class="fa fa-question"></i> <span class="text-uppercase">Savollar ---}}
{{--                    <span class="badge badge-primary">--}}
{{--                        @php--}}
{{--                            echo \App\Models\Question::all()->count();--}}
{{--                        @endphp--}}
{{--                    </span>--}}
{{--                </span>--}}
{{--            </a>--}}
{{--        </li>--}}

        <li class="{{ request()->routeIs('contact.index') ? 'active' : '' }}">
            <a href="{{ route('contact.index') }}">
                <i class="fa fa-envelope "></i> <span class="text-uppercase">Murojatlar
                    <span class="badge badge-primary">
                           @php
                               echo \App\Models\Contact::all()->count();
                           @endphp
                    </span>
                </span>
            </a>
        </li>
{{--        <li class="{{ request()->routeIs('comment.index') ? 'active' : '' }}">--}}
{{--            <a href="{{ route('comment.index') }}">--}}
{{--                <i class="fa fa-list"></i> <span class="text-uppercase">Komment--}}
{{--                     <span class="badge badge-primary">--}}
{{--                      @php--}}
{{--                          echo \App\Models\Comment::all()->count();--}}
{{--                      @endphp--}}
{{--              </span>--}}
{{--                </span>--}}
{{--            </a>--}}
{{--        </li>--}}
        <li class="{{ request()->routeIs('page.index') ? 'active' : '' }}">
            <a href="{{ route('page.index') }}">
                <i class="fa fa-file-text-o"></i> <span class="text-uppercase">Platforma haqida
                     <span class="badge badge-primary">
                      @php
                          echo \App\Models\Page::all()->count();
                      @endphp
              </span>
                </span>
            </a>
        </li>

        <li class="{{ request()->routeIs('setting.index') ? 'active' : '' }}">
        <a href="{{ route('setting.index') }}">
            <i class="fa fa-gears"></i> <span class="text-uppercase">Sayt Malumotlari
                     <span class="badge badge-primary">
                      @php
                          echo \App\Models\Setting::all()->count();
                      @endphp
              </span>
                </span>
        </a>
        </li>

        <li class="{{ request()->routeIs('statistic.index') ? 'active' : '' }}">
            <a href="{{ route('statistic.index') }}">
                <i class="fa fa-bar-chart"></i> <span class="text-uppercase">Statistika
                     <span class="badge badge-primary">
                      @php
                          echo \App\Models\Setting::all()->count();
                      @endphp
              </span>
                </span>
            </a>
        </li>
        <li class="{{ request()->routeIs('logo.index') ? 'active' : '' }}">
            <a href="{{ route('logo.index') }}">
                <i class="fa fa-picture-o"></i> <span class="text-uppercase">Logolar
                     <span class="badge badge-primary">
                      @php
                          echo \App\Models\Logo::all()->count();
                      @endphp
              </span>
                </span>
            </a>
        </li>
    </ul>

</div>
<!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
	   <nav class="navbar navbar-expand">

		   <ul class="navbar-nav mr-auto align-items-center">
			   <li class="nav-item">
				   <a class="nav-link toggle-menu" href="javascript:void();">
					   <i class="icon-menu menu-icon"></i>
				   </a>
			   </li>
			   <div class="dropdown">
				   <button class="btn btn-outline-primary text-white dropdown-toggle border-0" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   Qonunchilik
				   </button>
				   <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> Ma'muriyatning vakolatlari</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="{{ route('decision.index') }}"> Prezident qаrоr va fаrmопlаri</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="{{ route('decision.index') }}"> Hukumat qarorlari</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#">Qoida va tavsiyalar</a></button>
				   </div>
			   </div>

			   <div class="dropdown">
				   <button class="btn btn-outline-primary text-white dropdown-toggle border-0" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   Ma'muriyat
				   </button>
				   <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="{{ route('staff.index') }}"> Boshqaruv</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="{{ route('staff.index') }}"> Ma'muriyat tuzilmasi</a></button>

				   </div>
			   </div>

			   <div class="dropdown">
				   <button class="btn btn-outline-primary text-white dropdown-toggle border-0" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   Xizmatlar
				   </button>
				   <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> E-Executive auksionida qatnashish tartibi</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> E-Executive auksionida sotish uсhuп mavjud bo'lgan уеr uchastkalari</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> Ariza|ar qabul qilish</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> Ochiq ma'lumotlar</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="{{ route('decision.index') }}"> Vitual qabul</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> Elektron hisobotlar</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> Bo'sh o'rinlar</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> Saytda ro'yxatdan o'ting</a></button>

				   </div>
			   </div>
			   <div class="dropdown">
				   <button class="btn btn-outline-primary text-white dropdown-toggle border-0" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   Afzalliklar
				   </button>
				   <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> Yashash uchun subsidiyalar ajratish</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> sanitar-gigienik binolar uchun уеr ajratish</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> Тurореrаtоrlаr va gidlar uсhuп grantlar ajratish</a></button>

				   </div>
			   </div>

			   <div class="dropdown">
				   <button class="btn btn-outline-primary text-white dropdown-toggle border-0" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   Jizzax viloyatining turizm salohiyati
				   </button>
				   <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="{{ route('decision.index') }}"> Roliklar</a></button>
{{--					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> Маqоlаlаr</a></button>--}}
					   <button class="dropdown-item" type="button"> <a class="btn btn-outline-primary text-white" href="#"> Sayyohlik yo'nalishlari</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> Joylashtirish vositalari</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> Diqqatga sаzоvor joylar</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> Ish olib borilmoqda</a></button>
				   </div>
			   </div>
			   <div class="dropdown">
				   <button class="btn btn-outline-primary text-white dropdown-toggle border-0" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					   Investorlar
				   </button>
				   <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="{{ route('investor.index') }}">suffa</a></button>
					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="{{ route('investor.index') }}">o'riklisoy</a></button>
				   </div>
			   </div>

{{--			   <div class="dropdown">--}}
{{--				   <button class="btn btn-outline-primary text-white dropdown-toggle border-0" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--					   Aloqa--}}
{{--				   </button>--}}
{{--				   <div class="dropdown-menu" aria-labelledby="dropdownMenu2">--}}
{{--					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> Ma'muriyat bilan aloqa цsullari</a></button>--}}
{{--					   <button class="dropdown-item" type="button"><a class="btn btn-outline-primary text-white" href="#"> Ijtimoiy tarmoqlardagi sahifalar</a></button>--}}
{{--				   </div>--}}
{{--			   </div>--}}
		   </ul>

		   <ul class="navbar-nav align-items-center right-nav-link">

			   <li class="nav-item">
				   <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                    <span class="user-profile">
                        <img src="{{ asset('assets/admin.jpg') }}" class="img-circle"
                             alt="user avatar"></span>
				   </a>
				   <ul class="dropdown-menu dropdown-menu-right">
					   <li class="dropdown-item user-details">
						   <a href="javaScript:void();">
							   <div class="media">
								   <div class="avatar"><img class="align-self-start mr-3"
								                            src="{{ asset('assets/admin.jpg') }}" alt="user avatar">
								   </div>
								   <div class="media-body">
									   <h6 class="mt-2 user-title">Role: <span class="badge badge-success">{{ Auth::user()->name ?? null }}</span></h6>
									   <p class="user-subtitle">{{ Auth::user()->email ?? null }}</p>
								   </div>
							   </div>
						   </a>
					   </li>
					   <li class="dropdown-item">
						   <form action="{{ route('logout') }}" method="post">
							   @csrf
							   <button type="submit" class="btn btn-success bg-transparient">
								   Chiqish
							   </button>
						   </form>
					   </li>
				   </ul>
			   </li>
		   </ul>
	   </nav>
</header>
