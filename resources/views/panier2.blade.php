<?php
/** 
* Ajoute un article dans le panier apr�s v�rification que nous ne somme pas en phase de paiement 
* 
* @param array  $select variable tableau associatif contenant les valeurs de l'article 
* @return Mixed Retourne VRAI si l'ajout est effectu�, FAUX sinon voire une autre valeur si l'ajout 
*               est renvoy� vers la modification de quantit�. 
* @see {@link modif_qte()} 
*/ 
function ajout($select) 
{ 
    $ajout = false; 
    if(!isset($_SESSION['panier']['verrouille']) || $_SESSION['panier']['verrouille'] == false) 
    { 
        if(!verif_panier($select['id'])) 
        { 
            array_push($_SESSION['panier']['id_article'],$select['id']); 
            array_push($_SESSION['panier']['qte'],$select['qte']); 
            array_push($_SESSION['panier']['taille'],$select['taille']); 
            array_push($_SESSION['panier']['prix'],$select['prix']); 
            $ajout = true; 
        } 
        else 
        { 
            $ajout = modif_qte($select['id'],$select['qte']); 
        } 
    } 
    return $ajout; 
} 

/** 
* Modifie la quantit� d'un article dans le panier apr�s v�rification que nous ne somme pas en phase de paiement 
* 
* @param String $ref_article    Identifiant de l'article � modifier 
* @param Int $qte               Nouvelle quantit� � enregistrer 
* @return Mixed                 Retourne VRAI si la modification a bien eu lieu, 
*                               FAUX sinon, 
*                               "absent" si l'article est absent du panier, 
*                               "qte_ok" si la quantit� n'est pas modifi�e car d�j� correctement enregistr�e. 
*/ 
function modif_qte($ref_article, $qte) 
{ 
    /* On initialise la variable de retour */ 
    $modifie = false; 
    if(!isset($_SESSION['panier']['verrouille']) || $_SESSION['panier']['verrouille'] == false) 
    { 
        if(nombre_article($ref_article) != false && $qte != nombre_article($ref_article)) 
        { 
            /* On compte le nombre d'articles diff�rents dans le panier */ 
            $nb_articles = count($_SESSION['panier']['id_article']); 
            /* On parcoure le tableau de session pour modifier l'article pr�cis. */ 
            for($i = 0; $i < $nb_articles; $i++) 
            { 
                if($ref_article == $_SESSION['panier']['id_article'][$i]) 
                { 
                    $_SESSION['panier']['qte'][$i] = $qte; 
                    $modifie = true; 
                } 
            } 
        } 
        else 
        { 
            /* L'article est absent du panier, donc on ne peut pas modifier la quantit� ou bien 
            * le nombre est exactement le m�me et il est inutile de le modifier 
            * Si l'article est absent, comme on a ni la taille  ni le prix, on ne peut pas l'ajouter 
            * Si le nombre est le m�me, on ne fait pas de changement. On peut donc retourner un autre 
            * type de valeur pour indiquer une erreur qu'il faudra traiter � part lors du retour d'appel 
            */ 
            if(nombre_article($ref_article) != false) 
            { 
                $modifie = "absent"; 
            } 
            if($qte != nombre_article($ref_article)) 
            { 
                $modifie = "qte_ok"; 
            } 
        } 
    } 
    return $modifie; 
} 

/** 
* Supprimer un article du panier apr�s v�rification que nous ne somme pas en phase de paiement 
* 
* @param String     $ref_article num�ro de r�f�rence de l'article � supprimer 
* @return Mixed     Retourne TRUE si la suppression a bien �t� effectu�e, 
*                   FALSE sinon, "absent" si l'article �tait d�j� retir� du panier 
*/ 
function supprim_article($ref_article) 
{ 
    $suppression = false; 
    if(!isset($_SESSION['panier']['verrouille']) || $_SESSION['panier']['verrouille'] == false) 
    { 
        /* On v�rifie que l'article � supprimer est bien pr�sent dans le panier */ 
        if(nombre_article($ref_article) != false) 
        { 
            /* cr�ation d'un tableau temporaire de stockage des articles */ 
            $panier_tmp = array("id_article"=>array(),"qte"=>array(),"taille"=>array(),"prix"=>array()); 
            /* Comptage des articles du panier */ 
            $nb_articles = count($_SESSION['panier']['id_article']); 
            /* Transfert du panier dans le panier temporaire */ 
            for($i = 0; $i < $nb_articles; $i++) 
            { 
                /* On transf�re tout sauf l'article � supprimer */ 
                if($_SESSION['panier']['id_article'][$i] != $ref_article) 
                { 
                    array_push($panier_tmp['id_article'],$_SESSION['panier']['id_article'][$i]); 
                    array_push($panier_tmp['qte'],$_SESSION['panier']['qte'][$i]); 
                    array_push($panier_tmp['taille'],$_SESSION['panier']['taille'][$i]); 
                    array_push($panier_tmp['prix'],$_SESSION['panier']['prix'][$i]); 
                } 
            } 
            /* Le transfert est termin�, on r�-initialise le panier */ 
            $_SESSION['panier'] = $panier_tmp; 
            /* Option : on peut maintenant supprimer notre panier temporaire: */ 
            unset($panier_tmp); 
            $suppression = true; 
        } 
        else 
        { 
            $suppression == "absent"; 
        } 
    } 
    return $suppression; 
} 

/** 
* Supprimer un article du panier : autre m�thode. 
* 
* @param String     $ref_article num�ro de r�f�rence de l'article � supprimer 
* @param Boolean    $reindex : facultatif, par d�faut, vaut true pour r�-indexer le tableau apr�s 
*                   suppression. On peut envoyer false si cette r�-indexation n'est pas n�cessaire. 
* @return Mixed     Retourne TRUE si la suppression a bien �t� effectu�e, 
*                   FALSE sinon, "absent" si l'article �tait d�j� retir� du panier 
*/ 
function supprim_article2($ref_article, $reindex = true) 
{ 
    $suppression = false; 
    if(!isset($_SESSION['panier']['verrouille']) || $_SESSION['panier']['verrouille'] == false) 
    { 
        $aCleSuppr = array_keys($_SESSION['panier']['id_article'], $ref_article); 

        /* sortie la cl� a �t� trouv�e */ 
        if (!empty ($aCleSuppr)) 
        { 
            /* on traverse le panier pour supprimer ce qui doit l'�tre */ 
            foreach ($_SESSION['panier'] as $k=>$v) 
            { 
                foreach($aCleSuppr as $v1) 
                { 
                    unset($_SESSION['panier'][$k][$v1]);    // remplace la ligne foireuse 
                } 
                /* R�indexation des cl�s du panier si l'option $reindex a �t� laiss�e � true */ 
                if($reindex == true) 
                { 
                    $_SESSION['panier'][$k] = array_values($_SESSION['panier'][$k]); 
                } 
                $suppression = true; 
            } 
        } 
        else 
        { 
            $suppression = "absent"; 
        } 
    } 
    return $suppression; 
} 

/** 
* Fonction qui supprime tout le contenu du panier en d�truisant la variable apr�s 
* v�rification qu'on ne soit pas en phase de paiement. 
* 
* @return Mixed    Retourne VRAI si l'ex�cution s'est correctement d�roul�e, Faux sinon et "inexistant" si 
*                  le panier avait d�j� �t� d�truit ou n'avait jamais �t� cr��. 
*/ 
function vider_panier() 
{ 
    $vide = false; 
    if(!isset($_SESSION['panier']['verrouille']) || $_SESSION['panier']['verrouille'] == false) 
    { 
        if(isset($_SESSION['panier'])) 
        { 
            unset($_SESSION['panier']); 
            if(!isset($_SESSION['panier'])) 
            { 
                $vide = true; 
            } 
        } 
        else 
        { 
            /* Le panier �tait d�j� d�truit, on renvoie une autre valeur exploitable au retour */ 
            $vide = "inexistant"; 
        } 
    } 
    return $vide; 
} 

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */ 
/*                 Fonctions annexes de gestion du panier                  */ 
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */ 

/** 
* V�rifie la quantit� enregistr�e d'un article dans le panier 
* 
* @param String $ref_article r�f�rence de l'article � v�rifier 
* @return Mixed Renvoie le nombre d'article s'il y en a, ou Faux si cet article est absent du panier 
*/ 
function nombre_article($ref_article) 
{ 
    /* On initialise la variable de retour */ 
    $nombre = false; 
    /* Comptage du panier */ 
    $nb_art = count($_SESSION['panier']['id_article']); 
    /* On parcoure le panier � la recherche de l'article pour v�rifier le cas �ch�ant combien sont enregistr�s */ 
    for($i = 0; $i < $nb_art; $i++) 
    { 
        if($_SESSION['panier']['id_article'][$i] == $ref_article) 
        $nombre = $_SESSION['panier']['qte'][$i]; 
    } 
    return $nombre; 
} 

/** 
* Calcule le montant total du panier 
* 
* @return Double 
*/ 
function montant_panier() 
{ 
    /* On initialise le montant */ 
    $montant = 0; 
    /* Comptage des articles du panier */ 
    $nb_articles = count($_SESSION['panier']['id_article']); 
    /* On va calculer le total par article */ 
    for($i = 0; $i < $nb_articles; $i++) 
    { 
        $montant += $_SESSION['panier']['qte'][$i] * $_SESSION['panier']['prix'][$i]; 
    } 
    /* On retourne le r�sultat */ 
    return $montant; 
} 

/** 
* V�rifie la pr�sence d'un article dans le panier 
* 
* @param String $ref_article r�f�rence de l'article � v�rifier 
* @return Boolean Renvoie Vrai si l'article est trouv� dans le panier, Faux sinon 
*/ 
function verif_panier($ref_article) 
{ 
    /* On initialise la variable de retour */ 
    $present = false; 
    /* On v�rifie les num�ros de r�f�rences des articles et on compare avec l'article � v�rifier */ 
    if( count($_SESSION['panier']['id_article']) > 0 && array_search($ref_article,$_SESSION['panier']['id_article']) !== false) 
    { 
        $present = true; 
    } 
    return $present; 
} 

/** 
* Fonction de verrouillage du panier pendant la phase de paiement. 
* 
*/ 
function preparerPaiement() 
{ 
    $_SESSION['panier']['verrouille'] = true; 
    header("Location: URL_DU_SITE_DE_BANQUE"); 
} 

/** 
* Fonction qui va enregistrer les informations de la commande dans 
* la base de donn�es et d�truire le panier. 
* 
*/ 
function paiementAccepte() 
{ 
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */ 
    /*   Stockage du panier dans la BDD   */ 
    /* ajoutez ici votre code d'insertion */ 
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */ 
    unset($_SESSION['panier']); 
} 
?>  