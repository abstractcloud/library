library.controller('booksCtrl', function ($scope, $http, $location) {
    $http.get('/api/books/get').success(function(books){
        $scope.books = books;
    });
    
    $scope.delete = function(id){
        $http.delete('/api/book/delete/' + id).success(function(book){
            $scope.book = book;
        });
    }
});

library.controller('booksNewCtrl', function ($scope, $http, $location) {
    var self = this;
    $scope.selected = [];

    $http.get('/api/authors/get').success(function(authors){
        $scope.authors = authors;
    });
    
    $scope.create = function(){
        $http.put('/api/book/create', $scope.author).success(function(data){
            $location.path('/');                      
        });
    }
});

library.controller('booksUpdtCtrl', function ($scope, $http, $location, $routeParams) {
    console.log($routeParams);
    $http.get('/api/book/get/' + $routeParams.id).success(function(book){
        $scope.book = book;
    });
    
    $scope.update = function(){
        console.log($scope.book);
        $http.patch('/api/book/update', $scope.author).success(function(data){
            $location.path('/');             
        });
    }
});