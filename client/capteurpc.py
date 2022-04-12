import datetime
import json
import requests
import time

url = 'http://127.0.0.1/post.php'
def loop():

    date = datetime.datetime.today().strftime('%Y-%m-%d %H%M%S')
    nom = "C:/Users/titou/Projet/ProjetMeteo/json/" + date + '.json'

    Temperature = int(12)
    Humidite = int(50)
    
    data = {
        "datetime": date,
        "temp": Temperature,
        "humi": Humidite
        }
        
    DumpedData = json.dumps(data)
    
    req = requests.post(url, params={"json": DumpedData})
    print(req.status_code)
    if req.status_code != 200:
        with open(nom, 'w') as file:
            json.dump(data, file)

    time.sleep(3600)
    loop()

loop()