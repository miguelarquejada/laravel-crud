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
    @if ($errors->any())
        <x-alert>
            @foreach ($errors->all() as $error)
                {{ $error }}<br/>
            @endforeach
        </x-alert>
    @endif
@endsection