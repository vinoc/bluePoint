<?php
/**
 * Created by PhpStorm.
 * User: Amelvin
 * Date: 30/01/2019
 * Time: 14:34
 */
?>

<main id="home" class="centre">
    <h1>Listes des joueurs à combattre</h1>



<section id="error">
    <div> <?php echo recupererErreur('info'); ?></div>
</section>

<section id="presentationConcurent">
    <?php

    while ($donneesJoueurs = $requestJoueur->fetch(PDO::FETCH_ASSOC)): ;?>
    <a href="<?php echo HOST; ?>selectionCombattant?id_enemie=<?php echo $donneesJoueurs['id']; ?>">
        <article>

            <div class="name" title="nom de votre enemie">
                <?php echo htmlspecialchars($donneesJoueurs['login']) ?>
            </div>

            <div class="phrase" title="Phrase fétish d'un combattant de <?php echo htmlspecialchars($donneesJoueurs['login']) ?>">
                <?php  echo phraseAleatoireDunPersonnage($donneesJoueurs['id']); ?>
            </div>

            <div class="button right">
   <!--On vérifie que le joueur n'est pas lui même. Si c'est le cas, on change le "combattre" en "Me tapper" -->
               <?php  echo moimeme($donneesJoueurs['id'], $member); ?>
            </div>

        </article>
    </a>
        <?php endwhile; ?>

</section>
</main>
