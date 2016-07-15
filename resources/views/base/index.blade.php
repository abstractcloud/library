@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-md-9">
            <form action="{{ url('/') }}">
                <div class="row filter-inputs">
                    <div class="col-md-3">
                        <input type="date" name="datestart" class="form-control" id="InputDate" placeholder="Дата">
                    </div>
                    <div class="col-md-3">
                        <input type="date" name="dateend" class="form-control" id="InputDate" placeholder="Дата">
                    </div>
                </div>
                <br>
                <div class="row filter-inputs">
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
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-info">Search</button>
                    </div>
                </div>
                
            </form>
        
            {{--*/ $i = 3 /*--}}
            @foreach($books as $book)
            
            @if($i % 3 == 0)
            <div class="row">
            
            {{--*/ $i++ /*--}}
            
            @endif
            
            <div class="book-info col-md-3">
                <h4><a href="#book" >{{ $book->name }}</a></h4>
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
                <p class="book-description">{{ str_limit($book->description, 150) }}</p>
                <div>
                    <a class="btn btn-primary" href="#" role="button">Read</a>
                </div>
            </div>
            
            @if($i % 3 == 0)
            </div>
            @endif
            
            @endforeach
        </div>
    </div>
    <div class="col-md-3 book-statistic">
        <div class="row">
            <div class="col-md-12">
                <nav class="book-top">
                    <a href="{{ url('/') }}" > All </a> 
                    <a href="{{ url('/?top=year') }}" > Year </a> 
                    <a href="{{ url('/?top=month') }}" > Month </a> 
                    <a href="{{ url('/?top=week') }}" > Week </a> 
                </nav>
                <div class="row">
                    <h3>TOP 10 Books</h3>
                    <ol class="book-top-list">
                        @foreach($topbooks as $item)
                        <li><a href="#">{{ $item->name }}</a></li>
                        @endforeach
                    </ol>
                </div>

                <div class="row">
                    <h3>TOP 10 Authors</h3>
                    <ol class="book-top-list">
                        @foreach($topauthors as $item)
                        <li><a href="#">{{ $item->author }}</a></li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection