# A form for adding, editing and removing users.

This code was written as part of a test I was given by a company at which I had applied for a job. I spent roughly two hours and 45 minutes coding this program.

The task was to make a program for registering users into a database.

I decided to use Angular, which I had been doing only minor examples in up until then, and that, although many tasks were finished at the speed of a Tesla, caused some delays. I wanted to use a dialog for editing a user, but could not make the Angular Material dialog pop up as I wanted, so I switched to the "view" way of doing it instead. In addition I wanted to use a POST request to send the information since it contains a password, but could not figure out what format the "data" argument in the $http.post request was supposed to be. I am in this example using a GET request which I am not at all happy with.

Aside from these things, I had to stop before I was able to do some proper server side validation and error handling. The script works best when nothing unexpected happens.

A live demo of the program can be seen here: http://rimestad.no/userForm/
