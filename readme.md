# Bowl

This is web based application for recording and reporting on high school bowling matches.

### Work in progress.
* Significant refactoring as I finally sat down and gave a bit more thought to the structure of the models/database.
    - Need to rename User Class to Scorer Class and find all occurrences of User class and $user variable.
    - Revise School Class/Table.
    - Add school_scorer pivot table.
    - Revise any views effected by the above changes. 

### Current Design Environment
* Wampserver:
    * PHP 7.2.4
    * MySQL 5.7.21
    * Apache 2.4.33
    
* Laravel Framework 5.6.28
    
### Simple Scaffolding At This Point
* Scorer registration and login
* Scorer profile page scaffolded w/avatar

### Planned Features
* Scorer Class (instead of User Class)
* School Class
    * Team Class
        * Player Class
* Match Class
    * Game Class
        * Roll Class
* Pages:
    - School Admin
    - Team Admin
    - Player Admin
    - Match Admin
    - Scoring Summary
    - Game Scoring 
       

