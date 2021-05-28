@extends('layouts.app')

@section('content')
    <style>
        .card-counter{
            box-shadow: 4px 4px 20px #381383;
            margin: 5px;
            padding: 20px 10px;
            height: 100px;
            border-radius: 5px;
            transition: .3s linear all;
            background-color: #22143F;
            font-size: 41px;
        }

        .card-counter:hover{
            box-shadow: 4px 4px 20px #DADADA;
            transition: .3s linear all;
        }

        .card-counter.primary{
            background-color: #007bff;
            color: #FFF;
        }

        .card-counter.danger{
            background-color: #ef5350;
            color: #FFF;
        }

        .card-counter.success{
            background-color: #66bb6a;
            color: #FFF;
        }

        .card-counter.info{
            background-color: #26c6da;
            color: #FFF;
        }

        card-counter i {
            font-size: 5em;
            opacity: 0.4;
        }

        .card-counter .count-numbers{
            position: absolute;
            right: 35px;
            top: 20px;
            font-size: 32px;
            display: block;
        }

        .card-counter .count-name{
            position: absolute;
            right: 35px;
            top: 65px;

            text-transform: capitalize;
            opacity: 0.5;
            display: block;
            font-size: 18px;
        }
        .extra-menu{
            margin: 5%;

        }
        .extra-menu a{
            color: #fff;
        }
    </style>
    <div class="clearfix"></div>

    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card-counter">
                            <i class="fa fa-list"></i>
                            <span class="count-numbers">
                                @php
                                    echo \App\Models\Category::all()->count();
                                @endphp
                            </span>
                            <span class="count-name">Kategoriya</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter ">
                            <i class="fa fa-newspaper-o"></i>
                            <span class="count-numbers">
                                @php
                                    echo \App\Models\Post::all()->count();
                                @endphp
                            </span>
                            <span class="count-name">Yangiliklar</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter ">
                            <i class="fa fa-question"></i>
                            <span class="count-numbers">
                                 @php
                                     echo \App\Models\Question::all()->count();
                                 @endphp
                            </span>
                            <span class="count-name">Savollar</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter ">
                            <i class="fa fa-envelope"></i>
                            <span class="count-numbers">
                                 @php
                                     echo \App\Models\Contact::all()->count();
                                 @endphp
                            </span>
                            <span class="count-name">Murojatlar</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter ">
                            <i class="fa fa-tags"></i>
                            <span class="count-numbers">
                                 @php
                                     echo \App\Models\Tag::all()->count();
                                 @endphp
                            </span>
                            <span class="count-name">Teglar</span>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card-counter ">
                            <i class="fa fa-gears"></i>
                            <span class="count-numbers">
                                 @php
                                     echo \App\Models\Setting::all()->count();
                                 @endphp
                            </span>
                            <span class="count-name">Sayt Malumotlari</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-counter ">
                            <i class="fa fa-bar-chart"></i>
                            <span class="count-numbers">
                                 @php
                                     echo \App\Models\Statistic::all()->count();
                                 @endphp
                            </span>
                            <span class="count-name">Statistika</span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-counter ">
                            <i class="fa fa-picture-o"></i>
                            <span class="count-numbers">
                                 @php
                                     echo \App\Models\Logo::all()->count();
                                 @endphp
                            </span>
                            <span class="count-name">Logotiplar</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
       <div class="extra-menu">
           <div class="container">
               <div class="accordion" id="accordionExample" >
                   <div class="card mt-3">
                       <div class="card-header" id="headingOne">
                           <h2 class="mb-0">
                               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                   Qonunchilik
                               </button>
                           </h2>
                       </div>

                       <div id="collapseOne" class="collapse   " aria-labelledby="headingOne" data-parent="#accordionExample">
                           <div class="card-body">
                               <a class="btn btn-outline-primary" href="#"> Ma'muriyatning vakolatlari</a>
                               <a class="btn btn-outline-primary" href="{{ route('decision.index') }}"> Prezident qаrоr va fаrmопlаri</a>
                               <a class="btn btn-outline-primary" href="#"> Hukumat qarorlari</a>
                               <a class="btn btn-outline-primary" href="#">Qoida va tavsiyalar</a>
                           </div>
                       </div>

                       <div class="card-header" id="headingOne">
                           <h2 class="mb-0">
                               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#mamuriyat" aria-expanded="true" aria-controls="collapseOne">
                                   Ma'muriyat
                               </button>
                           </h2>
                       </div>

                       <div id="mamuriyat" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                           <div class="card-body">
                               <a class="btn btn-outline-primary" href="#"> Boshqaruv</a>
                               <a class="btn btn-outline-primary" href="#"> Ma'muriyat tuzilmasi</a>
                               <a class="btn btn-outline-primary" href="#"> xizmat vazifalari</a>
                           </div>
                       </div>

                       <div class="card-header" id="headingOne">
                           <h2 class="mb-0">
                               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#Xizmatlar" aria-expanded="true" aria-controls="collapseOne">
                                   Xizmatlar
                               </button>
                           </h2>
                       </div>

                       <div id="Xizmatlar" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                           <div class="card-body">
                               <a class="btn btn-outline-primary" href="#"> E-Executive auksionida qatnashish tartibi</a>
                               <a class="btn btn-outline-primary" href="#"> E-Executive auksionida sotish uсhuп mavjud bo'lgan уеr uchastkalari</a>
                               <a class="btn btn-outline-primary" href="#"> Ariza|ar qabul qilish</a>
                               <a class="btn btn-outline-primary" href="#"> Ochiq ma'lumotlar</a>
                               <a class="btn btn-outline-primary" href="#"> Vitual qabul</a>
                               <a class="btn btn-outline-primary" href="#"> Elektron hisobotlar</a>
                               <a class="btn btn-outline-primary" href="#"> Bo'sh o'rinlar</a>
                               <a class="btn btn-outline-primary" href="#"> Saytda ro'yxatdan o'ting</a>
                           </div>
                       </div>

                       <div class="card-header" id="headingOne">
                           <h2 class="mb-0">
                               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#Afzalliklar" aria-expanded="true" aria-controls="collapseOne">
                                   Afzalliklar
                               </button>
                           </h2>
                       </div>

                       <div id="Afzalliklar" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                           <div class="card-body">
                               <a class="btn btn-outline-primary" href="#"> Yashash uchun subsidiyalar ajratish</a>
                               <a class="btn btn-outline-primary" href="#"> sanitar-gigienik binolar uchun уеr ajratish</a>
                               <a class="btn btn-outline-primary" href="#"> Тurореrаtоrlаr va gidlar uсhuп grantlar ajratish</a>
                           </div>
                       </div>
                       <div class="card-header" id="headingOne">
                           <h2 class="mb-0">
                               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#jizzax" aria-expanded="true" aria-controls="collapseOne">
                                   Jizzax viloyatining turizm salohiyati
                               </button>
                           </h2>
                       </div>

                       <div id="jizzax" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                           <div class="card-body">
                               <a class="btn btn-outline-primary" href="#"> Roliklar</a>
                               <a class="btn btn-outline-primary" href="#"> Маqоlаlаr</a>
                               <a class="btn btn-outline-primary" href="#"> Sayyohlik yo'nalishlari</a>
                               <a class="btn btn-outline-primary" href="#"> Joylashtirish vositalari</a>
                               <a class="btn btn-outline-primary" href="#"> Diqqatga sаzочог joylar</a>
                               <a class="btn btn-outline-primary" href="#"> lsh olib borilmoqda</a>
                           </div>
                       </div>

                       <div class="card-header" id="headingOne">
                           <h2 class="mb-0">
                               <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#Aloqa" aria-expanded="true" aria-controls="collapseOne">
                                   Aloqa
                               </button>
                           </h2>
                       </div>

                       <div id="Aloqa" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                           <div class="card-body">
                               <a class="btn btn-outline-primary" href="#"> Ma'muriyat bilan aloqa цsullari</a>
                               <a class="btn btn-outline-primary" href="#"> Ijtimoiy tarmoqlardagi sahifalar</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
    </div>


    <!--End Dashboard Content-->
    <!--start overlay-->
    <div class="overlay toggle-menu"></div>
    <!--end overlay-->


    <!-- End container-fluid-->
    <!--End content-wrapper-->
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
@endsection
