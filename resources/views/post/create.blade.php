@extends('layouts.app')

    <script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit</div>
                    <div class="panel-body">
                       <form method="POST" action="/posts/add" class="form-horizontal panel">
                           {{ csrf_field() }}
                            <div class="form-group checkbox pull-right">
                                <label>
                                    {!! Form::checkbox('active') !!}
                                    Опубликовано
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="title" class="col-md-4 control-label">Название</label>{!! Form::input('text', 'title', null, ['class' => 'form-control'], 'Название')!!}
                            </div>

                            <div class="form-group {!! $errors->has('slug') ? 'has-error' : '' !!}">
                                {!! Form::label('slug', 'Ссылка : ', ['class' => 'control-label']) !!}
                                {!! url('/') . '/blog/' . Form::text('slug', null, ['id' => 'permalien']) !!}
                                <small class="text-danger">{!! $errors->first('slug') !!}</small>
                            </div>

                            <div class="form-group">
                                {!! Form::label('summary', 'Краткое описание : ', ['class' => 'control-label']) !!}
                                {!! Form::textarea('summary', null, ['class' => 'control-label'])!!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('content', 'Контент : ', ['class' => 'control-label']) !!}
                                {!! Form::textarea('content', null, ['class' => 'control-label'])!!}
                            </div>

                            <div class="form-group">
                                {!! Form::label('tags', 'Tags : ', ['class' => 'control-label']) !!}
                                {!! Form::input('text', 'tags', null, ['class' => 'form-control'], 'Название')!!}
                            </div>
                            {!! Form::submit(trans('Submit')) !!}


                       </form>
                        <script>
                            var config = {
                                codeSnippet_theme: 'Monokai',
                                language: '{{ config('app.locale') }}',
                                height: 100,
                                filebrowserBrowseUrl: '{!! url('/') !!}',
                                toolbarGroups: [
                                    { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                                    { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
                                    { name: 'links' },
                                    { name: 'insert' },
                                    { name: 'forms' },
                                    { name: 'tools' },
                                    { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
                                    { name: 'others' },
                                    //'/',
                                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                                    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                                    { name: 'styles' },
                                    { name: 'colors' }
                                ]
                            };
                            CKEDITOR.replace( 'summary' ,config);

                            config['height'] = 400;

                            CKEDITOR.replace( 'content', config);

                            $("#title").keyup(function(){
                                var str = sansAccent($(this).val());
                                str = str.replace(/[^a-zA-Z0-9\s]/g,"");
                                str = str.toLowerCase();
                                str = str.replace(/\s/g,'-');
                                $("#permalien").val(str);
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
