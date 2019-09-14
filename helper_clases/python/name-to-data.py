


fields = ["Field", "Required", "Readonly", "Unique", "Type", "Choices", "Default Value", "Description / Example"]


model = ""
data = []


loop = 1

while loop:
	in_data = []
	for field in fields:
		g = raw_input("%s: " % field)
		in_data.append(g)

	data.append(in_data)

	c = raw_input("Want to continue:")

	if c == "n":
		loop = 0





thead = []
trs = []
for f in fields:
	thead.append("<th>%s</th>" %f)

thead_string ="<tr>" + "".join(thead) + "</tr>"

for d in data:
	tds = []
	for v in d:
		tds.append("<td>%s</td>" %v)

	trs.append("<tr>" + "".join(tds) + "</tr>")


tr_string = "\n".join(trs)

s = "<table><thead>%s</thead><tbody>%s</tbody></table>" %(thead_string, tr_string)

fi = open("test.html", "wb")

fi.write(s)
fi.close()