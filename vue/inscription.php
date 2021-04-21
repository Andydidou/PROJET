<!DOCTYPE HTML>
<html lang="fr">
    <!-- Banner -->
    <section id="banner">
    </section>
    <!-- Main -->
    <section id="main" class="container">
        <section class="box special">
            <header class="major">
                <h2>Inscription</h2><br>
                <form method="post" action="inscription.php">
                    <label>
                        Nom:
                        <input type="text" name="nom">
                    </label>
                    <br />
                    <label>
                        Prénom:
                        <input type="text" name="prenom">
                    </label>
                    <br />
                    <label>
                        Téléphone:
                        <input type="text" name="telephone">
                    </label>
                    <br />
                    <label>
                        Adresse Mail:
                        <input type="text" name="mail">
                    </label>
                    <br />
                    <label>
                        Etes vous à risque ?
                        <select name="risque">
                            <option value=1> oui</option>
                            <option value=0> non</option>
                        </select>
                    </label>
                    <br />
                    <label>
                        Age:
                        <input type="text" name="age">
                    </label>
                    <br />
                    <label>
                        Login:
                        <input type="text" name="login">
                    </label>
                    <br />
                    <label>
                        Mot de passe :
                        <input type="password" name="mdp">
                    </label>
                    <br />
                    <input type="submit" value="S'inscrire">
                </form>
                <a href="index.php?ctl=connexion">Déjà inscrit ? Connectez vous ici</a>
            </header>
        </section>
    </section>
</html>