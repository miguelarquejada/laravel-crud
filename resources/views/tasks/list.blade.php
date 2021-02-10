@extends('layouts.app')
@section('title', 'Listagem de tarefas')
@section('content')
    <h1>Listagem</h1>
    <a href="{{ route('tasks.add') }}">Adicionar nova tarefa</a>
    @if (count($tasks) > 0)
        <ul>
            @foreach ($tasks as $task)
                <li>
                    <span style={{ $task->checked ? "text-decoration:line-through" : '' }}>
                        {{ $task->title }}
                    </span> 
                    <a href="{{ route('tasks.check', ['id' => $task->id]) }}">[ {{ $task->checked ? 'Desmarcar' : 'Marcar' }} ]</a>
                    <a href="{{ route('tasks.edit', ['id' => $task->id]) }}">[ Editar ]</a>
                    <a href="{{ route('tasks.delete', ['id' => $task->id]) }}" onclick="return confirm('Deseja mesmo excluir?')">[ Excluir ]</a>
                </li>
            @endforeach
        </ul>
    @else
        <span>Não há itens a serem listados</span>
    @endif
@endsection