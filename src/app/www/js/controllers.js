angular.module('wobbe.controllers', [])

.controller('MainCtrl', function ($scope, $ionicSideMenuDelegate, Lists) {
	$scope.toggleLeft = function() {
		$ionicSideMenuDelegate.toggleLeft();
	};

	$scope.lists = Lists.query();
})

.controller('SignInCtrl', function ($scope, $state) {
	$scope.signIn = function(user) {
		console.log('Sign-In', user);
		$state.go('menu.about');
	};
})

.controller('HomeCtrl', function ($scope, $state) {
	$scope.lists.$promise.then(function (lists) {
		console.log(arguments);
		$scope.list = lists[0];
	});
})

.controller('ListCtrl', function ($scope, $stateParams, Lists) {
	var listId = $stateParams.listId;
	$scope.lists.$promise.then(function (lists) {
		var list = lists.filter(function (list) {
			return list.id == listId;
		})[0];
	// Lists.get({ listId: listId }).then(function (list) {
		$scope.list = list;
	});
})

;

