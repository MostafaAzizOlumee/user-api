# User Authentication API Project

### Installation Notes

- Clone or download the project
- import the db from the ```db``` folder
- Navigate to the ```http://{Your Domain Name}/authentication/views/login/``` for login
- Enter any of the following user credentials
- Navigate to the ```http://{Your Domain Name}/authentication/api/authentication/user-single.php?id={user-id}``` for get request
- Post the user json-data (as followng formate) to the ```http://{Your Domain Name}/authentication/user_create.php``` for user account creation
#### User Credentials for the API

- username ``koroush.s@gmail.com`` password ``koroush123``
- username ``nawid.qsm@gmail.com`` password ``nawid123``
- username ``azm.naser@gmai.com`` password ``naser123``
- username ``shagofa.shms@gmail.com`` password ``shagofa123``

#### POST  Request Json Data Format
`{ <br>
    <br> "first_name": "John",
    <br> "last_name": "Doe",
    <br> "username": "john.doe@gmail.com",
    <br> "password": "whateverpassword"
}`

#### PUT Request Json Data Format

`{<br>
    "id": "7",
    <br>"updateData": 
    <br>{
        <br>"first_name": "Mostafa",
        <br>"last_name": "Olumee",
        <br>"role": "admin",
        <br>"username": "m.olumee@gmail.com",
        <br>"password": "$2y$10$HWxXEm7ChgEqamMSrnx9jeVMiVgvxYm1vhntbGyEgbREoXyHXVMa6"
    <br>}
<br>}`