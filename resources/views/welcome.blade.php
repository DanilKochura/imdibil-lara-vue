@extends('app')


@section('meta')
    <meta name="keywords" content="киноклуб, мгту"/>
    <meta name="description" content="Статистика оценок сообщества"/>
    <title>Статистика</title>
    <meta property="og:site_name" content="IMDibil - статистика">
    <meta property="og:title" content="Статистика заседаний">

@endsection

@section('content')

   <div class="container mt-5">
       <ul class="d-flex justify-content-center nav nav-pills nav-sm mb-3" id="myTab">
           <li class="nav-item" role="presentation">
               <a class="nav-link link-light active fs-5" id="user_rates-tab" data-bs-toggle="tab" href="#user_rates" role="tab" aria-controls="user_rates" aria-selected="true">Графики оценок</a>
           </li>
           <li class="nav-item" role="presentation">
               <a class="nav-link  link-light  fs-5" id="correlations-tab" data-bs-toggle="tab" href="#correlations" role="tab" aria-controls="correlations" aria-selected="false">Корреляции</a>
           </li>
           <li class="nav-item" role="presentation">
               <a class="nav-link  link-light  fs-5" id="average-tab" data-bs-toggle="tab" href="#average" role="tab" aria-controls="average" aria-selected="false">Средние</a>
           </li>
           <!--          <li class="nav-item" role="presentation">
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
           <div class="tab-pane fade" id="average" role="tabpanel" aria-labelledby="average-tab">
               <canvas id="average_rates"></canvas>
           </div>
           <div class="tab-pane fade" id="correlations" role="tabpanel" aria-labelledby="correlations-tab">
               <table class="table table-hover-custom">
                   <tbody>
                        <tr>
                            <th></th>
                            @foreach($correlations as $name => $array)
                                <th>{{$name}}</th>
                            @endforeach
                        </tr>
                        @foreach($correlations as $name => $array)
                            <tr>
                                <th>{{$name}}</th>
                                @foreach($array as $name1 => $value)
                                    @if($name1 == $name or $value === null)
                                        <th></th>
                                    @else
                                        <td class="{{$correlations[$name][$name1] >= 0.7 ? "text-success": ($value <= -0.7 ? 'text-danger' : '')}}">{{round($correlations[$name][$name1], 2)}}</td>
                                    @endif
                                @endforeach
                            </tr>
                        @endforeach
                   </tbody>
               </table>
           </div>
           <div class="tab-pane fade show active" id="user_rates" role="tabpanel" aria-labelledby="user_rates-tab">
               <canvas id="user_graph" class="chartjss"></canvas>

           </div>
       </div>
   </div>

@endsection

