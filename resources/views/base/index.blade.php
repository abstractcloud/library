@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-md-8">
            <form action="{{ url('/') }}">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="author" class="form-control" id="InputAAuthor" placeholder="Author">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="datestart" class="form-control" id="InputDate" placeholder="Дата">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="dateend" class="form-control" id="InputDate" placeholder="Дата">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-1">
                        <input type="text" name="hall" class="form-control" placeholder="H">
                    </div>
                    <div class="col-md-1">
                        <input type="text" name="shelving" class="form-control" placeholder="S">
                    </div>
                    <div class="col-md-1">
                        <input type="text" name="bookshelf" class="form-control" placeholder="B">
                    </div>
                    <div class="col-md-1">
                        <input type="text" name="position" class="form-control" placeholder="P">
                    </div>
                    <button type="submit" class="btn btn-info">Search</button>  
                </div>
                
            </form>
        <div class="row">
            @foreach($books as $book)
            <div class="book-info">
                <h4><a href="#author" >{{ $book->name }}</a></h4>
                <small>Date: {{ date('d.m.Y', strtotime($book->date)) }}</small>
                <br>
                <p>Status: {{ $book->status }}</p>
                <p>Location: H{{ $book->hall }} S{{ $book->shelving }} B{{ $book->bookshelf }} P{{ $book->position }}</p>
                <div class="book-img">
                    <img src="/img/upload/{{ $book->preview }}" alt="">
                </div>
                <br>
                <p>
                    @foreach($book->authors as $a)
                        <a href="#author" >{{ $a->author }} </a> 
                    @endforeach
                </p>
                <p class="book-description">{{ $book->description }}</p>
                <div>
                    <a class="btn btn-primary" href="#" role="button">Read</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-4 book-statistic">
        <nav class="book-top">
            <a href="{{ url('/') }}" > All </a> 
            <a href="{{ url('/?top=year') }}" > Year </a> 
            <a href="{{ url('/?top=month') }}" > Month </a> 
            <a href="{{ url('/?top=week') }}" > Week </a> 
        </nav>
        <div class="row">
            <h3>TOP 10 Books</р3>
            <ol class="book-top-list">
                @foreach($topbooks as $item)
                <li><a href="#">{{ $item->name }}</a></li>
                @endforeach
            </ol>
        </div>
        
        <div class="row">
            <h3>TOP 10 Authors</р3>
            <ol class="book-top-list">
                @foreach($topauthors as $item)
                <li><a href="#">{{ $item->author }}</a></li>
                @endforeach
            </ol>
        </div>
        
    </div>
</div>
@endsection