# Angular ![alt text](http://www.toonpool.com/user/7755/thumbs/caring_hand_logo_77484.jpg) Laravel

###A web page for displaying information about students,
###companies and projects made from the students during the courses at
![alt text](http://trainingcamp.ittalents.bg/assets/images/it-talents-logo.png)

##URL's
1. http://itgottalent.herokuapp.com/students
    displaying info about the students
    query params -> page, name(like), course, season, orderBy, order
    RESTfull -> get
2. http://itgottalent.herokuapp.com/students/{id}
    personal details about a student with id = 1
    RESTfull -> get
2. http://itgottalent.herokuapp.com/profile
   personal details about user, need to be authenticated
   RESTfull -> get, put, delete
4. http://itgottalent.herokuapp.com/projects
    displaying info about the projects
    query params -> page
    RESTfull -> get, post
5. http://itgottalent.herokuapp.com/projects/{id}
    displaying info about project with id = 1
    RESTfull -> get, update, delete