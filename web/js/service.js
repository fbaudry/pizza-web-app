app.service("PizzaService", function($http, $q){

    var factory = {};

    factory.cget = function(){
        return $q(function(resolve, reject){
            $http({
                url: BASE_URL + Routing.generate("get_pizzas"),
                method: "GET"
            }).then(function(response){
                return resolve(response);
            }, function(response){
                return reject(response);
            });
        })
    }


    return factory;
});


app.service("IngredientService", function($http, $q){
    var factory = {};

    factory.cget = function(){
        return $q(function(resolve, reject){
            $http({
                url: BASE_URL + Routing.generate("get_ingredients"),
                method: "GET"
            }).then(function(response){
                return resolve(response);
            }, function(response){
                return reject(response);
            });
        })
    }


    factory.add_ingredient = function(pizza_id, ingredient_id){
        return $q(function(resolve, reject){
            $http({
                url: BASE_URL + Routing.generate("post_pizza_ingredient", { pizza_id: pizza_id, ingredient_id: ingredient_id }),
                method: "POST"
            }).then(function(response){
                return resolve(response);
            }, function(response){
                return reject(response);
            });
        })
    }

    factory.remove_ingredient = function(pizza_id, ingredient_id){
        return $q(function(resolve, reject){
            $http({
                url: BASE_URL + Routing.generate("post_pizza_ingredient", { pizza_id: pizza_id, ingredient_id: ingredient_id }),
                method: "DELETE"
            }).then(function(response){
                return resolve(response);
            }, function(response){
                return reject(response);
            });
        })
    }

    return factory;
});