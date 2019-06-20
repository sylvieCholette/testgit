<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style/style_sheet.css" media="all" />
     <link rel="stylesheet" type="text/css" href="style/style_liste.css" media="all" />
    <title>Association des jeunes développeurs de Maisonneuve AJDM</title>
    
</head>

<body>
    <div class="header">
        <div class="login">
            <div id="login">

                <a href="index.php?action=accueil"><img id="logo" src="images/logo2.png" alt="accueil"></a>

                <img class="haut" src="images/employeur2.png">

                <a href=""><img class="haut" src="images/connection.png" alt="connection"></a>

                <img class="haut" src="images/gens.png">

                <a href=""><img class="haut" src="images/contact.png" alt="contact"></a>

            </div>
        </div>
        <div id="titre">Association des jeunes développeurs de Maisonneuve</div>
        <form class="recherche">
            <input type="search" name="recherche" value="Recherche">
            <input type="submit">
        </form>

    </div>

    <nav id="topnav" class="menuBurger" role="navigation">
        <div id="menuContainer">
            <label for="show-menu" class="show-menu"><i class="fa fa-bars"></i></label>
            <input type="checkbox" id="show-menu" role="button" />
            <ul id="menu">
                <li><a href="index.php?action=listeEtudiant" title="etudiant">Étudiants</a></li>
                <li><a href="index.php?action=listeProf"  title="enseignant">Enseignants</a> </li>
                <li><a href="index.php?action=listeStage" title="stage">Stages</a> </li>
                <li><a href="index.php?action=listeEvent" title="event">Événements/Nouvelles</a></li>
                <li><a href="index.php?action=listeEntreprise" title="entreprise">Entreprises</a></li>
            </ul>
        </div>
    </nav>


    <div class="container">
        <div class="row">

            <div class="column middle">
          
                <div class="stage">
                    <h2>Modifier mon profil</h2>
                    <?php
                    
                    $rangee = mysqli_fetch_assoc($donneesaModif);
                    { ?>
                    
                    <form method='post' action='index.php'>
                    <input type='hidden' value='<?php  $rangee ["idEtudiant"] ?>' name='idEtudiant'/>
                    
                  
                    
                    Nom: <textarea type='text' name='nom' rows='1' cols='40'><?php echo $rangee["nom"] ; ?></textarea>
                    <br>
                     Prénom:<textarea type='text' name='prenom' rows='1' cols='40'><?php echo $rangee["prenom"] ; ?></textarea>
                    <br>
                    Spécialité:<select name='specialite'>
                        
                        <option value="Développeur Web Front-end" <?PHP if($rangee["specialite"] === "Développeur Web Front-end" ) echo "Selected"; ?>>Développeur Web Front-end</option>
                        <option value="Intégrateur Web" <?PHP if($rangee["specialite"] === "Intégrateur Web" ) echo "Selected"; ?>>Intégrateur Web</option>
                        <option value="Intégrateur Web" <?PHP if($rangee["specialite"] === "Intégrateur Web" ) echo "Selected"; ?>>Intégrateur Web</option>
                        <option value="Designer Web" <?PHP if($rangee["specialite"] === "Designer Web" ) echo "Selected"; ?>>Designer Web</option>
                        <option value="Développeur full Stack" <?PHP if($rangee["specialite"] === "Développeur full Stack" ) echo "Selected"; ?>>Développeur full Stack</option>
                        <option value="Intégrateur de son" <?PHP if($rangee["specialite"] === "Intégrateur de son" ) echo "Selected"; ?>>Intégrateur de son</option>
                        <option value="Intégrateur Vidéo" <?PHP if($rangee["specialite"] === "Intégrateur Vidéo" ) echo "Selected"; ?>>Intégrateur Vidéo</option>
                        <option value="Modéliseur  3D" <?PHP if($rangee["specialite"] === "Modéliseur  3D" ) echo "Selected"; ?>>Modéliseur  3D</option>
                        <option value="Développeur Web Back-end" <?PHP if($rangee["specialite"] === "Développeur Web Back-end" ) echo "Selected"; ?>>Développeur Web Back-end</option>
                        <option value="Développeur de jeux vidéo" <?PHP if($rangee["specialite"] === "Développeur de jeux vidéo" ) echo "Selected"; ?>>Développeur de jeux vidéo</option>
                        </select>
  
                     
                     
                     
                    <br>
                    Résumé:<textarea type='text' name='description' rows='5' cols='40'><?php echo $rangee["resume"] ; ?></textarea>
                    <br>
                    Statut:<textarea type='text' name='statut' rows='1' cols='40'><?php echo $rangee["statut"] ; ?></textarea>
                    <br>
                    Adresse:<textarea type='text' name='adresse' rows='1' cols='40'><?php echo $rangee["adresse"] ; ?></textarea>
                    <br> 
                    Rue:<textarea type='text' name='rue' rows='1' cols='40'><?php echo $rangee["rue"] ; ?></textarea>
                    <br> 
                    Ville: <textarea type='text' name='Ville' rows='1' cols='40'><?php echo $rangee["Ville"] ; ?></textarea>
                    <br>
                    Courriel: <textarea type='text' name='courriel' rows='1' cols='40'><?php echo $rangee["courriel"] ; ?></textarea>
                    <br>
                    Téléphone:<textarea type='text' name='telephone' rows='1' cols='40'><?php echo $rangee["telephone"] ; ?></textarea>
                    <br>
                        
                    <input type='hidden' name='action' value='modifierEtudiant' />
                    <input type='submit' value='Modifier' /> 
                        
                                    
                    </form>
                    <?php } ?>
                </div>
            </div>


            <div class="column right_s">
                <div class="evenement_s">
                    <h2>Événements</h2>
                    <h3>Web2day : le grand festival du numérique fait son retour à Nantes du 5 au 7 juin 2019</h3>
                    <p>Le "digital springbreak" revient du 5 au 7 juin à Nantes, avec une belle programmation comme à son habitude. Plus d'infos ainsi que 3 pass 3 jours à gagner dans cet article.</p>
                    <div class="bouton">
                        <button class="button" type="submit" value="Submit">Accéder aux événements</button>
                    </div>
                </div>

                <div class="nouvelle_s">
                    <h2>Nouvelles</h2>
                    <h3>GRAND PRIX GRAFIKA 2019</h3>
                    <p>Un élève du collège Maisonneuve, s'est vu remporter le grand prix pour le meilleur design.</p>
                    <div class="bouton">
                        <button class="button" type="submit" value="Submit">Accéder aux nouvelles</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="bas">
        <h2>Nos partenaires</h2>
        <div class="partenaire">
            
            <a href=""><img src="images/partenaires/fox.png" alt="fox média"></a>
            <a href=""><img src="images/partenaires/pixel.png" alt="Pixel web"></a>
            <a href=""><img src="images/partenaires/spin.png" alt="spin"></a>
            <a href=""><img src="images/partenaires/square.png" alt="square inc"></a>
            <a href=""><img src="images/partenaires/tornade.png" alt="tornade design"></a>
           
        </div>
    </div>
    
    <div class="footer">
        <a href=""><img src="images/link.png" alt="liens"></a>
        <a href=""><img src="images/f_logo_RGB-Blue_58.png" alt="facebook"></a>
        <a href=""><img src="images/instagram.png" alt="instagram"></a>
        <a href=""><img src="images/Twitter.png" alt="twiter"></a>

        <p>Copyright@scholette.ca</p>
        <p>Image from clipart.email, Photo by Johannes Plenio from Pexels</p>

        <div>Icons made by <a href="https://www.flaticon.com/authors/eucalyp" title="Eucalyp">Eucalyp</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
        <div>Icons made by <a href="https://www.flaticon.com/authors/srip" title="srip">srip</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
    </div>

</body>

</html>
