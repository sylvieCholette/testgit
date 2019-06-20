<?php
    
    session_start();
    //recevoir le paramètre action
    if(isset($_REQUEST["action"]))
    {
        $action = $_REQUEST["action"];
    }
    else
    {
        //action par défaut
        $action = "accueil";
    }

    require_once("FonctionDB.php");



    switch($action)
    {
     
        case "accueil":
            //
            //$donnees = afficherarticle();
           require_once("vues/accueil.php");
            break;   
            
         
        case "listeProf":    
            
            $donnees = afficheListeProf();
           // var_dump($donnees);
            
            require_once("vues/prof.php");
            break;
            
        case "listeEtudiant":
            
            $donnees = afficheListeEtudiant();
            
            require_once("vues/etudiant.php");
            break;
            
        case "listeEntreprise":
            
            $donnees = afficheListeEntreprise();
            
            require_once("vues/entreprise.php");
            break;
            
            
            
        case "listeStage":
            
            $donnees = afficheListeStage();
            
            require_once("vues/stage.php");
            break;    
            
            
        case "profil_etudiant": 
            
            $donnees = getInfoEtudiant($_GET["idEtudiant"]);
          
            
            require_once("vues/detailEtudiant.php");
            break;
            
        case "profil_prof": 
            
            $donnees = getInfoProf($_GET["idProf"]);
          
            
            require_once("vues/detailProf.php");
            break;
            
            
        case "profil_entreprise":
            
            $donnees = getInfoEntreprise($_GET["idEntreprise"]);
          
            
            require_once("vues/detailEntreprise.php");
            break;
            
        case "detailStage":
            
            $donnees = getInfoStage($_GET["idStage"]);
            
            $compagnie = getInfoComp($_GET["idStage"]);
            
            $prof = getInfoProfStage($_GET["idStage"]);
            
            require_once("vues/detailStage.php");
            break;
        
        
        case "modifEtudiant":
            
            $donneesaModif = getInfoEtudiant($_GET["idEtudiant"]);
            
            $donnees = afficheListeEtudiant();
            
            require_once("vues/modifEtudiant.php");
            break;
            
        
        case "modifierEtudiant":
            
           if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["specialite"]) && isset($_POST["resume"]) && isset($_POST["statut"]) && isset($_POST["adresse"]) && isset($_POST["rue"]) && isset($_POST["Ville"]) && isset($_POST["courriel"]) && isset($_POST["telephone"]))
           {
               if(trim($_POST["nom"]) == "" || trim($_POST["prenom"]) == "" || trim($_POST["specialite"]) == "" || trim($_POST["resume"]) == "" || trim($_POST["statut"]) == "" || trim($_POST["adresse"]) == "" || trim($_POST["rue"]) == "" || trim($_POST["Ville"]) == "" || trim($_POST["courriel"]) == "" || trim($_POST["telephone"]) == "")
               {
                 $erreurs = "Veuillez remplir les champs correctement.";
                    header("Location: index.php?action=modifEtudiant");
               }
               else
               {
                 //insertion
                 $verifierResultat = miseajourEtudiant($_POST["idEtudiant"], $_POST["nom"], $_POST["prenom"], $_POST["specialite"], $_POST["resume"], $_POST["adresse"], $_POST["rue"], $_POST["Ville"], $_POST["courriel"], $_POST["telephone"]);
                   
                $verifResultat = miseajourStatut($_POST["statut"]);   
                 header("Location: index.php? action=profil_etudiant");
                   
               }
           }
           else
           {
             //quelqu'un a modifié l'URL - on retourne à l'accueil
                header("Location: index.php?action=accueil");  
           }
            
    } // accolade du switch ne pas supprimer !!!

    


?>


<!-- FIN -->
