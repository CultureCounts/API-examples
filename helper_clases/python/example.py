from ccrequest import CCRequest
import json


cc = CCRequest()

cc.login()


print "Get user status"
data = cc.get("status")

print(json.dumps(data, indent=4, sort_keys=True))


data = cc.get("evaluation")

print(json.dumps(data, indent=4, sort_keys=True))


data = cc.post("evaluation", {"name": "New Evaluation"})

print(json.dumps(data, indent=4, sort_keys=True))