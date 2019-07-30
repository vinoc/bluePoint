<?php
/**
 * Created by PhpStorm.
 * User: Amelvin
 * Date: 30/01/2019
 * Time: 15:47
 */

?>
<main id="connexion">

<section class="container centre">
    <h1>Connexion</h1>
    <article>
    <?php

    if($member->isIdentify()== true)
    {
        echo 'Vous êtes déjà connecté';
        die;
    }

    ?>
    <div class="row">
        <div class="col-6">
            <p><?php echo $errorConnexion; ?></p>
        </div>
    </div> <!-- ROW -->


            <form action="connecting" method="post" >
                <div class = 'row justify-content-sm-center'>
                <div class="col-sm-3">
                    <p><?php echo $errorLogin; ?></p>
                    <label for="login" class="outOfScreen">login:</label><br />
                    <input type="text" name="login" id="login" required placeholder="Login"/>
                </div>
                <div class="col-sm-3">
                    <p><?php echo $errorPassword; ?></p>
                    <label for="password" class="outOfScreen">Mot de passe:</label><br />
                    <input type="password" name="password" id="password" required placeholder="Mot de passe"/>
                </div>
                </div> <!-- ROW -->
                <div class="row">
<div class="col-sm margin-top">
                <input type="submit" value="Connexion" />
</div>
                </div><!-- ROW  -->

            </form>




    <div id="pasDeCompte"><a href="inscription">Pas de compte ?</a></div>

</section>

</main>