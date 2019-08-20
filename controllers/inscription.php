<?php echo $header; ?>

<section class="container centre">
    <?php

    if(!$member->isIdentify())
    {
    ?>
    <h1>Inscription</h1>



    <form action="<?php echo 'newMember'; ?>" method="post">

        <fieldset>
            <label for="login">Login: <?php echo getErrors('login'); ?> </label>
            <input name="login" id="login" type="text" maxlength="15" required />
            <label for="mail">E-mail : <?php echo getErrors('mail'); ?></label>
            <input name="mail" id="mail" type="email" maxlength="255" required />
        </fieldset>
        <fieldset>
            <label for="password">Mot de passe: <?php echo getErrors('password'); ?> </label>
            <input name="password" id="password" type="password" required/>
            <label for="passwordVerification">Retaper votre mot de
                passe: <?php echo getErrors('passwordVerification'); ?></label>
            <input name="passwordVerification" id="passwordVerification" type="password" required />
        </fieldset>

        <input type="submit" value="s'enregistrer">

        <?php

        }
        Else{

            ?>

            <p> Vous êtes déjà connecté, vous ne pouvez créer plusieurs comptes</p>
            <?php
        }

        ?>



    </form>

