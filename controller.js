    var app = angular.module('myApp', ['ngMaterial']);
    
    app.controller('UsersList', ['$scope', '$http', function($scope, $http) {
            
            // Defining global variables.
            $scope.usersArr = new Array();
            $scope.view = 'list';
            $scope.selectedUser = {};
            
            // Load all users and assign to list
            $http.get('index.php?c=users&a=getJSON')
               .then(function(response) {
                   $scope.usersArr = response.data;

            });
            
            $scope.showEditForm = function(user) {
                
                
                if(user == 'new') {
                    
                    $scope.selectedUser.userID = 'new';
                    
                    $scope.firstname = '';
                    $scope.lastname = '';
                    $scope.email = '';
                    $scope.password1 = '';
                    $scope.password2 = '';

                    // When new user is added, the checkbox giving the user the option
                    // of changing passwords is invisible (through directive in the view)
                    // because a new user has to have a password.
                    // Make password fields visible by default.
                    $scope.showChangePwd = true;
                } else {
                    // Populate form
                    $scope.showChangePwd = false;

                    $scope.firstname = user.firstname;
                    $scope.lastname = user.lastname;
                    $scope.email = user.email;


                    $scope.selectedUser = user;
                }
                
                // Display form
                $scope.view = 'edit';

            }
            
            $scope.save = function() {

                // Save to database
                var pwdQuery = ''; 
                 if($scope.showChangePwd) {
                     pwdQuery = '&password=' + $scope.password1;
                 }

                $http.get('index.php?c=user&a=save&userID=' + $scope.selectedUser.userID + '&firstname=' + encodeURI($scope.firstname) + '&lastname=' + encodeURI($scope.lastname) + '&email=' + encodeURI($scope.email) + pwdQuery).then(function successCallback(response) {
                    if($scope.selectedUser.userID != 'new') {
        
                        // Edit list
                        var index = $scope.usersArr.indexOf($scope.selectedUser);

                        $scope.usersArr[index].firstname = $scope.firstname;
                        $scope.usersArr[index].lastname = $scope.lastname;
                        $scope.usersArr[index].email = $scope.email;
                    } else {
                        // Add new user. The GET-request has returned the ID for the user.
                        $scope.usersArr.push({
                            userID: response.data,
                            firstname: $scope.firstname,
                            lastname: $scope.lastname,
                            email: $scope.email
                        });

                    }
          
                })
                
                $scope.view = 'list';
                
        
                
            }
            
            $scope.delete = function(user) {
                if(confirm("Vil du virkelig slette " + user.firstname + " " + user.lastname + "?")) {
                    $http.get('index.php?c=user&a=delete&userID=' + user.userID);
                    
                    // Delete user in view.
                    var index = $scope.usersArr.indexOf(user);
                    $scope.usersArr.splice(index, 1);
                }
            }
    }]);

