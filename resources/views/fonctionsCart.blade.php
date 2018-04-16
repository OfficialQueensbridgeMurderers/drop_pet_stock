<?php

/**
 * Verifie si le cart existe, le créé sinon
 * @return booleen
 */
function creationcart(){
   if (!isset($_SESSION['cart'])){
      $_SESSION['cart']=array();
      $_SESSION['cart']['libelleProduit'] = array();
      $_SESSION['cart']['qteProduit'] = array();
      $_SESSION['cart']['prixProduit'] = array();
      $_SESSION['cart']['verrou'] = false;
   }
   return true;
}


/**
 * Ajoute un article dans le cart
 * @param string $libelleProduit
 * @param int $qteProduit
 * @param float $prixProduit
 * @return void
 */
function ajouterArticle($libelleProduit,$qteProduit,$prixProduit){

   //Si le cart existe
   if (creationcart() && !isVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($libelleProduit,  $_SESSION['cart']['libelleProduit']);

      if ($positionProduit !== false)
      {
         $_SESSION['cart']['qteProduit'][$positionProduit] += $qteProduit ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['cart']['libelleProduit'],$libelleProduit);
         array_push( $_SESSION['cart']['qteProduit'],$qteProduit);
         array_push( $_SESSION['cart']['prixProduit'],$prixProduit);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}



/**
 * Modifie la quantité d'un article
 * @param $libelleProduit
 * @param $qteProduit
 * @return void
 */
function modifierQTeArticle($libelleProduit,$qteProduit){
   //Si le cart éxiste
   if (creationcart() && !isVerrouille())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qteProduit > 0)
      {
         //Recharche du produit dans le cart
         $positionProduit = array_search($libelleProduit,  $_SESSION['cart']['libelleProduit']);

         if ($positionProduit !== false)
         {
            $_SESSION['cart']['qteProduit'][$positionProduit] = $qteProduit ;
         }
      }
      else
      supprimerArticle($libelleProduit);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

/**
 * Supprime un article du cart
 * @param $libelleProduit
 * @return unknown_type
 */
function supprimerArticle($libelleProduit){
   //Si le cart existe
   if (creationcart() && !isVerrouille())
   {
      //Nous allons passer par un cart temporaire
      $tmp=array();
      $tmp['libelleProduit'] = array();
      $tmp['qteProduit'] = array();
      $tmp['prixProduit'] = array();
      $tmp['verrou'] = $_SESSION['cart']['verrou'];

      for($i = 0; $i < count($_SESSION['cart']['libelleProduit']); $i++)
      {
         if ($_SESSION['cart']['libelleProduit'][$i] !== $libelleProduit)
         {
            array_push( $tmp['libelleProduit'],$_SESSION['cart']['libelleProduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['cart']['qteProduit'][$i]);
            array_push( $tmp['prixProduit'],$_SESSION['cart']['prixProduit'][$i]);
         }

      }
      //On remplace le cart en session par notre cart temporaire à jour
      $_SESSION['cart'] =  $tmp;
      //On efface notre cart temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}


/**
 * Montant total du cart
 * @return int
 */
function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['cart']['libelleProduit']); $i++)
   {
      $total += $_SESSION['cart']['qteProduit'][$i] * $_SESSION['cart']['prixProduit'][$i];
   }
   return $total;
}


/**
 * Fonction de suppression du cart
 * @return void
 */
function supprimecart(){
   unset($_SESSION['cart']);
}

/**
 * Permet de savoir si le cart est verrouillé
 * @return booleen
 */
function isVerrouille(){
   if (isset($_SESSION['cart']) && $_SESSION['cart']['verrou'])
   return true;
   else
   return false;
}

/**
 * Compte le nombre d'articles différents dans le cart
 * @return int
 */
function compterArticles()
{
   if (isset($_SESSION['cart']))
   return count($_SESSION['cart']['libelleProduit']);
   else
   return 0;
}
?>