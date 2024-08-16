@extends('app')


@section('meta')
    <meta name="keywords" content="киноклуб, мгту"/>
    <meta name="description" content="Статистика оценок сообщества"/>
    <title>Статистика</title>
    <meta property="og:site_name" content="IMDibil - статистика">
    <meta property="og:title" content="Статистика заседаний">

@endsection

@section('content')

   <div class="container mt-2">
       <ul class="d-flex justify-content-center nav nav-pills nav-sm mb-3" id="myTab">
           <li class="nav-item" role="user_rates">
               <a class="nav-link link-light active" id="user_rates-tab" data-bs-toggle="tab" href="#user_rates" role="tab" aria-controls="user_rates" aria-selected="true">Графики оценок</a>
           </li>
<!--           <li class="nav-item" role="presentation">
               <a class="nav-link  link-light" disabled id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Инструкция</a>
           </li>
           <li class="nav-item" role="presentation">
               <a class="nav-link link-light" disabled id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Корреляция оценок (пирсон)</a>
           </li>
           <li class="nav-item" role="presentation">
               <a class="nav-link link-light" disabled id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Близость интересов</a>
           </li>

           <li class="nav-item" role="presentation">
               <a class="nav-link link-light" disabled id="contact-tab" data-bs-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Графики по жанрам</a>
           </li>-->
       </ul>

       <div class="tab-content" id="myTabContent">
           <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">

                 </div>
           <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
               <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
           </div>
           <div class="tab-pane fade show active" id="user_rates" role="tabpanel" aria-labelledby="user_rates-tab">
               <canvas id="user_graph" class="chartjss"></canvas>

           </div>
       </div>
   </div>

@endsection

