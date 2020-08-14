@extends('twelve_constellations.base')
@section('content')
    @inject('TwelveConstellationsPresenter','Jubilee\Click108\Presenter\TwelveConstellationsPresenter)
    <div class="row">
        <div class="table-responsive">
            <div class="row">
                <table class="table">

                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">星座名稱</th>
                        <th scope="col">整體評分分數</th>
                        <th scope="col">整體內容</th>
                        <th scope="col">愛情評分分數</th>
                        <th scope="col">愛情內容</th>
                        <th scope="col">事業評分分數</th>
                        <th scope="col">事業內容</th>
                        <th scope="col">財運評分分數</th>
                        <th scope="col">財運內容</th>
                        <th scope="col">日期</th>
                        <th scope="col"></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lists as $list)
                        <tr>
                            <th scope="row">{{$list->getKey()}}</th>
                            <td>{{$list->name}}</td>
                            <td>{{$TwelveConstellationsPresenter->mapToStart($list->entire_score)}}</td>
                            <td>{{$TwelveConstellationsPresenter->subContent($list->entire_content)}}</td>
                            <td>{{$TwelveConstellationsPresenter->mapToStart($list->love_score)}}</td>
                            <td>{{$TwelveConstellationsPresenter->subContent($list->love_content)}}</td>

                            <td>{{$TwelveConstellationsPresenter->mapToStart($list->career_score)}}</td>
                            <td>{{$TwelveConstellationsPresenter->subContent($list->career_content)}}</td>
                            <td>{{$TwelveConstellationsPresenter->mapToStart($list->fortune_score)}}</td>
                            <td>{{$TwelveConstellationsPresenter->subContent($list->fortune_content)}}</td>
                            <td>{{$list->day}}</td>
                            <td>
                                <a href="{{route('twelve_constellations.info',['id'=>$list->getKey()])}}">
                                    <input class="btn btn-info btn-sm" type="button" value="info">
                                </a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-sm-6 ">

                </div>
            </div>

        </div>
    </div>
    <div class="row">
        {{$lists->render("pagination::bootstrap-4")}}
    </div>

@endsection
