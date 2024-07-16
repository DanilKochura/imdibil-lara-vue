@extends('app')


@section('content')
    <div class="container-fluid bg-main rad-0 main content py-2"  style="    height: 100%;">
        <div class="row totot ">
            <div class="col type-descr bg-main text-white  mb-3">
                <div class="container tour-table middle">
                    <div class="col-13">
                        @for($i = 0; $i < 4; $i++ )

                            <div class="cell-pair mb-4 modal-vote @if($pairs[$i]->winner) selected @endif" data-vote='{{$pairs[$i]->event_id}}' data-movies='{{json_encode(array('first'=>$pairs[$i]->firstMovie, 'second'=>$pairs[$i]->secondMovie, 'votes' => $pairs[$i]->votes), true)}}'>
                                <div class="cell"><img class="vote-image @if($pairs[$i]->winner == $pairs[$i]->secondMovie->id) opacity-25 @endif"
                                                       src="{{asset('/images/posters/'.$pairs[$i]->firstMovie->poster)}}">
                                </div>
                                <div class="cell"><img class="vote-image @if($pairs[$i]->winner == $pairs[$i]->firstMovie->id) opacity-25 @endif"
                                                       src="{{asset('/images/posters/'.$pairs[$i]->secondMovie->poster)}}">
                                </div>
                            </div>
                        @endfor

                    </div>
                    <div class="col-13">
                        @if($pairs2->count())

                            @for($i = 0; $i < 2; $i++ )

                                <div class="cell-pair mb-4 modal-vote @if($pairs2[$i]->winner) selected @endif" data-vote='{{$pairs2[$i]->event_id}}' data-movies='{{json_encode(array('first'=>$pairs2[$i]->firstMovie, 'second'=>$pairs2[$i]->secondMovie, 'votes' => $pairs2[$i]->votes), true)}}'>
                                    <div class="cell"><img class="vote-image @if($pairs2[$i]->winner == $pairs2[$i]->secondMovie->id) opacity-25 @endif"
                                                           src="{{asset('/images/posters/'.$pairs2[$i]->firstMovie->poster)}}">
                                    </div>
                                    <div class="cell"><img class="vote-image @if($pairs2[$i]->winner == $pairs2[$i]->firstMovie->id) opacity-25 @endif"
                                                           src="{{asset('/images/posters/'.$pairs2[$i]->secondMovie->poster)}}">
                                    </div>
                                </div>
                            @endfor
                        @else
                            <div class="cell-pair">
                                <div class="cell a-t1"> 2</div>
                                <div class="cell p-t1"> 3</div>
                            </div>
                            <div class="cell-pair">
                                <div class="cell a-t1"> 2</div>
                                <div class="cell p-t1"> 3</div>
                            </div>
                        @endif
                    </div>
                    <div class="col-13">
                        @if($pairs3->count())

                            @php($par = $pairs3[0])

                            <div class="cell-pair mb-4 modal-vote @if($par->winner) selected @endif" data-vote='{{$par->event_id}}' data-movies='{{json_encode(array('first'=>$par->firstMovie, 'second'=>$par->secondMovie, 'votes' => $par->votes), true)}}'>
                                <div class="cell"><img class="vote-image @if($par->winner == $par->secondMovie->id) opacity-25 @endif"
                                                       src="{{asset('/images/posters/'.$par->firstMovie->poster)}}">
                                </div>
                                <div class="cell"><img class="vote-image @if($par->winner == $par->firstMovie->id) opacity-25 @endif"
                                                       src="{{asset('/images/posters/'.$par->secondMovie->poster)}}">
                                </div>
                            </div>
                        @else
                        <div class="cell-pair">
                            <div class="cell a-t2"> 2</div>
                            <div class="cell p-t2"> 3</div>
                        </div>
                        @endif
                    </div>
                    <div class="col-22 col-final">
                        @if($pairs4->count())
                            @php($par = $pairs4[0])

                            <div class="cell-pair mb-4 modal-vote @if($par->winner) selected @endif" data-vote='{{$par->event_id}}' data-movies='{{json_encode(array('first'=>$par->firstMovie, 'second'=>$par->secondMovie, 'votes' => $par->votes), true)}}'>
                                <div class="cell"><img class="vote-image @if($par->winner == $par->secondMovie->id) opacity-25 @endif"
                                                       src="{{asset('/images/posters/'.$par->firstMovie->poster)}}">
                                </div>
                                <div class="cell"><img class="vote-image @if($par->winner == $par->firstMovie->id) opacity-25 @endif"
                                                       src="{{asset('/images/posters/'.$par->secondMovie->poster)}}">
                                </div>
                            </div>
                        @else
                        <div class=" row cell-pair final m-0">
                            <div class="cell a-t3"> 2</div>
                            <div class="cell p-t3"> 7</div>
                        </div>

                        @endif

                    </div>
                    <div class="col-13">
                        @if($pairs3->count())
                            @php($par = $pairs3[1])

                            <div class="cell-pair mb-4 modal-vote @if($par->winner) selected @endif" data-vote='{{$par->event_id}}' data-movies='{{json_encode(array('first'=>$par->firstMovie, 'second'=>$par->secondMovie, 'votes' => $par->votes), true)}}'>
                                <div class="cell"><img class="vote-image @if($par->winner == $par->secondMovie->id) opacity-25 @endif"
                                                       src="{{asset('/images/posters/'.$par->firstMovie->poster)}}">
                                </div>
                                <div class="cell"><img class="vote-image @if($par->winner == $par->firstMovie->id) opacity-25 @endif"
                                                       src="{{asset('/images/posters/'.$par->secondMovie->poster)}}">
                                </div>
                            </div>
                        @else
                        <div class="cell-pair">
                            <div class="cell a-t2"> 2</div>
                            <div class="cell p-t2"> 3</div>
                        </div>

                        @endif

                    </div>
                    <div class="col-13">
                        @if($pairs2->count())
                            @for($i = 2; $i < 4; $i++ )
                                @php($par = $pairs2[$i])

                                <div class="cell-pair mb-4 modal-vote @if($par->winner) selected @endif" data-vote='{{$par->event_id}}' data-movies='{{json_encode(array('first'=>$par->firstMovie, 'second'=>$par->secondMovie, 'votes' => $par->votes), true)}}'>
                                    <div class="cell"><img class="vote-image @if($par->winner == $par->secondMovie->id) opacity-25 @endif"
                                                           src="{{asset('/images/posters/'.$par->firstMovie->poster)}}">
                                    </div>
                                    <div class="cell"><img class="vote-image @if($par->winner == $par->firstMovie->id) opacity-25 @endif"
                                                           src="{{asset('/images/posters/'.$par->secondMovie->poster)}}">
                                    </div>
                                </div>
                            @endfor
                        @else
                        <div class="cell-pair">
                            <div class="cell a-t1"> 2</div>
                            <div class="cell p-t1"> 3</div>
                        </div>
                        <div class="cell-pair">
                            <div class="cell a-t1"> 2</div>
                            <div class="cell p-t1"> 3</div>
                        </div>
                        @endif

                    </div>
                    <div class="col-13">
                        @for($i = 4; $i < 8; $i++ )

                            <div class="cell-pair mb-4 modal-vote @if($pairs[$i]->winner) selected @endif" data-vote='{{$pairs[$i]->event_id}}' data-movies='{{json_encode(array('first'=>$pairs[$i]->firstMovie, 'second'=>$pairs[$i]->secondMovie, 'votes' => $pairs[$i]->votes), true)}}'>
                                <div class="cell"><img class="vote-image @if($pairs[$i]->winner == $pairs[$i]->secondMovie->id) opacity-25 @endif"
                                                       src="{{asset('/images/posters/'.$pairs[$i]->firstMovie->poster)}}">
                                </div>
                                <div class="cell"><img class="vote-image @if($pairs[$i]->winner == $pairs[$i]->firstMovie->id) opacity-25 @endif"
                                                       src="{{asset('/images/posters/'.$pairs[$i]->secondMovie->poster)}}">
                                </div>
                            </div>
                        @endfor

                    </div>
                </div>


            </div>


        </div>

        <div id="statsBySeasons">


        </div>
    </div>
    <div class="modal fade" id="pairVoteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Проголосовать</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                    <div class="row text-center">
                        <div class="col-6" id="first">

                            <a href="" target="_blank"><img src="" class="img-fluid rounded" id="first"
                                                            style="width: 150px; height: 200px" alt=""></a>
                            <button class="btn btn-warning mt-3 btn-vote">Проголосовать</button>
                            <div class="avatars mt-1 text-center">

                            </div>


                        </div>
                        <div class="col-6" id="second">
                            <a href="" target="_blank"><img src="" class="img-fluid rounded"
                                                            style="width: 150px; height: 200px" alt=""></a>
                            <button class="btn btn-warning mt-3 btn-vote">Проголосовать</button>
                            <div class="avatars mt-1 text-center">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <style>

        .col-13 {
            width: 13%;
            /* height: 20px; */
            /* background-color: white; */
            /* border: 1px solid red; */
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            flex-wrap: nowrap;
        }

        .col-22 {
            width: 22%;
            /* height: 20px; */
            /* background-color: white; */
            /* border: 1px solid red; */
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            flex-wrap: nowrap;
        }

        .tour-table {
            max-height: none;
        }

        .totot {
            height: 100%;
            margin-bottom: -40px;

        }

        .vote-image {
            width: 50px;
            height: 75px;
            border-radius: 5px;
        }

        .vote-image-final {
            width: 100px;
            height: 150px;
        }

        .cell {
            width: 50px;
            height: 75px;
        }

        .cell-f {
            width: 100px;
            height: 150px;
        }

        .cell-pair {
            display: flex;
            height: 100px;
        }



        .type-descr {
            border-radius: 0;
        }

        .cell-final {
            display: block;
        }
    </style>
@endsection

