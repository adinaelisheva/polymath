angular.module('polymath', []).controller('polymathCtrl', ['$scope', '$http', function($scope, $http) {

  $scope.taskToTopicMap = {};
  
  var updateLevels = function(){
    $http.get("topics.php").success(function(json){
      $scope.topics = json;
      for(var i = 0; i < $scope.topics.length; i++) {
        var t = $scope.topics[i];
        t.level = Math.ceil(t.exp/100);
        t.topic = t.topic[0].toUpperCase() + t.topic.substr(1); //this may not be necessary in future if it's capitalized before inserting
      }
    });
  }
  updateLevels();
  
  $http.get("tasks.php").success(function(json){
    $scope.tasks = json;
    for(var i = 0; i < $scope.tasks.length; i++) {
      var t = $scope.tasks[i];
      $scope.taskToTopicMap[t.task] = t.topic;
    }
  });

  $scope.name = 'Adina';

  $scope.dotask = function(task,level){
    var topic = $scope.taskToTopicMap[task];
    $.notify(topic + " +" + level + " EXP!","success");
    $http.get("dotask.php?topic="+topic+"&level="+level);
    updateLevels();
  }

}]);