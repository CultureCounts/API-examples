# Culture Counts api endpoints

Culture counts have multiple api endpoints for fetcing, creating & editing data.
Api endpoints with specifications are listed below.


## Auth api endpoints

Auth  api endpoints are used for api authorisations, status & setting up context

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
   

## Data api endpoints

Data api endpoints are used to view, add & edit culture counts data.



#### Common Fields

Every api model have some common Fields that is added in each api endpoint.
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
	    <td>pk of the model</td>
	  </tr>
	  <tr>
	    <td>tombsate</td>
	    <td>-</td>
	    <td>-</td>
	    <td>-</td>
	    <td>choices<br><br>options : None,<br>archived, Deleted</td>
	    <td>None<br></td>
	    <td>state of the object</td>
	  </tr>
	  <tr>
	    <td>client_id</td>
	    <td>-</td>
	    <td>True</td>
	    <td>True</td>
	    <td>String</td>
	    <td>None</td>
	    <td>UUID from the client.</td>
	  </tr>
	  <tr>
	    <td>created</td>
	    <td>-</td>
	    <td>True</td>
	    <td>-</td>
	    <td>Datetime</td>
	    <td>Datetime.now()</td>
	    <td>Object creation date and time</td>
	  </tr>
	  <tr>
	    <td>modified</td>
	    <td>-</td>
	    <td>True</td>
	    <td>-</td>
	    <td>Datetime</td>
	    <td>Datetime.now()</td>
	    <td>Object modification date and time</td>
	  </tr>
	</table>

#### Common GET request query parameters

Every api endpoint have some common get request query parameters.
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
  	</table>


#### Api endpoints:

- **Users**
 
    Api endpoint to view, add, edit & delete users
 
    - Request Methods Allowed:
      <table>
        <tr>
          <th>Request Method</th>
          <th>Allowed Methods</th>
          <th>Data Access</th>
        </tr>
        <tr>
          <td>GET</td>
          <td>:heavy_check_mark:</td>
          <td>View all users of the apikey's organisation</td>
        </tr>
        <tr>
          <td>POST</td>
          <td>:heavy_check_mark:</td>
          <td>Add user to the organisation. But apikey can create Anonymous/Assessor type users only.</td>
        </tr>
        <tr>
          <td>PUT</td>
          <td>:heavy_check_mark:</td>
          <td>Can edit users that belong to the organisation.</td>
        </tr>
        <tr>
          <td>DELETE</td>
          <td>:heavy_multiplication_x:</td>
          <td>Cannot delete any user.</td>
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
          <td>email</td>
          <td>`/api/user/?email=test@test.com`</td>
          <td>Filter users by email id</td>
        </tr>
        <tr>
          <td>username</td>
          <td>`/api/user/?username=gaurav`</td>
          <td>Filter users by username</td>
        </tr>
      </table>

	- Sub api endpoints

		- **Assessors**

			Api endpoint to add or remove assessors from a survey.
			Assessors are users which can be differentiated by the system while checking responses.
			A user is added as a assessor by survey administrator or admin user with enough privledges to edit survey.
			Unique slugs are added to assessors and these slugs are used to take surveys.

			Types of assessors: Self, Peer
		    
		    - Request Methods allowed:

		      <table>
		        <tr>
		          <th>Request Method</th>
		          <th>Allowed Methods</th>
		          <th>Data Access</th>
		        </tr>
		        <tr>
		          <td>GET</td>
		          <td>:heavy_check_mark:</td>
		          <td>Get assessors of the survey using GET request parameter `survey_id`</td>
		        </tr>
		        <tr>
		          <td>POST</td>
		          <td>:heavy_check_mark:</td>
		          <td>Add or Remove assessors from a survey</td>
		        </tr>
		        <tr>
		          <td>PUT</td>
		          <td>:heavy_multiplication_x:</td>
		          <td>Not Allowed</td>
		        </tr>
		        <tr>
		          <td>DELETE</td>
		          <td>:heavy_multiplication_x:</td>
		          <td>Not Allowed</td>
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
		        <tr>
		          <td>id</td>
		          <td>True</td>
		          <td>True</td>
		          <td>True</td>
		          <td>int</td>
		          <td>auto increment</td>
		          <td>id of the assessor</td>
		        </tr>
		        <tr>
		          <td>email</td>
		          <td>True</td>
		          <td>-</td>
		          <td>True</td>
		          <td>email</td>
		          <td>-</td>
		          <td>email id of the assessor</td>
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
		          <td>attendance_date</td>
		          <td>-</td>
		          <td>True</td>
		          <td>-</td>
		          <td>Datetime</td>
		          <td>None</td>
		          <td>Date from survey attendance</td>
		        </tr>
		        <tr>
		          <td>survey</td>
		          <td>-</td>
		          <td>True</td>
		          <td>-</td>
		          <td>Json</td>
		          <td>None</td>
		          <td>Survey object linked with assessor</td>
		        </tr>
		        <tr>
		          <td>surveyResponse</td>
		          <td>-</td>
		          <td>True</td>
		          <td>-</td>
		          <td>Json</td>
		          <td>None</td>
		          <td>Survey response of the survey</td>
		        </tr>
		        <tr>
		          <td>linkedSurveyResponse</td>
		          <td>-</td>
		          <td>True</td>
		          <td>-</td>
		          <td>Json</td>
		          <td>None</td>
		          <td>Survey response of the linked survey</td>
		        </tr>
		        <tr>
		          <td>slug</td>
		          <td>-</td>
		          <td>True</td>
		          <td>-</td>
		          <td>Json</td>
		          <td>None</td>
		          <td>Slug object of the survey</td>
		        </tr>
		        <tr>
		          <td>invitation</td>
		          <td>-</td>
		          <td>True</td>
		          <td>-</td>
		          <td>Array</td>
		          <td>[]</td>
		          <td>current user organsiations</td>
		        </tr>
		        <tr>
		          <td>respondent_category</td>
		          <td>-</td>
		          <td>True</td>
		          <td>-</td>
		          <td>choice</td>
		          <td>-</td>
		          <td>self / peer / public</td>
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
		          <td>survey_id</td>
		          <td>`/api/user/assessor/?survey_id=1`</td>
		          <td>Get all assessors of survey 1. It's a required param to do any request to assessors</td>
		        </tr>
		      </table>

		    - How to add & remove assessors from a survey:

		    	To add or remove assessor you have to do a `POST` request to `/api/user/assessor/?survey_id=1`

		    	Example post Request payload data:

				<code>
				   {
			            'survey_id': Survey ID,
			            'add': List of Assessors to add,
			            'remove': List of Assessors to remove
			        }
				</code>

				Syntax to write List of Assessors to add or remove: 
				
				<code>
				[
					{
						'email': 'firstuser@email.com',
						'respondent_category': 'peer',
					}, 
					{
						'email': 'seconduser@email.com',
						'respondent_category': 'self',
					}
				]
				</code>

				Multiple assessors can be added or removed from a single api call.

		- **Find**

			There are cases when user has to find another user to add them to evaluation or organisation.
			In that case you can use find user suburl that filters out user by email that does not belong to current organisation
			- Request Methods allowed:
				<table>
			        <tr>
			          <th>Request Method</th>
			          <th>Allowed Methods</th>
			          <th>Data Access</th>
			        </tr>
			        <tr>
			          <td>GET</td>
			          <td>:heavy_check_mark:</td>
			          <td>Filter user using email</td>
			        </tr>
			        <tr>
			          <td>POST</td>
			          <td>:heavy_check_mark:</td>
			          <td>Not Allowed</td>
			        </tr>
			        <tr>
			          <td>PUT</td>
			          <td>:heavy_multiplication_x:</td>
			          <td>Not Allowed</td>
			        </tr>
			        <tr>
			          <td>DELETE</td>
			          <td>:heavy_multiplication_x:</td>
			          <td>Not Allowed</td>
			        </tr>
			      </table>

			- URL : `/api/user/find/`
		  
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
		        <tr>
		          <td>id</td>
		          <td>True</td>
		          <td>True</td>
		          <td>True</td>
		          <td>int</td>
		          <td>auto increment</td>
		          <td>id of the assessor</td>
		        </tr>
		        <tr>
		          <td>email</td>
		          <td>True</td>
		          <td>-</td>
		          <td>True</td>
		          <td>email</td>
		          <td>-</td>
		          <td>email id of the assessor</td>
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
		          <td>roles</td>
		          <td>-</td>
		          <td>True</td>
		          <td>-</td>
		          <td>Array</td>
		          <td>[]</td>
		          <td>Defines capabilties of a user</td>
		        </tr>
		      </table>

		    - How to use find sub api endpoint:

		    	To use find you have add query parameter `email` to `/api/user/find/`

		    	Example:
	    		<code>
	    		https://gaurav.new-dev.culturecounts.cc//api/user/find/?email=gauravgoyal1092@gmail.com
	    		</code>

- **Organisation**

 	Api endpoint to view, add, edit & delete Organisations.
 
    - Request Methods Allowed:
      <table>
        <tr>
          <th>Request Method</th>
          <th>Allowed Methods</th>
          <th>Data Access</th>
        </tr>
        <tr>
          <td>GET</td>
          <td>:heavy_check_mark:</td>
          <td>Will view apikey's organisation.</td>
        </tr>
        <tr>
          <td>POST</td>
          <td>:heavy_multiplication_x:</td>
          <td>Apikey can not add new organisations.</td>
        </tr>
        <tr>
          <td>PUT</td>
          <td>:heavy_check_mark:</td>
          <td>Can edit organsiation only if added to Apikey_superuser role</td>
        </tr>
        <tr>
          <td>DELETE</td>
          <td>:heavy_multiplication_x:</td>
          <td>Cannot delete any organisation.</td>
        </tr>
      </table>
  
    - URL : `/api/organisation/`
  
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
          <td>name</td>
          <td>True</td>
          <td>-</td>
          <td>-</td>
          <td>String</td>
          <td>-</td>
          <td>Name of the organisation</td>
        </tr>
        <tr>
          <td>price_note</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>String</td>
          <td>-</td>
          <td>-</td>
        </tr>
        <tr>
          <td>verticals</td>
          <td>-</td>
          <td>True</td>
          <td>-</td>
          <td>Array</td>
          <td>All dimension categories</td>
          <td>Dimension verticals that can be used when this organisation is active</td>
        </tr>
        <tr>
          <td>notes</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Text</td>
          <td>null</td>
          <td>User notes</td>
        </tr>
        <tr>
          <td>features</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Choice</td>
          <td>[]</td>
          <td>Feature in which organisation data is used</td>
        </tr>
        <tr>
          <td>licensee</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Choice</td>
          <td>[]</td>
          <td>Separating organisations according to location or version</td>
        </tr>
        <tr>
          <td>users</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Array</td>
          <td>[]</td>
          <td>Array of user objects that belongs to the organisation</td>
        </tr>
      </table>

    - Get Request Query Filters: None

- **Evaluation**

 	Api endpoint to view, add, edit & delete Evaluation.
 
    - Request Methods Allowed:
      <table>
        <tr>
          <th>Request Method</th>
          <th>Allowed Methods</th>
          <th>Data Access</th>
        </tr>
        <tr>
          <td>GET</td>
          <td>:heavy_check_mark:</td>
          <td>Can view all evaluations shared with apikey's organisation</td>
        </tr>
        <tr>
          <td>POST</td>
          <td>:heavy_check_mark:</td>
          <td>Can add new Evaluations with share of creator to apikey's organisation</td>
        </tr>
        <tr>
          <td>PUT</td>
          <td>:heavy_check_mark:</td>
          <td>Can edit shared Evaluations with share relationship creator, admin or editor</td>
        </tr>
        <tr>
          <td>DELETE</td>
          <td>:heavy_check_mark:</td>
          <td>Can edit shared Evaluations with share relationship creator or admin</td>
        </tr>
      </table>
  
    - URL : `/api/evaluation/`
  
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
          <td>name</td>
          <td>True</td>
          <td>-</td>
          <td>-</td>
          <td>String</td>
          <td>-</td>
          <td>Name of the Evaluation</td>
        </tr>
        <tr>
          <td>has_shares</td>
          <td>-</td>
          <td>True</td>
          <td>-</td>
          <td>Boolean</td>
          <td>False</td>
          <td>Is this evaluation shared with any other user</td>
        </tr>
        <tr>
          <td>has_responses</td>
          <td>-</td>
          <td>True</td>
          <td>-</td>
          <td>Boolean</td>
          <td>False</td>
          <td>Current Evaluation's survey has survey responses</td>
        </tr>
        <tr>
          <td>configuration</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Json</td>
          <td>{}</td>
          <td>Various evaluation configurations</td>
        </tr>
        <tr>
          <td>datafacts</td>
          <td>-</td>
          <td>True</td>
          <td>-</td>
          <td>Json</td>
          <td>{}</td>
          <td>Datafacts of an evaluation. Datafacts are created when an evaluation is created</td>
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
          <td>name</td>
          <td>`/api/evaluation/?name=test`</td>
          <td>Filter Evaluations by name</td>
        </tr>
      </table>

- **Survey**

 	Api endpoint to view, add, edit & delete Survey.
 
    - Request Methods Allowed:
      <table>
        <tr>
          <th>Request Method</th>
          <th>Allowed Methods</th>
          <th>Data Access</th>
        </tr>
        <tr>
          <td>GET</td>
          <td>:heavy_check_mark:</td>
          <td>Can view all survey that belongs to evaluations shared with apikey's organisation</td>
        </tr>
        <tr>
          <td>POST</td>
          <td>:heavy_check_mark:</td>
          <td>Can add new survey with shared evaluation relationship as creator, admin or editor</td>
        </tr>
        <tr>
          <td>PUT</td>
          <td>:heavy_check_mark:</td>
          <td>Can edit shared Evaluation's survey with share relationship creator, admin or editor</td>
        </tr>
        <tr>
          <td>DELETE</td>
          <td>:heavy_check_mark:</td>
          <td>Can delete shared Evaluation's survey with share relationship creator or admin</td>
        </tr>
      </table>
  
    - URL : `/api/survey/`
  
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
          <td>name</td>
          <td>True</td>
          <td>-</td>
          <td>-</td>
          <td>String</td>
          <td>-</td>
          <td>Name of the Survey</td>
        </tr>
        <tr>
          <td>configuration</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Json</td>
          <td>{}</td>
          <td>Survey configurations. like survey_type</td>
        </tr>
        <tr>
          <td>options</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Json</td>
          <td>{}</td>
          <td>Survey options like survey intro info & active</td>
        </tr>
        <tr>
          <td>evaluation_id</td>
          <td>True</td>
          <td>-</td>
          <td>-</td>
          <td>int</td>
          <td>-</td>
          <td>Parent evaluation shared with apikey organisation</td>
        </tr>
        <tr>
          <td>logo</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Image</td>
          <td>{}</td>
          <td>Datafacts of an evaluation. Datafacts are created when an evaluation is created</td>
        </tr>
        <tr>
          <td>has_responses</td>
          <td>-</td>
          <td>True</td>
          <td>-</td>
          <td>Boolean</td>
          <td>False</td>
          <td>If survey has valid survey responses</td>
        </tr>
        <tr>
          <td>datafacts</td>
          <td>-</td>
          <td>True</td>
          <td>-</td>
          <td>Json</td>
          <td>{}</td>
          <td>Datafacts of this Survey or it's parent evaluation</td>
        </tr>
      </table>

      Details about survey options & configuration:

      	- **configuration**:

      		This is a Json type field that holds multiple types of survey configuration required to function CC stack properly.

      		- **survey_type**: Post, Prior or Standard, There are 3 types of survey that CC stack provides. The survey type affects how the survey will collect responses.
      			- **post** : A post event survey will help you to measure the difference between audience expectations and their actual experience of the event.
      			- **prior** : A prior event survey will allow you to measure expectations of an event or experience, which can then be compared with how the event was actually perceived by the audience.
      			- **standard** : A standard survey is a one-off survey that can be used to measure a respondent’s event or place experience. Choose this type if you do not want to measure expectations prior to the experience.
      		- **skip_survey** : Boolean type setting that allows you to add skip survey button and start page of survey when set as True
      		- **hide_results** : Boolean type setting that hides question responses user answered at the end of survey page.
      		- **linked_survey_id** : Used for linking one survey from another. Can only used for prior or post type of surveys
      		- **linked** : Boolean type setting that is True is survey is linked to any other survey.

      	- **options**:

      		This is a Json type field that holds multiple types of survey options for survey details:

      		- **active**: Legacy field, Nnot used any more. 
      		- **survey_intro**: Short optional introduction to the survey. This will appear on the first page of your survey. 
      		- **start**: Survey starting date determine when your survey begins
      		- **close**: Survey starting date determine when your survey stops

    - Get Request Query Filters:
    	<table>
        <tr>
          <th>Name</th>
          <th>Example</th>
          <th>Description</th>
        </tr>
        <tr>
          <td>name</td>
          <td>`/api/survey/?name=test`</td>
          <td>Filter survey by name</td>
        </tr>
        <tr>
          <td>evaluation_id</td>
          <td>`/api/survey/?evaluation_id=1`</td>
          <td>Filter surveys by evaluation</td>
        </tr>
      </table>

    - Sub Api Endpoints
    	- **Change Logo**
    		This api endpoint lets user upload logo of a survey.
    		Logo is type of custom branding for an organisation as your logo will show up on the surveys welcome screen with survey intro.
    		Your logo file must be smaller than 2MB and be in one of the following formats:
				`.png.gif or .jpg`
			Tip: Horizontal images work best, especially if you plan to deliver your survey on a tablet or smartphone.

			- Request Methods Allowed:
			      <table>
			        <tr>
			          <th>Request Method</th>
			          <th>Allowed Methods</th>
			          <th>Data Access</th>
			        </tr>
			        <tr>
			          <td>GET</td>
			          <td>:heavy_multiplication_x:</td>
			          <td>Not Allowed</td>
			        </tr>
			        <tr>
			          <td>POST</td>
			          <td>:heavy_multiplication_x:</td>
			          <td>Not Allowed</td>
			        </tr>
			        <tr>
			          <td>PUT</td>
			          <td>:heavy_check_mark:</td>
			          <td>Allows to add/change logo with appropriate suvrey edit permissions</td>
			        </tr>
			        <tr>
			          <td>DELETE</td>
			          <td>:heavy_multiplication_x:</td>
			          <td>Not Allowed</td>
			        </tr>
			      </table>
		  
		    - URL : `/api/survey/<Survey-ID>/change-logo/`

		    - Fields:
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
			          <td>logo</td>
			          <td>True</td>
			          <td>-</td>
			          <td>-</td>
			          <td>Image</td>
			          <td>-</td>
			          <td>Binary logo file you want to upload</td>
			        </tr>
			      </table>

			      Tip : For this request type, request Header Content-Type should be multipart/form-data

			- Get Request Query Filters: None

- **Share**

 	Api endpoint to view, add, edit & delete Shares.

 	Shares is only way that connects user & organisation to Evaluations and surveys.
 
    - Request Methods Allowed:
      <table>
        <tr>
          <th>Request Method</th>
          <th>Allowed Methods</th>
          <th>Data Access</th>
        </tr>
        <tr>
          <td>GET</td>
          <td>:heavy_check_mark:</td>
          <td>Can view shares of current organisation with evaluations and evaluation & survey shares with other users</td>
        </tr>
        <tr>
          <td>POST</td>
          <td>:heavy_check_mark:</td>
          <td>Can create shares of evaluations and evaluation's survey that are shared with current organisation</td>
        </tr>
        <tr>
          <td>PUT</td>
          <td>:heavy_check_mark:</td>
          <td>Can edit existing shares of evaluations and evaluation's survey that are shared with current organisation</td>
        </tr>
        <tr>
          <td>DELETE</td>
          <td>:heavy_check_mark:</td>
          <td>Can delete existing shares of evaluations and evaluation's survey that are shared with current organisation</td>
        </tr>
      </table>
  
    - URL : `/api/share/`
  
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
          <td>object_type</td>
          <td>True</td>
          <td>True</td>
          <td>-</td>
          <td>String</td>
          <td>-</td>
          <td>target type of the share object</td>
        </tr>
        <tr>
          <td>object_id</td>
          <td>True</td>
          <td>True</td>
          <td>-</td>
          <td>int</td>
          <td>-</td>
          <td>Id of the target object</td>
        </tr>
        <tr>
          <td>sharer_type</td>
          <td>True</td>
          <td>True</td>
          <td>-</td>
          <td>String</td>
          <td>-</td>
          <td>Sharer type of the share object</td>
        </tr>
        <tr>
          <td>sharer_id</td>
          <td>True</td>
          <td>True</td>
          <td>-</td>
          <td>int</td>
          <td>-</td>
          <td>Id of the sharer object</td>
        </tr>
        <tr>
          <td>relationship</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Choice</td>
          <td>-</td>
          <td>Relationship of share. creator, admin, editor, viewer</td>
        </tr>
        <tr>
          <td>shared_by</td>
          <td>True</td>
          <td>True</td>
          <td>-</td>
          <td>int</td>
          <td>-</td>
          <td>Id of the user that created the share object</td>
        </tr>
        <tr>
          <td>user</td>
          <td>-</td>
          <td>True</td>
          <td>-</td>
          <td>Json</td>
          <td>-</td>
          <td>Display linked user only if sharer_type is user</td>
        </tr>
      </table>

    - Fields Description:

    	- Relationship Types:
	 		- Creator : Have all permissions to edit survey and can also create another creater type share
	 		- Admin : Have all permissions to edit survey but can only edit editor and viewer type shares
	 		- Editor : Have some permissions to edit survey and can only edit viewer type shares
	 		- Viewer : Can only view survey and survey details

	 	- Sharer Types:
	 		- user : share tareget evaluation/survey/customreport with user
	 		- organisation : share tareget evaluation/survey/customreport with orgaisation

	 	- Target Types:
	 		- evaluation : user/organisation will get access to all survey's of shared evaluation
	 		- suvrey : user/organisation will get access to a specific survey data
	 		- customreport : user/organisation will get access to a specific custom minisite report data

	 	- Tips:
	 		- Targret and sharer are required when creating a share.
	 		- While editing target & sharer fileds are Non editable.
	 		- If you wish to change sharer or target then archive or delete current user share and create new share.
	 		- To archive share change tombstate of share to archived
	 		- To Delete share change tombstate of send a DELETE request to share api endpoint with valud share id.
	 		- sharer and target contains 2 sub types : id & type, In case of user as a sharer `sharer_type` will be `user` & `sharer_id` will be `<current_user_id>`. Same goes for target `object_type` will be `evaluation or survey or customreport` and object_id will be `<target_id>` 

    - Get Request Query Filters:
    <table>
        <tr>
          <th>Name</th>
          <th>Example</th>
          <th>Description</th>
        </tr>
        <tr>
          <td>sharer_id</td>
          <td>`/api/share/?sharer_id=1`</td>
          <td>Filter share by id of the sharer</td>
        </tr>
        <tr>
          <td>sharer_type</td>
           <td>`/api/share/?sharer_type=user`</td>
          <td>Filter share by type of the sharer</td>
        </tr>
        <tr>
          <td>object_id</td>
          <td>`/api/share/?object_id=1`</td>
          <td>Filter share by id of the target</td>
        </tr>
        <tr>
          <td>object_ids</td>
          <td>`/api/share/?object_ids=1,2,3`</td>
          <td>Filter shares by ids of the multiple target</td>
        </tr>
        <tr>
          <td>object_type</td>
           <td>`/api/share/?object_type=user`</td>
          <td>Filter share by type of the target</td>
        </tr>
        <tr>
          <td>relationship</td>
           <td>`/api/share/?relationship=admin`</td>
          <td>Filter share by relationship type</td>
        </tr>
      </table>

- **Question**

 	Api endpoint to view, add, edit & delete Questions of a survey.
 
    - Request Methods Allowed:
      <table>
        <tr>
          <th>Request Method</th>
          <th>Allowed Methods</th>
          <th>Data Access</th>
        </tr>
        <tr>
          <td>GET</td>
          <td>:heavy_check_mark:</td>
          <td>Can view questions of shared evaluation's survey</td>
        </tr>
        <tr>
          <td>POST</td>
          <td>:heavy_check_mark:</td>
          <td>Can create questions of shared evaluation's survey</td>
        </tr>
        <tr>
          <td>PUT</td>
          <td>:heavy_check_mark:</td>
          <td>Can edit questions of shared evaluation's survey</td>
        </tr>
        <tr>
          <td>DELETE</td>
          <td>:heavy_check_mark:</td>
          <td>Can delete questions of shared evaluation's survey</td>
        </tr>
      </table>
  
    - URL : `/api/question/`
  
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
          <td>name</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>String</td>
          <td>null</td>
          <td>Name of the question. Used for prefilled questions and differentiate between duplicate questions</td>
        </tr>
        <tr>
          <td>survey_id</td>
          <td>True</td>
          <td>False</td>
          <td>-</td>
          <td>int</td>
          <td>-</td>
          <td>ID of the survey question belongs to</td>
        </tr>
        <tr>
          <td>order</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>int</td>
          <td>auto increment</td>
          <td>Order on which question will appear on survey</td>
        </tr>
        <tr>
          <td>text</td>
          <td>True</td>
          <td>-</td>
          <td>-</td>
          <td>Text</td>
          <td>-</td>
          <td>Text that will be displayed on survey page</td>
        </tr>
        <tr>
          <td>core_type</td>
          <td>True</td>
          <td>-</td>
          <td>-</td>
          <td>Choice</td>
          <td>-</td>
          <td>Type of the question.</td>
        </tr>
        <tr>
          <td>input_type</td>
          <td>True</td>
          <td>-</td>
          <td>-</td>
          <td>Choice</td>
          <td>-</td>
          <td>Format in which we want user to answer the question</td>
        </tr>
        <tr>
          <td>options</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Json</td>
          <td>{}</td>
          <td>Options that allow survey question to work properly</td>
        </tr>
      </table>

    - Field Description:

    	- **Input types**
    		- slider
    		- date
    		- yesno
    		- number
    		- dropdown
    		- shorttext
    		- freetext
    		- message
    		- multiselect
    		- multiplechoice
    		- email

    	- **Core Types**

    		- custom
    		- dimension
    		- io
    		- demographics
    		- logic
    		- meta
    		- intelligence
    		- datafact

    	- **Options**

    		- required : If question is madatory to answer
    		- page
    		- choices : Choices of the question input type : dropdown, multiselect and multiplechoice
    		- child : sub question id
    		- instructions
    		- logic
    		- original_question_id
    		- dimension_id
    		- dimension_category_id
    		- tense
    		- parent_question
    		- child

    - Get Request Query Filters:
    <table>
        <tr>
          <th>Name</th>
          <th>Example</th>
          <th>Description</th>
        </tr>
        <tr>
          <td>survey_id</td>
          <td>`/api/question/?survey_id=1`</td>
          <td>Filter questions by survey</td>
        </tr>
        <tr>
          <td>survey_ids</td>
           <td>`/api/question/?survey_ids=1,2,3`</td>
          <td>Filter questions by more than one survey</td>
        </tr>
        <tr>
          <td>evaluation_id</td>
          <td>`/api/question/?evaluation_id=1`</td>
          <td>Filter questions by surveys of an evaluation</td>
        </tr>
        <tr>
          <td>evaluation_ids</td>
          <td>`/api/question/?evaluation_ids=1,2,3`</td>
          <td>Filter questions by surveys of multiple evaluations</td>
        </tr>
        <tr>
          <td>child</td>
           <td>`/api/question/?child=true`</td>
          <td>Filter questions if it's a sub question</td>
        </tr>
        <tr>
          <td>core_types</td>
           <td>`/api/question/?core_types=dimension`</td>
          <td>Filter type of question. Used in making reports and identify different type of data</td>
        </tr>
        <tr>
          <td>input_type</td>
           <td>`/api/question/?input_type=text`</td>
          <td>Filter questions according to the input type of the question</td>
        </tr>
      </table>

- **Slughash**

 	Api endpoint to view, add, edit & delete slugs.

 	Slugs are used to allow anonymous users to take survey.
 	There are 3 types of slugs : Public, Peer & Self
 
    - Request Methods Allowed:
      <table>
        <tr>
          <th>Request Method</th>
          <th>Allowed Methods</th>
          <th>Data Access</th>
        </tr>
        <tr>
          <td>GET</td>
          <td>:heavy_check_mark:</td>
          <td>Can view slugs of shared evaluation, survey or custom report</td>
        </tr>
        <tr>
          <td>POST</td>
          <td>:heavy_check_mark:</td>
          <td>Can add slugs of shared evaluation, survey or custom report when share relationship is not equal to viewer</td>
        </tr>
        <tr>
          <td>PUT</td>
          <td>:heavy_check_mark:</td>
          <td>Can edit slugs of shared evaluation, survey or custom report when share relationship is not equal to viewer</td>
        </tr>
        <tr>
          <td>DELETE</td>
          <td>:heavy_check_mark:</td>
          <td>Can delete slugs of shared evaluation, survey or custom report when share relationship is not equal to viewer</td>
        </tr>
      </table>
  
    - URL : `/api/slughash/`
  
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
          <td>object_type</td>
          <td>True</td>
          <td>True</td>
          <td>-</td>
          <td>String</td>
          <td>-</td>
          <td>Target of the slug. This value can be survey, evaluation or customreport</td>
        </tr>
        <tr>
          <td>object_id</td>
          <td>True</td>
          <td>True</td>
          <td>-</td>
          <td>int</td>
          <td>-</td>
          <td>Id of the target object</td>
        </tr>
        <tr>
          <td>seed</td>
          <td>True</td>
          <td>True</td>
          <td>-</td>
          <td>String</td>
          <td>-</td>
          <td>seed value of slughash</td>
        </tr>
        <tr>
          <td>slughash</td>
          <td>True</td>
          <td>True</td>
          <td>True</td>
          <td>String</td>
          <td>-</td>
          <td>Slughash value. This value is used to authenticate anonymous user for a survey</td>
        </tr>
        <tr>
          <td>options</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Json</td>
          <td>{}</td>
          <td>Various options of a slug like if this slug can be used by any unauthenticated user</td>
        </tr>
        <tr>
          <td>peer_invite</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>int</td>
          <td>-</td>
          <td>-</td>
        </tr>
      </table>

    - Get Request Query Filters:
    <table>
        <tr>
          <th>Namr</th>
          <th>Example</th>
          <th>Description</th>
        </tr>
        <tr>
          <td>seed</td>
          <td>`/api/slughash/?seed=khiuyqtb`</td>
          <td>Filter slughash by seed</td>
        </tr>
        <tr>
          <td>slughash</td>
          <td>`/api/slughash/?slughash=khiuyqtb`</td>
          <td>Filter slugs by slughash</td>
        </tr>
        <tr>
          <td>object_id</td>
          <td>`/api/slughash/?object_id=1`</td>
          <td>Id of the slug target</td>
        </tr>
        <tr>
          <td>object_ids</td>
          <td>`/api/slughash/?object_ids=1,2,3`</td>
          <td>Filter slughash by multiple targets</td>
        </tr>
        <tr>
          <td>object_type</td>
           <td>`/api/slughash/?object_type=survey`</td>
          <td>Filter slughash by type of the target</td>
        </tr>
        <tr>
          <td>respondent_category</td>
           <td>`/api/slughash/?respondent_category=public`</td>
          <td>Filter slughash by respondent category. It defines the type of access a slug will be granted</td>
        </tr>
        <tr>
          <td>user_id</td>
           <td>`/api/slughash/?user_id=1`</td>
          <td>Filter slugs that is linked to a specific user</td>
        </tr>
        <tr>
          <td>deliverable_type</td>
           <td>`/api/slughash/?deliverable_type=online`</td>
          <td>Filter slugs by deliverable type</td>
        </tr>
      </table>

    - Slughash options:

    	- respondent_category
    	- deliverable_type

- **Survey Response**

 	Api endpoint to view, add, edit & delete survey responses.
 
    - Request Methods Allowed:
      <table>
        <tr>
          <th>Request Method</th>
          <th>Allowed Methods</th>
          <th>Data Access</th>
        </tr>
        <tr>
          <td>GET</td>
          <td>:heavy_check_mark:</td>
          <td>Can view survey responses of shared evaluations</td>
        </tr>
        <tr>
          <td>POST</td>
          <td>:heavy_check_mark:</td>
          <td>Can add survey response for only apikey user</td>
        </tr>
        <tr>
          <td>PUT</td>
          <td>:heavy_check_mark:</td>
          <td>Can edit survey responses of shared evaluations</td>
        </tr>
        <tr>
          <td>DELETE</td>
          <td>:heavy_multiplication_x:</td>
          <td>Can not delete responses</td>
        </tr>
      </table>
  
    - URL : `/api/surveyresponse/`
  
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
          <td>survey_id</td>
          <td>True</td>
          <td>True</td>
          <td>-</td>
          <td>int</td>
          <td>-</td>
          <td>ID of the survey</td>
        </tr>
        <tr>
          <td>user_id</td>
          <td>True</td>
          <td>-</td>
          <td>-</td>
          <td>int</td>
          <td>-</td>
          <td>Id of the respondent</td>
        </tr>
        <tr>
          <td>valid</td>
          <td>-</td>
          <td>True</td>
          <td>-</td>
          <td>Boolean</td>
          <td>False</td>
          <td>True if survey response has any answered question response</td>
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
          <td>survey_id</td>
          <td>`/api/surveyresponse/?survey_id=1`</td>
          <td>Filter response by survey</td>
        </tr>
        <tr>
          <td>user_id</td>
           <td>`/api/surveyresponse/?user_id=user`</td>
          <td>Filter responses by respondent</td>
        </tr>
        <tr>
          <td>slughash</td>
          <td>`/api/surveyresponse/?slughash=qqln32`</td>
          <td>Filter responses by slughash</td>
        </tr>
      </table>

- **Question Response**

 	Api endpoint to view, add, edit & delete Question responses.
 
    - Request Methods Allowed:
      <table>
        <tr>
          <th>Request Method</th>
          <th>Allowed Methods</th>
          <th>Data Access</th>
        </tr>
        <tr>
          <td>GET</td>
          <td>:heavy_check_mark:</td>
          <td>Can view responses of shared evaluations</td>
        </tr>
        <tr>
          <td>POST</td>
          <td>:heavy_check_mark:</td>
          <td>Can add his own response</td>
        </tr>
        <tr>
          <td>PUT</td>
          <td>:heavy_check_mark:</td>
          <td>Can edit his own response</td>
        </tr>
        <tr>
          <td>DELETE</td>
          <td>:heavy_check_mark:</td>
          <td>Can delete his own response</td>
        </tr>
      </table>
  
    - URL : `/api/questionrespone/`
  
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
          <td>survey_response_id</td>
          <td>True</td>
          <td>True</td>
          <td>-</td>
          <td>int</td>
          <td>-</td>
          <td>Id of survey response</td>
        </tr>
        <tr>
          <td>question_id</td>
          <td>True</td>
          <td>True</td>
          <td>-</td>
          <td>int</td>
          <td>-</td>
          <td>Id of the question</td>
        </tr>
        <tr>
          <td>question</td>
          <td>True</td>
          <td>True</td>
          <td>-</td>
          <td>Json</td>
          <td>-</td>
          <td>Question object in json format</td>
        </tr>
        <tr>
          <td>value</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Json</td>
          <td>-</td>
          <td>value of the response</td>
        </tr>
        <tr>
          <td>version</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>int</td>
          <td>-</td>
          <td>to edit response you have tp update version of the object.</td>
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
          <td>survey_response_id</td>
          <td>`/api/questionrespone/?survey_response_ider_id=1`</td>
          <td>Filter responses by survey response</td>
        </tr>
        <tr>
          <td>question_id</td>
           <td>`/api/questionrespone/?question_id=1`</td>
          <td>Filter responses by question</td>
        </tr>
        <tr>
          <td>evaluation</td>
          <td>`/api/questionrespone/?evaluation=1`</td>
          <td>Filter responses by evaluation</td>
        </tr>
        <tr>
          <td>survey</td>
          <td>`/api/questionrespone/?survey=1`</td>
          <td>Filter responses by survey</td>
        </tr>
      </table>

- **Datafacts**
 	Api endpoint to view, add, edit & delete datafacts.
 
    - Request Methods Allowed:
      <table>
        <tr>
          <th>Request Method</th>
          <th>Allowed Methods</th>
          <th>Data Access</th>
        </tr>
        <tr>
          <td>GET</td>
          <td>:heavy_check_mark:</td>
          <td>Can view datafacts of shared evaluations and apikey's organisation</td>
        </tr>
        <tr>
          <td>POST</td>
          <td>:heavy_check_mark:</td>
          <td>Can create datafacts for shared evaluations</td>
        </tr>
        <tr>
          <td>PUT</td>
          <td>:heavy_check_mark:</td>
          <td>Can edit datafacts for shared evaluations</td>
        </tr>
        <tr>
          <td>DELETE</td>
          <td>:heavy_check_mark:</td>
          <td>Can delete datafacts for shared evaluations</td>
        </tr>
      </table>
  
    - URL : `/api/datafact/`
  
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
          <td>object_type</td>
          <td>True</td>
          <td>True</td>
          <td>-</td>
          <td>String</td>
          <td>-</td>
          <td>target type of the datafact object</td>
        </tr>
        <tr>
          <td>object_id</td>
          <td>True</td>
          <td>True</td>
          <td>-</td>
          <td>int</td>
          <td>-</td>
          <td>Id of the target object</td>
        </tr>
        <tr>
          <td>name</td>
          <td>True</td>
          <td>-</td>
          <td>-</td>
          <td>String</td>
          <td>-</td>
          <td>Name of the datafact</td>
        </tr>
        <tr>
          <td>value</td>
          <td>-</td>
          <td>-</td>
          <td>-</td>
          <td>Json</td>
          <td>{}</td>
          <td>value of datafact object</td>
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
          <td>object_id</td>
          <td>`/api/datafact/?object_id=1`</td>
          <td>Filter datafact by id of the target</td>
        </tr>
        <tr>
          <td>object_ids</td>
          <td>`/api/share/?object_ids=1,2,3`</td>
          <td>Filter datafact by ids of the multiple target</td>
        </tr>
        <tr>
          <td>object_type</td>
           <td>`/api/datafact/?object_type=user`</td>
          <td>Filter datafact by type of the target</td>
        </tr>
        <tr>
          <td>name</td>
           <td>`/api/datafact/?name=location`</td>
          <td>Filter datafact by name</td>
        </tr>
      </table>

 
