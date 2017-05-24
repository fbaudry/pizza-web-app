
app.config(function($stateProvider, $urlRouterProvider) {



    $stateProvider.state({
        name: 'pizzas',
        url: '/pizzas',
        controller: "PizzaController",
        templateUrl: 'views/pizzas.html'
    });

    $urlRouterProvider.otherwise('/pizzas');
});