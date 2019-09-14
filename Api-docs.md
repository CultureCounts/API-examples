# Culture Counts api endpoints


- **Auth**

  Auth  api endpoints are used for api authorisations, status & setting up context
  
  Api endpoints:
   - **Login** : 
     Api endpoint is used for logging in apikey.
 
      - Request Methods Allowed:
      
        <table>
            <tr>
              <th>Request Method</th>
              <th>Allowed Methods</th>
            </tr>
            <tr>
              <td>GET</td>
              <td>:heavy_multiplication_x:</td>
            </tr>
            <tr>
              <td>POST</td>
              <td>:heavy_check_mark:</td>
            </tr>
            <tr>
              <td>PUT</td>
              <td>:heavy_multiplication_x:</td>
            </tr>
            <tr>
              <td>DELETE</td>
              <td>:heavy_multiplication_x:</td>
            </tr>
          </table>
    
      - URL : `/api/auth/login/`
      - Fields :


        <table>
          <tr>
            <th>Field</th>
            <th>Required</th>
            <th>Type</th>
            <th>Example</th>
          </tr>
          <tr>
            <td>apikey</td>
            <td>True</td>
            <td>String</td>
            <td>ws4ediybhi6j3feryc5bgcq7i063t8jk</td>
          </tr>
        </table>

      
   - **Logout** :
     Api endpoint is used for logging out.
 
      - Request Methods Allowed:
      
          <table>
              <tr>
                <th>Request Method</th>
                <th>Allowed Methods</th>
              </tr>
              <tr>
                <td>GET</td>
                <td>:heavy_check_mark:</td>
              </tr>
              <tr>
                <td>POST</td>
                <td>:heavy_multiplication_x:</td>
              </tr>
              <tr>
                <td>PUT</td>
                <td>:heavy_multiplication_x:</td>
              </tr>
              <tr>
                <td>DELETE</td>
                <td>:heavy_multiplication_x:</td>
              </tr>
            </table>
    
      - URL : `/api/auth/logout/`
      - Fields : None
    
   - **Status** :
   Api endpoint is used for getting current user data, current organisation data, authtoken, csrftoken.
   
        - Request Methods Allowed:

          <table>
            <tr>
              <th>Request Method</th>
              <th>Allowed Methods</th>
            </tr>
            <tr>
              <td>GET</td>
              <td>:heavy_check_mark:</td>
            </tr>
            <tr>
              <td>POST</td>
              <td>:heavy_multiplication_x:</td>
            </tr>
            <tr>
              <td>PUT</td>
              <td>:heavy_multiplication_x:</td>
            </tr>
            <tr>
              <td>DELETE</td>
              <td>:heavy_multiplication_x:</td>
            </tr>
          </table>
         

        - URL : `/api/auth/status/`
        - Fields : None
   
 - **Users**
 
    Api endpoint to view, add, edit & delete users
 
    - Request Methods Allowed:
      <table>
        <tr>
          <th>Request Method</th>
          <th>Allowed Methods</th>
        </tr>
        <tr>
          <td>GET</td>
          <td>:heavy_check_mark:</td>
        </tr>
        <tr>
          <td>POST</td>
          <td>:heavy_multiplication_x:</td>
        </tr>
        <tr>
          <td>PUT</td>
          <td>:heavy_multiplication_x:</td>
        </tr>
        <tr>
          <td>DELETE</td>
          <td>:heavy_multiplication_x:</td>
        </tr>
      </table>
  
    - URL : `/api/user/`
  
    - Fields :
    
      <table>
        <tr>
          <th>Field</th>
          <th>Required</th>
          <th>Readonly</th>
          <th>Unique</th>
          <th>Type</th>
          <th>Default</th>
          <th>Description</th>
        </tr>
        <tr>
          <td>id</td>
          <td>True</td>
          <td>True</td>
          <td>True</td>
          <td>int</td>
          <td>auto increment</td>
          <td>pk of user model</td>
        </tr>
        <tr>
          <td>tombstate</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>choice - ( None<br>archived <br>deleted )</td>
          <td>None</td>
          <td>state of the object.<br></td>
        </tr>
        <tr>
          <td>client_id</td>
          <td>-</td>
          <td>True</td>
          <td>True</td>
          <td></td>
          <td>None</td>
          <td>UUID from the client.<br></td>
        </tr>
        <tr>
          <td>email</td>
          <td>True</td>
          <td>-</td>
          <td>True</td>
          <td>email</td>
          <td>-</td>
          <td>email id of the user</td>
        </tr>
        <tr>
          <td>is_active</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Boolean</td>
          <td>True</td>
          <td>Designates whether this user should be treated as active</td>
        </tr>
        <tr>
          <td>names</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Array</td>
          <td>[]</td>
          <td>first name and last name<br>ex : ["jhon", "doe"]</td>
        </tr>
        <tr>
          <td>settings</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Json</td>
          <td>{}</td>
          <td>user settings for different cc settings</td>
        </tr>
        <tr>
          <td>roles</td>
          <td>-</td>
          <td>True</td>
          <td>-</td>
          <td>Array<br></td>
          <td>[]</td>
          <td>Defines capabilties of a user</td>
        </tr>
        <tr>
          <td>organisations</td>
          <td>-</td>
          <td>True</td>
          <td>-</td>
          <td>Array</td>
          <td>[]</td>
          <td>current user organsiations</td>
        </tr>
      </table>

    - Get Request Query Filters:

      <table>
        <tr>
          <th>Name</th>
          <th>Example</th>
          <th>Description</th>
        </tr>
        <tr>
          <td>id</td>
          <td>`/api/user/?id=1`</td>
          <td>Filter user by id</td>
        </tr>
        <tr>
          <td>ids</td>
          <td>`/api/user/?id=1,2,3`</td>
          <td>Filter user by multiple ids</td>
        </tr>
        <tr>
          <td>client_id</td>
          <td>`/api/user/?client_id=1swec3`</td>
          <td>Filter user by client_id</td>
        </tr>
        <tr>
          <td>tombstate</td>
          <td>`/api/user/?tombstate=include_archived`</td>
          <td>Filter user by tombstate<br>values can be: null / include_archived / include_deleted<br></td>
        </tr>
        <tr>
          <td>created</td>
          <td>`/api/user/?created__gte=2016-01-02`</td>
          <td>Filter users by create date</td>
        </tr>
        <tr>
          <td>modified</td>
          <td>`/api/user/?modified__gte=2016-01-02`</td>
          <td>Filter users by modified date</td>
        </tr>
        <tr>
          <td>email</td>
          <td>`/api/user/?email=test@test.com`</td>
          <td>Filter users by email id</td>
        </tr>
      </table>

  
 - **Assessors**
 
    Api endpoint to add or remove assessors from a survey
    
    - Request Methods allowed:

      <table>
        <tr>
          <th>Request Method</th>
          <th>Allowed Methods</th>
        </tr>
        <tr>
          <td>GET</td>
          <td>:heavy_check_mark:</td>
        </tr>
        <tr>
          <td>POST</td>
          <td>:heavy_check_mark:</td>
        </tr>
        <tr>
          <td>PUT</td>
          <td>:heavy_multiplication_x:</td>
        </tr>
        <tr>
          <td>DELETE</td>
          <td>:heavy_multiplication_x:</td>
        </tr>
      </table>

    - URL : `/api/user/assessor/`
  
    - Fields :
    
      <table>
        <tr>
          <th>Field</th>
          <th>Required</th>
          <th>Readonly</th>
          <th>Unique</th>
          <th>Type</th>
          <th>Default</th>
          <th>Description</th>
        </tr>
        <tr>
          <td>id</td>
          <td>True</td>
          <td>True</td>
          <td>True</td>
          <td>int</td>
          <td>auto increment</td>
          <td>pk of user model</td>
        </tr>
        <tr>
          <td>tombstate</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>choice - ( None<br>archived <br>deleted )</td>
          <td>None</td>
          <td>state of the object.<br></td>
        </tr>
        <tr>
          <td>client_id</td>
          <td>-</td>
          <td>True</td>
          <td>True</td>
          <td></td>
          <td>None</td>
          <td>UUID from the client.<br></td>
        </tr>
        <tr>
          <td>email</td>
          <td>True</td>
          <td>-</td>
          <td>True</td>
          <td>email</td>
          <td>-</td>
          <td>email id of the user</td>
        </tr>
        <tr>
          <td>is_active</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Boolean</td>
          <td>True</td>
          <td>Designates whether this user should be treated as active</td>
        </tr>
        <tr>
          <td>names</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Array</td>
          <td>[]</td>
          <td>first name and last name<br>ex : ["jhon", "doe"]</td>
        </tr>
        <tr>
          <td>settings</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Json</td>
          <td>{}</td>
          <td>user settings for different cc settings</td>
        </tr>
        <tr>
          <td>roles</td>
          <td>-</td>
          <td>True</td>
          <td>-</td>
          <td>Array<br></td>
          <td>[]</td>
          <td>Defines capabilties of a user</td>
        </tr>
        <tr>
          <td>organisations</td>
          <td>-</td>
          <td>True</td>
          <td>-</td>
          <td>Array</td>
          <td>[]</td>
          <td>current user organsiations</td>
        </tr>
      </table>

    - Get Request Query Filters:

      <table>
        <tr>
          <th>Name</th>
          <th>Example</th>
          <th>Description</th>
        </tr>
        <tr>
          <td>id</td>
          <td>`/api/user/?id=1`</td>
          <td>Filter user by id</td>
        </tr>
        <tr>
          <td>ids</td>
          <td>`/api/user/?id=1,2,3`</td>
          <td>Filter user by multiple ids</td>
        </tr>
        <tr>
          <td>client_id</td>
          <td>`/api/user/?client_id=1swec3`</td>
          <td>Filter user by client_id</td>
        </tr>
        <tr>
          <td>tombstate</td>
          <td>`/api/user/?tombstate=include_archived`</td>
          <td>Filter user by tombstate<br>values can be: null / include_archived / include_deleted<br></td>
        </tr>
        <tr>
          <td>created</td>
          <td>`/api/user/?created__gte=2016-01-02`</td>
          <td>Filter users by create date</td>
        </tr>
        <tr>
          <td>modified</td>
          <td>`/api/user/?modified__gte=2016-01-02`</td>
          <td>Filter users by modified date</td>
        </tr>
        <tr>
          <td>email</td>
          <td>`/api/user/?email=test@test.com`</td>
          <td>Filter users by email id</td>
        </tr>
      </table>
 
 
 - **Organisation**
 - **Evaluation**
 - **Survey**
 - **Share**
 - **Question**
 - **Slughash**
 - **Survey Response**
 - **Question Response**
 - **Datafacts**
 - **Dimension**
 - **Dimension Category**
 
