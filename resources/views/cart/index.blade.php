@include('fonctionsCart')

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Votre cart</title>
</head>
<body>

 {{ csrf_field() }}
<table style="width: 400px">
	<tr>
		<td colspan="4">Votre Panier</td>
	</tr>
	<tr>
		<td>nom</td>
		<td>Quantité</td>
		<td>Prix Unitaire</td>
		<td>Coût de livraison</td>
		<td>Action</td>
	</tr>
	
	@foreach ($cartItems as $item)
		<tr>
		<td>{{$item->produit->nom}}</td>	
	    
		<form method="get" action="{{ url('/') }}/cart/modifier/{{$item->id}}">
				<td><input type=text size=4 id=hu name=nombre value={{$item->quantity}} </input>
                <button type="submit">
                          modifier
                </button>
			</form>
		</td>
		<td>{{$item->produit->prix_vente}} $</td>
		<td>{{$item->produit->cout_livraison}} $</td>
		<td>
			<form method="get" action="{{ url('/') }}/cart/sup/{{$item->id}}">
                <button type="submit">
                          supprimer
                </button>
			</form>
		</th>
	@endforeach
	<?php
	$priceTotal=0;	
	foreach($cartItems as $p){
	$price = ( $p->produit->prix_vente + $p->produit->cout_livraison ) * $p->quantity;
	$priceTotal = $priceTotal + $price;
	}
	?>

	      <tr><td colspan=2> </td>
	      <td colspan=2>
	      Total :  <?php echo $priceTotal ?> $
	      </td></tr>
		  <tr><td colspan=2>
		  <form method="get" action="{{ url('/') }}/LeChemain">
                <button type="submit">
                          Payer
                </button>
			</form>
			</td></tr>
</table>
</body>
</html>