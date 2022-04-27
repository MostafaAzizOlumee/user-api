# User Authentication API Project

### Installation Notes

- Clone or download the project
- import the db from the ```db``` folder
- Navigate to the ```http://{Your Domain Name}/authentication/views/login/``` for login
- Enter any of the following user credentials
- Navigate to the ```http://{Your Domain Name}/authentication/api/authentication/user-single.php?id={user-id}``` for get request
- Post the user json-data (as followng format) to the ```http://{Your Domain Name}/authentication/user_create.php``` for user account creation
- Put the user json-data (as followng format) to the ```http://{Your Domain Name}/authentication/user_update.php``` for user account info update
- Delete the user (as followng json-data format) to the ```http://{Your Domain Name}/authentication/user_update.php``` for user account Delete
#### User Credentials for the API

- username ``koroush.s@gmail.com`` password ``koroush123``
- username ``nawid.qsm@gmail.com`` password ``nawid123``
- username ``azm.naser@gmai.com`` password ``naser123``
- username ``shagofa.shms@gmail.com`` password ``shagofa123``

#### POST  Request Json Data Format
`{  
    "first_name": "John",  
    "last_name": "Doe",  
    "username": "john.doe@gmail.com",  
    "password": "whateverpassword"  
}`  

#### PUT Request Json Data Format

`{   
    "id": "7",  
    "updateData":   
    {  
        "first_name": "Mostafa",  
        "last_name": "Olumee",  
        "role": "admin",  
        "username": "m.olumee@gmail.com",  
        "password": "$2y$10$HWxXEm7ChgEqamMSrnx9jeVMiVgvxYm1vhntbGyEgbREoXyHXVMa6"  
    }  
}`  

#### Delete Request Json Data Format

`{   
    "id": "7",
}`  