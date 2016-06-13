library.config(['$routeProvider',
  function ($routeProvider) {
        $routeProvider.
        when('/', {
            templateUrl: '/js/angular/views/books/list.html',
            controller: 'booksCtrl'
        }).when('/books/new', {
            templateUrl: '/js/angular/views/books/create.html',
            controller: 'booksNewCtrl'
        }).when('/books/edit/:id', {
            templateUrl: '/js/angular/views/books/update.html',
            controller: 'booksUpdtCtrl'
        }).when('/authors', {
            templateUrl: '/js/angular/views/authors/list.html',
            controller: 'authorsCtrl'
        }).when('/authors/new', {
            templateUrl: '/js/angular/views/authors/create.html',
            controller: 'authorsNewCtrl'
        }).when('/authors/edit/:id', {
            templateUrl: '/js/angular/views/authors/update.html',
            controller: 'authorsUpdtCtrl'
        });
  }]);