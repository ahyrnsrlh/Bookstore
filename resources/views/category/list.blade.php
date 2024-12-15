@extends('_layouts.app')

@section('title', 'Bookstore')

@section('content')
    
  <livewire:book.group category="{{ $category->id }}" categoryName="{{ $category->name }}" />

@endsection