# Product Managment API Project

### Installation Notes

- Execute the db Queries within the ```schema SQL Queries.sql``` file of ```schema``` folder
- Install ```postman``` software, in order to work with the api in request/response fashion
- Since the Foreign-key constrain is active between the relations, so added product-category before the product itself
- Do not forget to change the request method accordingly (POST request, DELETE request,...)

#### POST  Request For Product-Category Add Json Data Format
**URL**: ```http://{Your Domain Name}/temis/api/product/product-category-add.php```

**Format**:`{
    "category_name":"Category 1",
    "category_code":"PC1"
}`  

#### POST  Request For Product Add Json Data Format
`{
    "generic_name": "Product 1",
    "company_name": "Company 1",
    "min_in_stock_alert": 5,
    "barcode": "2112352689310",
    "description": "Blue Color Cover with 7g weight",
    "category_id":1
}`  

#### PUT Request For Product-Category Update Json Data Format

`{
    "id":1,
    "updateData":{
        "name": "Product Category 1",
        "code": "PC 1"
    }
}`  

#### PUT Request For Product Update Json Data Format

`{
    "id":1,
    "updateData":{
        "name": "Product Category 1",
        "code": "PC 1"
    }
}`  

#### Delete Request For Product Delete Json Data Format

`{
    "id": 1
}`  

#### Delete Request For Product-Category Delete Json Data Format

`{
    "id": 1
}`  