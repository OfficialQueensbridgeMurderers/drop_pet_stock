<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>F.A.Q.</title>
		
        <!-- Styles -->
        <style>		
			a {
				width: 100%;
				margin-top: 20px;
			}

			button {

				background: transparent;
				border: none !important;
			}?
        </style>
    </head>
    <body>
		<button onclick="myFunction('reponse1')">Premi&egrave;re question.</button><br></br>
		<div id="reponse1" style="display:none;">
			<a>R&eacute;ponse de la premi&egrave;re question.</a><br></br>
		</div>

		<button onclick="myFunction('reponse2')">deuxi&egrave;me question.</button><br></br>
		<div id="reponse2" style="display:none;">
			<a>R&eacute;ponse de la deuxi&egrave;me question.</a><br></br>
		</div>

		<button onclick="myFunction('reponse3')">3e question.</button><br></br>
		<div id="reponse3" style="display:none;">
			<a>R&eacute;ponse de la 3e question.</a><br></br>
		</div>

		<button onclick="myFunction('reponse4')">4e question.</button><br></br>
		<div id="reponse4" style="display:none;">
			<a>R&eacute;ponse de la 4e question.</a><br></br>
		</div>

		<script>
			function myFunction(bla) {
				var x = document.getElementById(bla);
				if (x.style.display === "none") {
					x.style.display = "";
				} else {
					x.style.display = "none";
					
				}
			}
		</script>
	</body>
</html>