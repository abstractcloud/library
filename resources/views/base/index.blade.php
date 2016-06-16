@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="row">
            <form class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" id="InputAAuthor" placeholder="Author">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" id="InputDate" placeholder="Дата">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" id="InputDate" placeholder="Дата">
                </div>
                <br>
                <div class="form-group">
                    <input type="text" name="hall" class="form-control" placeholder="Hall">
                </div>
                <div class="form-group">
                    <input type="text" name="shelving" class="form-control" placeholder="Shelving">
                </div>
                <div class="form-group">
                    <input type="text" name="bookshelf" class="form-control" placeholder="Bookshelf">
                </div>
                <div class="form-group">
                    <input type="text" name="position" class="form-control" placeholder="position">
                </div>
                <button type="submit" class="btn btn-info">Search</button>
            </form>
        </div>
        <div class="row">
            @foreach($books as $book)
            <div class="book-info">
                <h4>{{ $book->name }}</h4>
                <div class="book-img">
                    <img src="/img/upload/{{ $book->preview }}" alt="">
                </div>
                <p class="book-description">{{ $book->description }}</p>
                <div>
                    <a class="btn btn-primary" href="#" role="button">View details »</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
@endsection