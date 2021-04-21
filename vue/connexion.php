<!DOCTYPE HTML>
<html lang="fr">
<!-- Banner -->
<section id="banner">
</section>
<!-- Main -->
    <section id="main" class="container">
        <section class="box special">
            <header class="major">
                <?php
                    if (isset($_GET['err'])) {
                ?>
                <div><p>Les identifiants ne correspondent pas !</p></div>
                <?php
                    }
                ?>
                <h2>Connexion</h2><br>
                <form method="POST" action="index.php?ctl=login&action=valconnect">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Login requis">
                            <span class="label-input100">Login</span>
                        <label>
                            <input class="input100" type="text" name="login" placeholder="Entrer login">
                        </label>
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Mot de passe requis">
                        <span class="label-input100">Mot de passe</span>
                        <label>
                            <input class="input100" type="password" name="pass" placeholder="Entrer mot de passe">
                        </label>
                        <span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Connexion
						</button>
					</div>
                </form>
                <a href="index.php?ctl=inscription">Pas inscrit ? Inscrivez vous ici</a>
            </header>
        </section>
	</section>
</html>