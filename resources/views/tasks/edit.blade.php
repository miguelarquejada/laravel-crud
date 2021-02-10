@extends('layouts.app')
@section('title', 'Edição de tarefas')
@section('content')
    <h1>Edição</h1>
    <form method="post">
        @csrf
        <label>
            Título:<br>
            <input type="text" value="{{ $task->title }}" name="title">
            <button type="submit">Salvar</button>
        </label>
    </form>
    @if (session('warning'))
        <x-alert>{{ session('warning') }}</x-alert>
    @endif
@endsection