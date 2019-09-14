from ccrequest import CCRequest
import json


cc = CCRequest()

# cc.login()

data = cc.put("evaluation", 4651, {"name": "newqwer"})

print(json.dumps(data, indent=4, sort_keys=True))


data = cc.get("evaluation")

print(json.dumps(data, indent=4, sort_keys=True))


data = cc.post("evaluation", {"name": "nwdwdwewqwer"})

print(json.dumps(data, indent=4, sort_keys=True))