import datetime
import json
import requests
import time

date = datetime.datetime.today().strftime('%Y-%m-%d %H%M%S')
nom = "C:/Users/titou/Projet/ProjetMeteo/json/" + date + '.json'

def loop():
    
    date = datetime.datetime.today().strftime('%Y-%m-%d %H%M%S')
    nom = "C:/Users/titou/Projet/ProjetMeteo/json/" + date + '.json'
    
    Temperature = int(12)
    Pression = int(1023)
    Hygrometrie = int(50)
    
    data = {
        "Date": date,
        "Temperature": Temperature,
        "Pression": Pression,
        "Hygrometrie": Hygrometrie
        }
        
    DumpedData = json.dumps(data)
    
    req = requests.post('http://x.x.x.x/post', DumpedData)
    
    if req.status_code != 200:
        with open(nom, 'w') as file:
            json.dump(data, file)

    time.sleep(3600)
    loop()

loop()