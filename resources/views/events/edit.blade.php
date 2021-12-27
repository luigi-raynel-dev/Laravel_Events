@extends('layouts.main')

@section('title','Editando: '.$event->title)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Editando: {{ $event->title }}</h1>
  <form action="/events" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="image">Imagem do Evento:</label>
      <input required type="file" class="form-control-file" id="image" name="image">
      <img src="/img/events/{{ $event->image }}" alt="{{ $event->image }}" class="image-preview">
    </div>
    <div class="form-group">
      <label for="title">Evento:</label>
      <input value="{{ $event->title }}" required type="text" class="form-control" name="title" id="title" placeholder="Nome do evento:">
    </div>
    <div class="form-group">
      <label for="title">Data do Evento:</label>
      <input value="{{ $event->date->fortmat('Y-m-d') }}" required type="date" class="form-control" name="date" id="date" placeholder="dd/mm/yy">
    </div>
    <div class="form-group">
      <label for="city">Cidade:</label>
      <input value="{{ $event->city }}" required type="text" class="form-control" id="city" name="city" placeholder="Cidade do evento:">
    </div>
    <div class="form-group">
      <label for="private">O evento é privado?</label>
      <select name="private" id="private" class="form-control">
        <option value="0">Não</option>
        <option {{ $event->private == 1 ? 'selected=""' : '' }} value="1">Sim</option>
      </select>
    </div>
    <div class="form-group">
      <label for="description">Descrição:</label>
      <textarea required id="description" name="description" class="form-control" placeholder="O que vai acontecer no evento?">{{ $event->description }}</textarea>
    </div>
    <div class="form-group">
      <label for="description">Infraestrutura:</label>
      <div class="form-group">
        <input type="checkbox" name="items" value="Cadeiras" id=""> Cadeiras
      </div>
      <div class="form-group">
        <input type="checkbox" name="items" value="Palco" id=""> Palco
      </div>
      <div class="form-group">
        <input type="checkbox" name="items" value="Open Bar" id=""> Open Bar
      </div>
      <div class="form-group">
        <input type="checkbox" name="items" value="Open Food" id=""> Open Food
      </div>
      <div class="form-group">
        <input type="checkbox" name="items" value="Brindes" id=""> Brindes
      </div>
    </div>
    <input type="submit" value="Editar Evento" name="" class="btn btn-primary">
  </form>
</div>

@endsection