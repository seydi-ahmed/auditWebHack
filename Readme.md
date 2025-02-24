# Low - Injection SQL (SQLi)
## Définition:
L'injection SQL permet à un attaquant d'insérer (ou "injecter") du code SQL malveillant dans une requête SQL. Cela peut permettre à l'attaquant de manipuler des bases de données pour exfiltrer des informations sensibles, modifier des données ou même prendre le contrôle de la base de données.
## Comment l'utiliser:
Si tu as une page qui prend des entrées utilisateur, comme un champ de connexion, tu peux essayer d'injecter une commande SQL malveillante. Par exemple, dans un champ de "username", tu peux essayer: ```' OR 1=1 --```
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