import requests
import json
import urllib
import config as c


class CCRequest:

    def __init__(self, apikey=None):

        self.authtoken = None
        self.csrftoken = None

        if not apikey:
            apikey = c.APIKEY
        self.apikey = apikey

        self.headers = {
            "Accept" : "application/json",
            "Content-Type" : "application/json",
            # "Referer": c.BASE_URL,
            "authtoken": "d1ul0ym8jkpruchlszvg9ovfl95ucyi4"
        }

    def ccURL(self, model, id=None, queryset=None):
        """
        """
        if model in c.AUTH_MODELS:
            # Generate auth api urls
            url = "%s/%s/%s/" %(
                c.BASE_URL, "auth", model
            )
        else:
            if id != None:
                # Specific object
                url = "%s/%s/%d/" %(
                    c.BASE_URL, model, id
                )
            else:
                # List view url
                url = "%s/%s/" %(c.BASE_URL, model)

        if queryset:
            # Filters
            url = url + "?" + urllib.urlencode(queryset) 

        return url

    def return_format(self, response):
        return {
            "status": response.status_code,
            "data": json.loads(response.content)
        }


    def login(self):
        """
        """
        url = self.ccURL("login")
        payload = {"apikey": self.apikey}
        response = requests.post(
            url, data=json.dumps(payload), headers=self.headers
        )

        data = json.loads(response.content)
        if response.status_code == 200:
            self.authtoken = data["token-id"]
            self.csrftoken = data["csrftoken"]

            self.headers["X-CSRFToken"] = self.csrftoken
            self.headers["authtoken"] = self.authtoken

        return data


    def get(self, model, id=None, queryset={}):
        """
        """
        return self.return_format(
            requests.get(
                self.ccURL(model, id, queryset), 
                headers=self.headers
            )
        )

    def post(self, model, payload={}):
        """
        """
        return self.return_format(
            requests.post(
                self.ccURL(model),
                data=json.dumps(payload),
                headers=self.headers
            )
        )

    def put(self, model, id=None ,payload={}):
        """
        """
        return self.return_format(
            requests.put(
                self.ccURL(model, id),
                data=json.dumps(payload),
                headers=self.headers
            )
        )

    def patch(self, model, id=None ,payload={}):
        """
        """
        return self.return_format(
            requests.patch(
                self.ccURL(model, id),
                data=json.dumps(payload),
                headers=self.headers
            )
        )

    def delete(self, model, id=None):
        """
        """
        return self.return_format(
            requests.delete(
                self.ccURL(model, id),
                headers=self.headers
            )
        )
