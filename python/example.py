from ccrequest import CCRequest
import json


cc = CCRequest()

cc.login()

data = cc.get("user")

print(json.dumps(data, indent=4, sort_keys=True))