<?php
    
    function connectDB()
        //connexion à la BD
    {
        $c = mysqli_connect("localhost", "root", "", "ajdm1");
        
        if(!$c)
            trigger_error("Erreur de connexion : " . mysqli_connect_error());
        
        mysqli_query($c, "SET NAMES 'utf8'");
        
        return $c;
    }

    $connexion = connectDB();


    function afficheListeProf()
        // liste des profs
    {
        global $connexion;   
        
        $requete = "select * from membres where typeMembre= 'Prof' ORDER BY nom asc";
            
            
        $resultat = mysqli_query($connexion, $requete);
     
        return $resultat;
        
    }

    function afficheListeEtudiant()
        // liste des etudiants
    {
        global $connexion;   
        
        $requete = "select * from membres JOIN etudiants on membres.idEtudiant = etudiants.idEtudiant where typeMembre= 'Étudiant' ORDER BY nom asc";
        $resultat = mysqli_query($connexion, $requete);
     
        return $resultat;
        
    }

    function afficheListeEntreprise()
        // liste des entreprises
    {
        global $connexion;   
        
        $requete = "SELECT * from membres JOIN entreprises on membres.idEntreprise = entreprises.idEntreprise ORDER BY nom_entreprise asc";
        $resultat = mysqli_query($connexion, $requete);
     
        return $resultat;
    
    
    }
    

    function afficheListeStage()
         // liste des stages
    {
        global $connexion;   
        
        $requete = "SELECT * from stages JOIN entreprises on stages.idEntreprise = entreprises.idEntreprise ORDER BY idStage desc";
        $resultat = mysqli_query($connexion, $requete);
     
        return $resultat;
        
    }
    
    function getInfoEtudiant($idEtudiant)
        // detail étudiant
    {
        global $connexion; 
        
        $requete = "SELECT * from etudiants JOIN membres on membres.idEtudiant = etudiants.idEtudiant WHERE etudiants.idEtudiant = $idEtudiant";
        $resultat = mysqli_query($connexion, $requete);
        
        return $resultat;
    }
 


    function  getInfoProf($idProf)
        // detail prof
    {
        global $connexion; 
        
        $requete = "SELECT * from membres WHERE idProf = $idProf";
        $resultat = mysqli_query($connexion, $requete);
        
        return $resultat;
    }


    function getInfoEntreprise($idEntreprise)
        // detail entreprise
    {
        global $connexion; 
        
        $requete = "SELECT * from membres JOIN entreprises ON membres.idEntreprise = entreprises.idEntreprise WHERE membres.idEntreprise = $idEntreprise";
        $resultat = mysqli_query($connexion, $requete);
        
        return $resultat;
    }

    function getInfoStage($idStage)
        // detail stage
    {
        global $connexion; 
   
        $requete = "SELECT stages.* ,membres.nom as nomResp, membres.prenom as prenomResp, membres.courriel, membres.telephone FROM `stages` join membres on stages.idEmploye = membres.idMembre WHERE stages.idStage='$idStage'";
        $resultat = mysqli_query($connexion, $requete);
        
        return $resultat;
    }



    function getInfoProfStage($idStage)
      //detail stage prof responsable  
    {
        global $connexion; 
   
        $requete = "SELECT stages.* ,membres.nom as nomProf, membres.prenom as prenomProf, membres.courriel FROM `stages` join membres on stages.idProf = membres.idProf WHERE stages.idStage='$idStage'";
        $resultat = mysqli_query($connexion, $requete);
        
        return $resultat; 
        
    }


    function getInfoComp($idStage)
        //detail stage compagnie offre  
    {
        global $connexion; 
   
        $requete = "SELECT stages.idEntreprise , entreprises.nom_entreprise FROM `stages` join entreprises on stages.idEntreprise = entreprises.idEntreprise WHERE stages.idStage='$idStage'";
        $resultat = mysqli_query($connexion, $requete);
        
        return $resultat; 
        
    }

    function filtre($chaine)
         //pour ne pas qu'il y ai du mauvais code d'inserré dans nos champs
    {
        global $connexion;
        
        $varFiltre = mysqli_real_escape_string($connexion, $chaine);
        //strip_tags enlève les tags HTML sauf ceux spécifiés en 2ème paramètre.
        $varFiltre = strip_tags($varFiltre, "<p><a><b><br>");
         
        return $varFiltre;
    }   
        

    function miseajourEtudiant($idEtudiant, $nom, $prenom, $specialite, $resume, $adresse, $rue, $ville, $courriel, $telephone)
    {
        
        global $connexion; 
        
        $nom =  mysqli_real_escape_string($connexion,$nom);
        $nom = strip_tags($nom, "<p><a><b><br>");
        $prenom =  mysqli_real_escape_string($connexion,$prenom);
        $prenom = strip_tags($prenom, "<p><a><b><br>");
        $specialite =  mysqli_real_escape_string($connexion,$specialite);
        $specialite = strip_tags($specialite, "<p><a><b><br>");
        $resume =  mysqli_real_escape_string($connexion,$resume);
        $resume = strip_tags($resume, "<p><a><b><br>");
        $adresse =  mysqli_real_escape_string($connexion,$adresse);
        $adresse = strip_tags($adresse, "<p><a><b><br>");
        $rue =  mysqli_real_escape_string($connexion,$rue);
        $rue = strip_tags($rue, "<p><a><b><br>");
        $ville =  mysqli_real_escape_string($connexion,$ville);
        $ville = strip_tags($ville, "<p><a><b><br>");
        $courriel =  mysqli_real_escape_string($connexion,$courriel);
        $courriel = strip_tags($courriel, "<p><a><b><br>");
        $telephone =  mysqli_real_escape_string($connexion,$telephone);
        $telephone = strip_tags($telephone, "<p><a><b><br>");
        
        $requete = "UPDATE membres SET nom='$nom', prenom='$prenom', specialite='$specialite', description='$resume', adresse='$adresse', rue='$rue', Ville='$ville', courriel='$courriel', telephone='$telephone'  WHERE membres.idEtudiant='$idEtudiant'";
        $resultat = mysqli_query($connexion, $requete);
        
        return $resultat; 
  
    }

function miseajourStatut($idEtudiant, $statut)
{
    global $connexion; 
    
    $statut =  mysqli_real_escape_string($connexion,$statut);
    $statut = strip_tags($statut, "<p><a><b><br>");
    
    $requete = "UPDATE etudiants SET statut='$statut' WHERE membres.idEtudiant='$idEtudiant'";
    $resultat = mysqli_query($connexion, $requete);
        
    return $resultat; 
  
    
}




// FIN des fonctions