@extends('layouts.template')

@section('content')
  @include('tasks.form', ['task' => $task])
@endsection
