@include('fonctionsCart')

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
<title>Votre cart</title>
</head>
<body>

<form method="post" action="cart">
 {{ csrf_field() }}
<table style="width: 400px">
	<tr>
		<td colspan="4">Votre Panier</td>
	</tr>
	<tr>
		<td>user id</td>
		<td>Quantité</td>
		<td>Prix Unitaire</td>
		<td>Action</td>
	</tr>

	@foreach ($cartItems as $item)	
		<tr>
		<td>{{$item->id_user}}</td>
		<td>{{$item->quantity}}</td>
		<td>{{$item->produit->prix}}</td>
		<td>
			<input type=button value=Ne_marche_pas>
			<input type=hidden name=action value=refresh></td>
		</th>
	@endforeach

	      <tr><td colspan=2> </td>
	      <td colspan=2>
	      Total :  $
	      </td></tr>
	      <tr><td colspan=4>
	      <input type=submit value=RafraichirTest>
	      <input type=hidden name=action value=refresh>
	      </td></tr>
</table>
</form>
</body>
</html>