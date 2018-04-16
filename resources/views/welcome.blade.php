@extends('layouts.header_footer')


	@section('content')
		<div class="full-width-image">
		</div>


		<div class="full-width-bgrd">
		 <div class="SuperDiv">
			<div class="row">
			  <div class="column">
			    <img src="../public/images/shield.png">
			    <h2>Sécurité</h2>
			    <p class="p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>



			  </div>
			  <div class="column" >
			    <img src="../public/images/group.png">
			    <h2>Services</h2>
			    <p class="p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>



			  </div>
			  <div class="column" >
			    <img src="../public/images/mony.png">
			    <h2>Abordable</h2>
			    <p class="p">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>



			  </div>
			</div>
		 </div>
		</div>


		<div class="full-width-bgrd1">

		<div class="SuperDiv">
			<div class="row">
			  <div class="column2">

			    <h2 class="p2">Delivery Box</h2>
			
			    <p class="p3 "> Custumizer vos package sauvgardez-les et modifiez les a n'importe quel moment. Ensuite on vous les livre. </p>

			    <a  href="{{ url('/') }}/packages/delivery_box"> <button type="button" class="buttonS2"  onclick="">BUY</button> </a>

			  </div>
			  <div class="column2" >

			    <h2 class="p2">Packages available</h2>

			    <p class="p3"> Jettez un coup D'oeil a nos packge deja pré-fait pour vous et choissiez parmis vos produits préferer</p>

			 <a  href="{{ url('/') }}/packages/available"> <button type="button" class="buttonS2"  onclick="">BUY</button> </a>

			  </div>
			  <div class="column2" >

			    <h2 class="p2">Custumizer</h2>
					<h2 class="p2">À la meusure de votre budget</h2>
			    <p class="p3">Vous connaissez votre annimal mieux que nous alors nous vous offront l'opportunité de
					faire un forfait personnalisé à la meusure de votre budget et avec autant de choix que vous
					le souhaitez. Choisissez parmis les plus grandes marques. </p>

			   <a  href="{{ url('/') }}/packages/custom"> <button type="button" class="buttonS2"  onclick="">BUY</button> </a>

			  </div>
			</div>
		 </div>


		</div>

	@endsection
