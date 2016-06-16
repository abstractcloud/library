library.controller('booksCtrl', function ($scope, $http, $location) {
    $http.get('/api/books/get').success(function(books){
        $scope.books = books;
    });
    
    $scope.delete = function(id){
        $http.delete('/api/book/delete/' + id).success(function(books){
            console.log();
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
        console.log(f, "load");
       
        $scope.preview = f;
    }
    
    $scope.deleteimage = function(){
        console.log("delimg");
        $scope.preview = null;
        $('.img-preview > img').removeAttr('src');
        $('.upload-img').val('');
    }
    
    $scope.create = function(){
        $scope.book.preview = $('.img-preview > img').attr('src');
        $scope.book.authors = $scope.selected;
        $scope.book.location = $scope.location;
        $http.put('/api/book/create', $scope.book).success(function(data){
            $location.path('/');                      
        });
    }
});

library.controller('booksUpdtCtrl', function ($scope, $http, $location, $routeParams) {
    
    var isBase64 = false;
    
    $http.get('/api/authors/get').success(function(authors){
        $scope.authors = authors;
    });
    
    $http.get('/api/book/status').success(function(status){
        $scope.status = status;
    });
    
    $scope.loadfile = function(f){
        console.log(f, "load");
        isBase64 = true;
        $scope.preview = f;
    }
    
    $http.get('/api/book/get/' + $routeParams.id).success(function(books){
        console.log(books);
        $scope.book = books;
//        $scope.book.preview = '';
//        $scope.preview = true;
        console.log(books);
        if(books.preview){
//            $scope.book.preview = true; 
            $scope.preview = true;
            $scope.bookpreview = '/img/upload/' + books.preview;
        }
        
        $scope.location = books.location;
        $scope.selected = books.authors;
    });
    
    $scope.update = function(){
        console.log(isBase64);
        if(isBase64){
            $scope.book.preview = $('.img-preview > img').attr('src');
        }
        console.log($scope.book.preview);
        $http.patch('/api/book/update', $scope.book).success(function(data){
            $location.path('/');             
        });
    }
    
    $scope.deleteimage = function(link){
        console.log(link);
        if(!isBase64){
            $http.delete('/api/book/img/delete/' + link).success(function(){
                console.log("deleted");
                
            });
        }
        $('.img-preview > img').removeAttr('src');
        $scope.preview = null;
        $scope.book.preview = null;
        $('.upload-img').val('');
    }
});