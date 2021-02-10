@extends('layouts.app')
@section('title', 'Adição de tarefas')
@section('content')
    <h1>Adição</h1>
    <form method="POST">
        @csrf
        <label>
            Título:<br>
            <input type="text" name="title">
        </label>
        <button type="submit">Adicionar</button>
    </form>
    @if (session('warning'))
        <x-alert>{{ session('warning') }}</x-alert>
    @endif
@endsection