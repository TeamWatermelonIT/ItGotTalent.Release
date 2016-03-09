# Angular ![alt text](http://www.toonpool.com/user/7755/thumbs/caring_hand_logo_77484.jpg) Laravel

A web page for displaying information about students,
companies and projects made from the students during the courses at
![alt text](http://trainingcamp.ittalents.bg/assets/images/it-talents-logo.png)

##URL's
1. http://itgottalent.herokuapp.com/students
    displaying info about the students
    query params -> page, name(like), course, season
    RESTfull -> get
2. http://itgottalent.herokuapp.com/students/1
    personal details about a student with id = 1
    RESTfull -> get
3. http://itgottalent.herokuapp.com/students/{id}/projects
    projects of student with id = 1
    RESTfull -> get
4. http://itgottalent.herokuapp.com/projects
    displaying info about the projects
    query params -> page
    RESTfull -> get, post
5. http://itgottalent.herokuapp.com/projects/1
    displaying info about project with id = 1
    RESTfull -> get, update, delete
6. http://itgottalent.herokuapp.com/user/1
    displaying and editing personal information about user with id = 1
    RESTfull -> get, post, update, delete