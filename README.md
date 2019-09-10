# Culture Counts API

To use the Culture Counts API you must have an API key. The API key is a unique identifier that is used to authenticate requests associated with your organisation.

Authentication with an API key avoids needing to store your culture counts password or other credential information on your machine. API keys have security benefits over passwords (they are tied to a specific organisation & user, they're usually configured to expire, and they can be revoked), but a valid API key provides complete access to your data and actions, so it should be kept secret.

Please contact  [culture counts administrators](https://culturecounts.cc/contact/?topic=support) to get an API key for your organisation.

## Apikey Data model

Apikey is linked to an organisation and a user.
It can only access, create or edit data that belongs to its organisation.

Apikey have multiple type of capabilities or in api it's specified as current user roles. Permissions granted to any user depends upon these roles. 

Apikey has 5 type of capabilities/roles:
1) **Read** - It's specified as `Apikey_view` role. It states that apikey should be able to read organisation related data from culture counts api.

2) **Write** - It's specified as `Apikey_add` role. It states that apikey should be able to add organisation related data from culture counts api.
ex : Creating evaluation, survey & checking responses

2) **Edit** - It's specified as `Apikey_edit` role. It states that apikey should be able to edit organisation related data from culture counts api.

4) **Delete** - It's specified as `Apikey_delete` role. It states that apikey should be able to delete organisation related data from culture counts api.

5) **Superuser** - It's specified as `Apikey_superuser` role. It states that superuser apikey should be able to so some things that are only granted to special users like adding users to organisation, editing organisation details or can edit survey responses.



## Getting Started with Authentication Requirements
_Authorization_ refers to the process of determining what permissions an authenticated client has for a set of resources.

For Authentication user needs only a valid apikey.

#### Using an API key

For Authorization you need to send APIkey to `/api/auth/login/` as post request.
your apikey should look like : `4GPxY2qN9EdBgVo1XoCJsaXU9fGm` and we will use this apikey as example references for our demo as well.

CURL Request Example apikey login:

```
curl -i -H "Accept: application/json" -H "Content-Type: application/json" -d '{"apikey": "4GPxY2qN9EdBgVo1XoCJsaXU9fGm"}' -X POST https://gaurav.new-dev.culturecounts.cc/api/auth/login/
```


CURL request breakdown:
```
- URL : https://gaurav.new-dev.culturecounts.cc/api/auth/login/
- Headers:
  - Accept : application/json
  - Content-Type : application/json
  
- Request Type : POST

- Data:
  - apikey : 4GPxY2qN9EdBgVo1XoCJsaXU9fGm
```

#### Api Response

Api response will be in JSON Format.
A successful authentication response looks like:

```
{
  "demographics": {},
  "auth": "logged_in",
  "user": {
    "id": 1704751,
    "client_id": null,
    "created": "2019-09-09T02:55:50.777253Z",
    "modified": "2019-09-09T02:56:11.742980Z",
    "tombstate": null,
    "email": "",
    "is_active": true,
    "roles": ["Apikey_view", "Apikey_edit", "Apikey_add", "Apikey_delete", "Apikey_superuser"],
    "names": ["", ""],
    "settings": {},
    "organisations": []
  },
  "csrftoken": "fqO0HRiLvtUUsGOjRDnLBWWUZLykcaTn",
  "organisation_context": {
    "has_peers": false,
    "name": "Example Organisation",
    "created": "2019-09-09T02:54:11.948889Z",
    "modified": "2019-09-09T02:55:50.761153Z",
    "licensee": "none",
    "verticals": [1, 2, 4, 5, 8, 9, 10, 12, 13, 15, 16, 17, 18, 19, 20, 21, 22, 24, 25, 27, 28, 29, 30],
    "avatar": "EO",
    "client_id": null,
    "tombstate": null,
    "id": 794,
    "features": []
  },
  "token-id": "ws4ediybhi6j3feryc5bgcq7i063t8jk"
}
```

Response breakdown:

```
- demographics : Legacy field

- auth : States if user is logged in

- user : User associated with apikey that is currently logged in.
    - roles : Capabilities of an apikey
    - is_active : Boolean to show that current user can access system.

- csrftoken : Security token required for authorization

- organisation_context : Apikey organsisation details
    - name : Name of the organisation

- token-id : AuthToken that you will require for api authorization.
```


###  Apikey AuthToken

Apikey AuthToken is required to validate api session.
You need to add auth token in request headers to do successful api requests.

CURL Request Example for getting auth status:

```
curl -i -H "Accept: application/json" -H "authtoken: ws4ediybhi6j3feryc5bgcq7i063t8jk" -H "Content-Type: application/json" -X GET https://gaurav.new-dev.culturecounts.cc/api/auth/status/
```

You need to add auth token in each request header else request will not be considered from active user.
Authtoken and csrftoken can be fetched by requesting on `/api/auth/status/`

Auth status will return same response that we get after login request:

```
{
  "demographics": {},
  "auth": "logged_in",
  "user": {
    "id": 1704751,
    "client_id": null,
    "created": "2019-09-09T02:55:50.777253Z",
    "modified": "2019-09-09T02:56:11.742980Z",
    "tombstate": null,
    "email": "",
    "is_active": true,
    "roles": ["Apikey_view", "Apikey_edit", "Apikey_add", "Apikey_delete", "Apikey_superuser"],
    "names": ["", ""],
    "settings": {},
    "organisations": []
  },
  "csrftoken": "fqO0HRiLvtUUsGOjRDnLBWWUZLykcaTn",
  "organisation_context": {
    "has_peers": false,
    "name": "Example Organisation",
    "created": "2019-09-09T02:54:11.948889Z",
    "modified": "2019-09-09T02:55:50.761153Z",
    "licensee": "none",
    "verticals": [1, 2, 4, 5, 8, 9, 10, 12, 13, 15, 16, 17, 18, 19, 20, 21, 22, 24, 25, 27, 28, 29, 30],
    "avatar": "EO",
    "client_id": null,
    "tombstate": null,
    "id": 794,
    "features": []
  },
  "token-id": "ws4ediybhi6j3feryc5bgcq7i063t8jk"
}
```


### Request to api endpoints

#### Request Types
APIkey user can do 4 types of request to a culture counts api endpoint.

| Request Type | Request Method |
|--|--|
| Read | GET Request Method  |
| Write | POST Request Method  |
| Edit | PUT Request Method  |
| Delete | DELETE Request Method  |

####  GET Request

User can fetch data using 3 type of queries:

1) **List view** : Get all objects current user can fetch.

  example: `https://gaurav.new-dev.culturecounts.cc/api/user/`
  Arguments passed : `None`
  Result : List of all users that belongs to current apikey's organisation

2) **Object view** : Get object specified in url by id
  example: `https://gaurav.new-dev.culturecounts.cc/api/user/<ID>/`
  Arguments passed : `user id`
  Result : Get specific object if user belongs to current logged in apikey's organisation.

3) **Query Filters** : A way to filter data according to query requirement
  example: `https://gaurav.new-dev.culturecounts.cc/api/user/?is_active=True`
  Arguments passed : `Get request argument : is_active`
  Result : List of all users that belongs to current apikey's organisation and is_active boolean is true.

####  POST Request

####  PUT Request

####  DELETE Request


### CultureCounts api endpoints

* **Auth**
* **Users**
* **Organisation**
* **Evaluation**
* **Survey**
* **Share**
* **Question**
* **Slughash**
* **Survey Response**
* **Question Response**
* **Datafacts**
* **Dimension**
* **Dimension Category**
 
