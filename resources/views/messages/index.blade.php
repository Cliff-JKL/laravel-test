<!-- resources/views/messages/index.blade.php -->

@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->

    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма ввода и отправки сообщения -->
        <form action="{{ url('messages') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Текст сообщения -->
            <div class="form-group">
                <label for="message" class="col-sm-3 control-label">Сообщение</label>

                <div class="col-sm-6">
                    <input type="text" name="text" id="message-name" class="form-control">
                </div>
            </div>

            <!-- Кнопка отправления сообщения -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Отправить
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Предыдущие сообщения -->
    @if (count($messages) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Текущее сообщение
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>Message</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <!-- Текст сообщения -->
                            <td class="table-text">
                                <div>{{ $message->text }}</div>
                            </td>

                            <!-- Кнопка Удалить -->
                            <td>
                                <form action="{{ url('message/'.$message->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-message-{{ $message->id }}" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Удалить
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection