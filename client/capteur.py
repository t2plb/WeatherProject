import datetime
import json
import requests
import time
import Adafruit_DHT

def loop():

    cap = Adafruit_DHT.DHT11
    pin = 23
    date = datetime.datetime.today().strftime('%Y-%m-%d %H%M%S')
    nom = "/home/pi/WeatherProject/json" + date + '.json'
    
    Temperature, Humidite = Adafruit_DHT.read_retry(cap, pin)
    
    data = {
        "Date": date,
        "Temperature": Temperature,
        "Humidite": Humidite
        }
        
    DumpedData = json.dumps(data)
    
    req = requests.post('http://X.X.X.X/post.php', params=DumpedData)
    print(req.status_code)
    time.sleep(5)
    if req.status_code != 200:
        with open(nom, 'w') as file:
            json.dump(data, file)

    time.sleep(3600)
    loop()

loop()