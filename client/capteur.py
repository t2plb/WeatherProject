import os
import datetime
import json
import requests
import time
import Adafruit_DHT

url = 'http://127.0.0.1/post.php'

if not os.path.exists('./json'):
    os.makedirs('./json')


cap = Adafruit_DHT.DHT11
pin = 23
date = datetime.datetime.today().strftime('%Y-%m-%d %H%M%S')
nom = "./json/" + date + '.json'
    
Humidite, Temperature = Adafruit_DHT.read_retry(cap, pin)
    
data = {
    "datetime": date,
    "temp": Temperature,
    "humi": Humidite
    }
        
DumpedData = json.dumps(data)
    
req = requests.post(url, params={"json": DumpedData})
if req.status_code != 200:
    with open(nom, 'w') as file:
        json.dump(data, file)