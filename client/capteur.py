import datetime
import json

date = datetime.datetime.today().strftime('%Y-%m-%d %H')
nom = date + '.json'

Temperature = int(12)
Pression = int(1023)
Hygrometrie = int(50)

data = {
    "Date": date,
    "Temperature": Temperature,
    "Pression": Pression,
    "Hygrometrie": Hygrometrie
}

with open(nom, 'w') as file:
    json.dump(data, file)