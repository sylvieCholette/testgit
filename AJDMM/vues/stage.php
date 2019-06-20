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
                <li class="active"><a href="index.php?action=listeStage" title="stage">Stages</a> </li>
                <li><a href="index.php?action=listeEvent" title="event">Événements/Nouvelles</a></li>
                <li><a href="index.php?action=listeEntreprise" title="entreprise">Entreprises</a></li>
            </ul>
        </div>
    </nav>


    <div class="container">
        <div class="row">

            <div class="column middle">
               
                <div class="stage">
                    <h2>La liste des stages offert au collège Maisonneuve</h2>
                    <table class="table" >

                        <thead><tr><th>Titre</th><th>Compétences</th><th>Entreprise</th><th>Détails</th></tr></thead>       
                              
                        <tbody>
                        <?php
                        while($rangee = mysqli_fetch_assoc($donnees))
                        {?>
                        <tr>
                        <td  data-label='Titre'><?php echo $rangee["titre_offre"] ; ?></td>
                        <td data-label='Compétences'><?php echo $rangee["competence"] ; ?></td>
                        <td data-label='Entreprise'><?php echo $rangee["nom_entreprise"] ; ?></td>
                        <td data-label='Details'><?php echo "<a href='index.php?action=detailStage&idStage=". $rangee["idStage"]."'>Détails</a>" ; ?></td>
                        </tr><?php
                        }?>
                        </tbody>
                    </table>
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

