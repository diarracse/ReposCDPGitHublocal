<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .form-container {
            border-radius: 10px;
            padding: 20px;
            max-width: 788px;
            margin: 50px auto;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
            overflow: hidden;
        }
        .form-container h2 {
            text-align: center;
            margin-top: 25px;
            margin-bottom: 90px;
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 79px;
            position: relative;
            text-align: center;
        }
        .form-group label {
            font-weight: bold;
            color: #000;
            position: absolute;
            top: -12px;
            left: 12%;
            background: #ffffff;
            padding: 0 5px;
        }
        .form-control {
            width: 75%; /* Réduction de la largeur */
            border: 3px solid #f05423;
            border-radius: 0 25px 25px 25px;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            display: block;
            margin: 0 auto;
        }
        .form-control:focus {
            outline: none;
            border-color: #f05423;
            box-shadow: 0 4px 8px rgba(240, 84, 35, 0.5);
        }
        .btn-primary {
            background-color: rgba(255, 255, 255, 0);
            border: 2px solid #d9451e;
            border-radius: 25px;
            width: 150px;
            height: 50px;
            color: #f05423;
            font-size: 16px;
            display: block;
            margin: 50px auto;
            text-align: center;
            line-height: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            color: white;
            background-color: #d9451e;
        }

        p.mt-3 {
            margin-top: 30px;
            text-align: center;
            font-size: 14px;
        }

        p.mt-3 a {
            color: #f05423;
            text-decoration: none;
        }

        p.mt-3 a:hover {
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .form-container {
                max-width: 90%;
                padding: 15px;
            }

            .form-control {
                font-size: 14px;
                width: 90%; /* Réduction de la largeur sur mobile */
            }

            .btn-primary {
                width: 120px;
                height: 40px;
                font-size: 14px;
                line-height: 40px;
            }

            p.mt-3 {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Inscription</h2>
    <form>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" id="nom" class="form-control" required placeholder="Votre nom">
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" class="form-control" required placeholder="Votre prénom">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" required placeholder="Votre email">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" class="form-control" required placeholder="Votre mot de passe">
        </div>
        <div class="form-group">
            <label for="confirm-password">Confirmer mot de passe</label>
            <input type="password" id="confirm-password" class="form-control" required placeholder="Confirmer votre mot de passe">
        </div>
        <div class="form-group">
            <label for="type-adhesion">Type d'adhésion</label>
            <select id="type-adhesion" class="form-control">
                <option value="" disabled selected>Choisissez une option</option>
                <option>Option 1</option>
                <option>Option 2</option>
            </select>
        </div>
        <button type="submit" class="btn-primary">Envoyer</button>
        <p class="mt-3">Vous avez déjà un compte ? <a href="seConnecter.php">Se connecter</a></p>
    </form>
</div>

</body>
</html>
