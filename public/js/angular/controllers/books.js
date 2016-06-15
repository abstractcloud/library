library.controller('booksCtrl', function ($scope, $http, $location) {
    $http.get('/api/books/get').success(function(books){
        $scope.books = books;
    });
    
    $scope.delete = function(id){
        $http.delete('/api/book/delete/' + id).success(function(books){
            $scope.books = books;
        });
    }
});

library.controller('booksNewCtrl', function ($scope, $http, $location) {
    var self = this;
    $scope.selected = [];

    $http.get('/api/authors/get').success(function(authors){
        $scope.authors = authors;
    });
    
    $http.get('/api/book/status').success(function(status){
        $scope.status = status;
    });
    
    $scope.additem = function(i){
        $scope.selected.push({
            id: i.id,
            author: i.author
        });
    }
    
    $scope.loadfile = function(f){
        $scope.book.preview = f;
    }
    
    $scope.create = function(){

        $scope.book.authors = $scope.selected;
        $scope.book.location = $scope.location;
        $http.put('/api/book/create', $scope.book).success(function(data){
            $location.path('/');                      
        });
    }
});

library.controller('booksUpdtCtrl', function ($scope, $http, $location, $routeParams) {
    $http.get('/api/authors/get').success(function(authors){
        $scope.authors = authors;
    });
    
    $http.get('/api/book/status').success(function(status){
        $scope.status = status;
    });
    
    $http.get('/api/book/get/' + $routeParams.id).success(function(book){
        $scope.book = book;
    });
    
    $scope.update = function(){
        console.log($scope.book);
        $http.patch('/api/book/update', $scope.book).success(function(data){
            $location.path('/');             
        });
    }
});