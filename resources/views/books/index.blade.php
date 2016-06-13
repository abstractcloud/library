@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3>Books Library</h3>
        <a href="/books/create" class="btn btn-success lib-btn">Add book</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Author</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>  
    </div>
</div>
@endsection