<!-- resources/views/messages/index.blade.php -->

@extends('layouts.app')

@section('content')

    <div class="panel-body">
        <!-- Display input errors -->
    @include('common.errors')

    <!-- Sending message form -->
        <form action="{{ url('message') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Message Text -->
            <div class="form-group">
                <label for="message" class="col-sm-3 control-label">Message:</label>

                <div class="col-sm-6">
                    <input type="text" name="text" id="message-name" class="form-control">
                </div>
            </div>

            <!-- "Friends" list -->

            <div class="form-group">
                <label for="destination-id" class="col-sm-3 control-label">To:</label>

                <div class="col-sm-2">
                    <select class="form-control" id="destination-id" name="destination_id">
                        @if(count($friends) > 0)
                            @foreach($friends as $friend)
                                <option value="{{$friend->id}}">{{$friend->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            <!-- Send button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-info">
                        <i class="fa fa-paper-plane"></i>&nbsp;&nbsp;Send
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Last messages -->
    @if (!is_null($allMessages) && count($allMessages) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Last messages
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <thead>
                    <th>From</th>
                    <th>To</th>
                    <th>Message</th>
                    <th>&nbsp;</th>
                    </thead>

                    <tbody>
                    @foreach ($allMessages as $message)
                        <tr>
                            <!-- From -->
                            <td class="table-text">
                                <div>{{$message->user->name}}</div>
                            </td>
                            <!-- To -->
                            <td class="table-text">
                                <div>{{$message->destinationUser->name}}</div>
                            </td>
                            <!-- Message Text -->
                            <td class="table-text">
                                <div>{{ $message->text }}</div>
                            </td>

                            <!-- Delete button -->
                            <td>
                                <form action="{{ url('message/'.$message->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-message-{{ $message->id }}" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
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