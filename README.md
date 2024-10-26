MiniBank

Description du projet

MiniBank est une plateforme web de gestion de transactions d'argent conçue pour une petite structure de transfert d'argent. Cette solution permet aux utilisateurs de réaliser des dépôts, des retraits, et des transferts d'argent de manière sécurisée. Elle offre également des fonctionnalités spécifiques pour les agents et distributeurs, leur permettant de gérer les comptes des clients et de suivre leurs transactions.

Fonctionnalités principales :

Agents :

Création de comptes pour les clients et distributeurs.
Modification, blocage ou déblocage de comptes.
Créditer les comptes distributeurs.
Annuler des transactions clients.

Distributeurs :

Effectuer des dépôts et des retraits pour les clients.
Consulter leur solde et suivre leurs transactions.
Annuler des transactions.

Clients :

Gérer leurs comptes (création, modification).
Transférer de l'argent à d'autres utilisateurs.
Voir leur solde et historique des transactions.
Demander une carte et effectuer des transactions via un QR code.

Architecture du projet

Le projet est basé sur un modèle MVC (Model-View-Controller) utilisant le framework Laravel 11 pour gérer les différentes fonctionnalités. L'application est découpée en plusieurs classes, représentées dans un diagramme UML ( pour le diagrame de classe https://drive.google.com/file/d/1kWDm2HYNcxu_1hn1gvMk2Cts8EMBFrOu/view?usp=sharing   et pour le diagramme de sequence https://drive.google.com/file/d/1Yd96XVeYvn55qLTyuYCUnwVFoRIhWkO0/view?usp=sharing .

Technologies utilisées :

Framework : Laravel 11

Front-end : HTML, CSS, JavaScript

Base de données : MySQL

Sécurité : Authentification avec Laravel Breeze

Autres : Websocket pour les transactions en temps réel


Installation et utilisation

PHP >= 8.0
Composer
MySQL
Node.js et npm

Utilisation de l'application

1. Agent
L'agent est un utilisateur avec des privilèges d'administration qui gère les comptes des clients et des distributeurs. Voici les actions détaillées qu'un agent peut effectuer sur la plateforme MiniBank :

Connexion : L'agent se connecte à l'application avec ses identifiants personnels (Numero de Telephone et mot de passe).

Une fois connecté, l'agent accède à un tableau de bord contenant les actions qu'il peut entreprendre sur les comptes des utilisateurs.
Création de comptes :

L'agent peut créer un compte pour un client ou un distributeur en saisissant leurs informations personnelles : nom, prénom, numéro de téléphone, photo, adresse, numéro de carte d'identité, et autres informations nécessaires.
Une fois le compte créé, un identifiant unique est généré pour l'utilisateur.
Modification et gestion des comptes :

L'agent peut modifier les informations d'un utilisateur existant (par exemple, changer une adresse ou un numéro de téléphone).
Il peut également bloquer un compte si nécessaire, par exemple en cas de fraude ou de demande d'annulation. Un compte bloqué ne peut plus effectuer de transactions jusqu'à ce qu'il soit débloqué.
Créditer un compte distributeur :

L'agent a le pouvoir de créditer les comptes des distributeurs. Cela signifie qu'il peut ajouter un montant au compte d'un distributeur, ce qui permettra à ce dernier d'effectuer des transactions pour le compte de ses clients.
Annuler des transactions clients :

Si une transaction réalisée par un client est incorrecte ou doit être annulée pour une raison spécifique, l'agent peut annuler la transaction. Une annulation peut être demandée par le client ou décidée par l'agent en fonction de la situation.
2. Distributeur
Le distributeur agit comme un intermédiaire entre la plateforme et les clients pour les opérations de dépôt et de retrait. Voici comment un distributeur utilise l'application :

Connexion : Le distributeur se connecte à son compte avec ses identifiants (numéro de téléphone et mot de passe).

Il accède à un tableau de bord où il peut consulter son solde, voir son historique de transactions et effectuer des opérations pour les clients.
Effectuer des dépôts et retraits :

Lorsqu'un client veut déposer de l'argent, le distributeur entre les détails du compte du client (numéro de compte ou QR code), puis enregistre le dépôt. Le solde du client est immédiatement mis à jour.
Pour les retraits, le distributeur doit vérifier que le compte client n'est pas bloqué et s'assurer que le solde est suffisant avant d'effectuer la transaction.
Consulter le solde et l'historique :

Le distributeur peut consulter son propre solde (qui est crédité de 1% de chaque transaction effectuée) ainsi que son historique complet de transactions.

3. Client
Le client utilise l'application pour gérer ses finances personnelles, effectuer des transferts, et consulter son solde et ses transactions. Voici les principales fonctionnalités :

Connexion : Le client se connecte avec ses identifiants (numéro de téléphone et mot de passe) et accède à un tableau de bord simple et intuitif.

Consulter le solde :

Une fois connecté, le client peut voir son solde directement sur la page d'accueil. Il peut également choisir de masquer son solde pour des raisons de confidentialité.
Transférer de l'argent :

Le client peut transférer de l'argent à un autre utilisateur de la plateforme en entrant le numéro de compte du destinataire .
Chaque transfert est soumis à une commission de 2% qui est automatiquement prélevée sur le montant transféré.
Une fois la transaction validée, le solde est mis à jour en temps réel .
Voir l'historique des transactions :

Le client a accès à l'historique complet de ses transactions : dépôts, retraits, et transferts.
Chaque transaction est détaillée avec la date, le montant, le type (dépôt, retrait, transfert) .

Utilisation du QR code :

Chaque client possède un QR code unique qui contient son numéro de compte. Ce QR code peut être scanné par un distributeur pour faciliter les transactions de dépôt ou de retrait, évitant ainsi l'entrée manuelle du numéro de compte.



Auteur

Projet développé par Anta Maguette Faye,Yaye Fatou Kane, Fatou Bintou Sané, Abou Abdrahmane Sow et Ousmane Fall dans le cadre d'une formation en développement web.

