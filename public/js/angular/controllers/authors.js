library.controller('authorsCtrl', function ($scope, $http, $location) {
    $http.get('/api/authors/get').success(function(authors){
        $scope.authors = authors;
    });
    
    $scope.delete = function(id){
        if(confirm("Are you sure?")){
            $http.delete('/api/author/delete/' + id).success(function(authors){
                $scope.authors = authors;
            });
        }
    }
});

library.controller('authorsNewCtrl', function ($scope, $http, $location) {
    $scope.create = function(){
        $http.put('/api/author/create', $scope.author).success(function(data){
            $location.path('/authors');                      
        });
    }
});

library.controller('authorsUpdtCtrl', function ($scope, $http, $location, $routeParams) {
    $http.get('/api/author/get/' + $routeParams.id).success(function(author){
        $scope.author = author;
    });
    
    $scope.update = function(){
        $http.patch('/api/author/update', $scope.author).success(function(data){
            $location.path('/authors');             
        });
    }
});