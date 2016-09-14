@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Личный кабинет</div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-5"></div>
                                <div class="col-xs-5" align="right">
                                    <a href="/user/{{$user['id']}}/edit" class="btn btn-info" role="button">Редактировать</a>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-xs-5">
                                        <img  src="http://laraz/{{$user['avatar']}}"/>
                                    </div>
                                <div class="col-xs-5">
                                    <span class="label label-default">Логин :</span> <input class="form-control" type="text" id="uname" value="{{$user['name']}}" disabled/>
                                </div>
                                <div class="col-xs-5">
                                    <span class="label label-default">Email :</span> <input class="form-control" type="email" id="uemail" value="{{$user['email']}}" disabled/>
                                </div>
                                <div class="col-xs-5">
                                    <span class="label label-default">Skype :</span> <input class="form-control" type="text" id="uskype" value="{{$user['skype']}}" disabled/>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
