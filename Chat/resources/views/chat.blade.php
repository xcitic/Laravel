@extends('layouts.app')

@section('content')
    <div class="row">
      <div class="panel panel-default">

        <div class="panel-heading">
          Chatroom
          <span class="badge pull-right">@{{ usersInRoom.length }}</span>
        </div>
        <div class="panel-body">
          <chat-log :messages="messages"></chat-log>
        </div>
        <div class="panel-footer">
          <chat-composer v-on:messagesent="addMessage"></chat-composer>
        </div>


      </div>
    </div>
@endsection
