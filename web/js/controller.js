app.controller("PizzaController", function($scope, PizzaService, IngredientService){
    $scope.pizzas = [];
    $scope.ingredients = [];
    $scope.selected_pizza = null;
    $scope.pizza_index = null;



    PizzaService.cget().then(function(response){
        $scope.pizzas = response.data;
        $scope.select_pizza($scope.pizzas[0]);
    });

    IngredientService.cget().then(function(response){
        $scope.ingredients = response.data;
    });

    $scope.get_pizza_price = function(pizza){
        var price = 0;

        for(var i = 0; i < pizza.ingredients.length; i++)
            price += pizza.ingredients[i].ingredient.price;

        return (price*1.5).toFixed(2) + " €";
    }

    $scope.get_ingredient_price = function(ingredient){
        var price = ingredient.price.toFixed(2);

        return ingredient.name + " +" + (price*1.5).toFixed(2) + " €";
    }

    $scope.select_pizza = function(pizza){
        $scope.selected_pizza = pizza;
        $scope.pizza_index = $scope.pizzas.indexOf(pizza);
    }

    $scope.is_selected_ingredient = function(ingredient){
        if(!$scope.selected_pizza)
            return false;


        for(var i = 0; i < $scope.selected_pizza.ingredients.length; i++) {
            if($scope.selected_pizza.ingredients[i].ingredient.id == ingredient.id)
                return true;
        }

        return false;
    }


    $scope.toggle_ingredient = function(ingredient){
        var ingredients = [];

        for(var i = 0; i < $scope.selected_pizza.ingredients.length; i++)
            ingredients.push($scope.selected_pizza.ingredients[i].ingredient.id);

        if(ingredients.indexOf(ingredient.id) > -1){
            IngredientService.remove_ingredient($scope.selected_pizza.id, ingredient.id).then(function(response){
                $scope.selected_pizza = response.data;
                $scope.update_pizzas();
            });

        }else {
            IngredientService.add_ingredient($scope.selected_pizza.id, ingredient.id).then(function(response){
                $scope.selected_pizza.ingredients.push(response.data);
                $scope.update_pizzas();
            });

        }
    }

    $scope.update_pizzas = function(){
        $scope.pizzas[$scope.pizza_index] = $scope.selected_pizza;
    }
});