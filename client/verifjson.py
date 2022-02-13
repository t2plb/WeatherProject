import os

def loop():
    if (os.listdir("C:/Users/titou/Projet/ProjetMeteo/json")) == 0:
        loop()
    else:
            data = os.listdir("C:/Users/titou/Projet/ProjetMeteo/json")
            file = "C:/Users/titou/Projet/ProjetMeteo/json/" + data[0]
            os.remove(file)
            data = os.listdir("C:/Users/titou/Projet/ProjetMeteo/json")
            if (len(data)) == 0:
                loop()
    loop()

loop()