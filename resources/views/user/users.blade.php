@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Личный кабинет</div>

                    <div class="panel-body">
                        <table class="table">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Skype</th>
                            <th></th>
                            @foreach ($users as $user)
                                <tr>
                                    <td><a href="/user/{{ $user->id}}">{{ $user->name }}</a></td>
                                    <td>{{ $user->email }}</td>  <td>{{ $user->skype }}</td>
                                    <td> <a href="/user/{{ $user->id}}/edit" class="btn btn-info" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
