@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Посты</div>

                    <div class="panel-body">
                        <table class="table">
                            @foreach ($posts as $post)
                                <tr>
                                    <td><a href="/post/{{ $post->id}}">{{ $post->id }}</a></td>
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
