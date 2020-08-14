@extends('twelve_constellations.base')
@section('content')
    @inject('TwelveConstellationsPresenter','Jubilee\Click108\Presenter\TwelveConstellationsPresenter)

    <div class="row">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">星座名稱</h5>
                <p class="card-text">{{$info->name}}</p>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="card-body">
                        <h5 class="card-title">整體運勢評分</h5>
                        <p class="card-text">
                            {{$TwelveConstellationsPresenter->mapToStart($info->entire_score)}}
                        </p>

                    </div>

                </li>
                <li class="list-group-item">
                    <div class="card-body">
                        <h5 class="card-title">整體運勢內容</h5>

                        <p class="card-text">
                            {{$info->entire_content}}</p>

                    </div>

                </li>
                <li class="list-group-item">
                    <div class="card-body">
                        <p class="card-title">愛情運勢評分</p>

                        <p class="card-text">
                            {{$TwelveConstellationsPresenter->mapToStart($info->love_score)}}
                        </p>

                    </div>
                </li>
                <li class="list-group-item">
                    <div class="card-body">
                        <h5 class="card-title">愛情運勢內容</h5>

                        <p class="card-text">{{$info->love_content}}</p>

                    </div>
                </li>
                <li class="list-group-item">
                    <div class="card-body">
                        <h5 class="card-title">事業運勢評分</h5>

                        <p class="card-text">
                            {{$TwelveConstellationsPresenter->mapToStart($info->career_score)}}
                        </p>

                    </div>
                </li>

                <li class="list-group-item">
                    <div class="card-body">
                        <h5 class="card-title">事業運勢內容數</h5>

                        <p class="card-text">

                            {{$info->career_content}}
                        </p>

                    </div>
                </li>

                <li class="list-group-item">
                    <div class="card-body">
                        <h5 class="card-title">財運運勢評分</h5>

                        <p class="card-text">
                            {{$TwelveConstellationsPresenter->mapToStart($info->fortune_score)}}
                        </p>

                    </div>
                </li>

                <li class="list-group-item">
                    <div class="card-body">
                        <h5 class="card-title">財運運勢內容</h5>

                        <p class="card-text">{{$info->fortune_content}}</p>

                    </div>
                </li>
                <li class="list-group-item">
                    <div class="card-body">
                        <h5 class="card-title">日期</h5>

                        <p class="card-text">{{$info->day}}</p>

                    </div>
                </li>
            </ul>
            <div class="card-body">
                <a href="{{route('twelve_constellations.index')}}" class="btn btn-sm btn-primary">Back</a>
            </div>

        </div>

    </div>

@endsection
