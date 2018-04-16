@extends('layouts.app')


	@section('content')
		<div class="full-width-image">
		</div>
		

		<div class="full-width-bgrd">
		 <div class="SuperDiv">	
			<div class="row">
			  <div class="column">
			    <img src="../resources/Images/shield.png">
			    <h2>Sécurité</h2>
			     <p class="p">
	          	Drop Pet Stock est un services sécuritaire lors avec nous vous avez la paix d'esprit
							Nos transaction son sécuriser et vous etes le seul à acceder a votre compte.

					 </p>

			   

			  </div>
			  <div class="column" >
			    <img src="../resources/Images/group.png">
			    <h2>Services</h2>
			    <p class="p">
				  	Avec Drop Pet Stock pas de compromis sur le service quenous vous offront. 
						vous etes garanti d'avoir un services a la clientele en ligne 24/7.
						votre animal de compagnie nous tient a coeur et on repondra a toutes vos question.
					
					
				   </p>

				
			  </div>
			  <div class="column" >
			    <img src="../resources/Images/mony.png">
			    <h2>Abordable</h2>
			    <p class="p">
						Drop Pet Stock est l'endroit pour faire des économies sur la nourriture de votre 
						animal de compagnie. La livraison est incluse et nous vous offronts des goodies et 
						un programme de fidelité.


				  </p>

			   

			  </div>
			</div>
		 </div>
		</div>


		<div class="full-width-bgrd1">

		<div class="SuperDiv">	
			<div class="row">
			  <div class="column2">
			  
			    <h2 class="p2">Nourriture Solide</h2>
					<h2 class="p2">30$/Mois</h2>
			    <p>
						<ul>
						<li class="p4">Un sac de 13lb</li>
						<hr>
						<li class="p5">Un jouet</li>
						</ul>
					</p>

			    <button type="button" class="buttonS2">BUY</button>

			  </div>
			  <div class="column2" >
			    
			    <h2 class="p2">Gros Plant</h2>
					<h2 class="p2">60$/Mois</h2>
					<p>
						<ul>
						<li class="p4">Un sac de 13lb</li>
						<hr>
						<li class="p5">60 boites de nouriture molles</li>
						<hr>
						<li class="p5">Un jouet</li>
						</ul>
					</p>
				<button type="button" class="buttonS2">BUY</button>

			  </div>
			  <div class="column2" >
			  
			    <h2 class="p2">Custumizer</h2>
					<h2 class="p2">À la meusure de votre budget</h2>
			    <p class="p3"> 
					Vous connaissez votre annimal mieux que nous alors nous vous offront l'opportunité de 
					faire un forfait personnalisé à la meusure de votre budget et avec autant de choix que vous 
					le souhaitez. Choisissez parmis les plus grandes marques.
					
					</p>

			    <button type="button" class="buttonS2">BUY</button>

			  </div>
			</div>
		 </div>


		</div>


		<div class="full-width-bgrd2">

		<form method="post" action="{{ route('home.store') }}"> 

			{{ csrf_field() }}

			<div class="contact-form">

				<label class="input-label">First Name</label>
					<input class="input-text-name" type="text" id="fname" name="firstname" placeholder="Your name..">
				<label class="input-label">Last Name</label>
					<input class="input-text-name" type="text" id="lname" name="lastname" placeholder="Your last name..">
				<label class="input-label">Subject</label>
					<textarea class="input-text-name" id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
				<button type="submit" class="buttonS3">Envoyer</button>
			</div>

		 </form>
		</div>

	@endsection



	<style type="text/css">


			.p4 {
				color: white;
					text-align:left !important;
					margin-top:120px;
					color:#000099 ;


			}
			.p5 {
				color: white;
					text-align:left !important;
				
					color:#000099 ;


			}

			.input-text-name{

				   width: 100%;
					padding: 12px 20px;
					margin: 8px 0;
					box-sizing: border-box;

			}
			.input-label{
					color:white;
					align:center;

			}
			.buttonS3{

					border-radius: 25px;
					text-align: center;
					border: 2px solid blue;
					box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.5);
					background-color: Transparent;
					padding: 16px 32px;
					font-size: 16px;
		margin-left: 40%;
					color: white;

}
			.contact-form{
				width:60%;
				height:65%;
				background: #000099;
				margin-left:20%;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			}


			.full-width-image {
			  height: 700px !important;
			  background: url('../resources/Images/pets.jpg') center center no-repeat;
			  background-size: cover;
			  
			
			  
			}
			.full-width-bgrd{
			  height: 700px !important;
			    background: linear-gradient(to bottom right, #0099ff 50%, #000099 50%);
			  background-size: cover;
			  
			
			  
			}
			.full-width-bgrd1{
			  height: 700px !important;
			  background: #0099ff;
			  background-size: cover;
			  
			
			  
			}
			.full-width-bgrd2{
			  height: 700px !important;
			  background: #0099ff;
			  background-size: cover;
			 padding-top:20%
			
			  
			}

			/* margin for super() DIV/ */

			.SuperDiv{
				margin-left: 10%;
				margin-right: 10%;


			}
			.p{
				margin-top: 15%;
				margin-right: 5px;
				margin-left: 5px;
			}


			.buttonS{

				border-radius: 25px;
				text-align: center;
				border: 2px solid blue;
				box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.5);
				background-color: Transparent;
				padding: 16px 32px;
				font-size: 16px;
				  -webkit-transition-duration: 0.4s; /* Safari */
   				 transition-duration: 0.4s;
   				 color: white;
    		
			}
			.buttonS:hover {
			   background: linear-gradient(to top right, #0099ff -13%, #99ccff 106%);
			    color: black;
			    border: none;


			}

			/* Create three equal columns that floats next to each other */
			.column {
			    float: left;
			    width: 30%;
			    padding: 10px;
			    height: 400px; 
			    margin-left: 15px;
			    margin-top: 12%;
			    border-radius: 25px;
			    background: linear-gradient(to top right, #0099ff -13%, #99ccff 106%);
			    box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.5);
			    text-align: center;
			    color: white;

			      -webkit-transition: all 200ms ease-in;
				    -webkit-transform: scale(1); 
				    -ms-transition: all 200ms ease-in;
				    -ms-transform: scale(1); 
				    -moz-transition: all 200ms ease-in;
				    -moz-transform: scale(1);
				    transition: all 200ms ease-in;
				    transform: scale(1)
			  	
			}
			.column:hover {
		

 				box-shadow: 0px 0px 150px #000000;
    			z-index: 2;
 				-webkit-transition: all 400ms ease-in;
			    -webkit-transform: scale(1.5);
			    -ms-transition: all 400ms ease-in;
			    -ms-transform: scale(1.1);   
			    -moz-transition: all 400ms ease-in;
			    -moz-transform: scale(1.1);
			    transition: all 400ms ease-in;
			    transform: scale(1.1);


			}

			/* Clear floats after the columns */
			.row:after {
			    content: "";
			    display: table;
			    clear: both;

			}
			/* Create three equal columns that floats next to each other */
			.column2 { 
			    float: left;
			    width: 30%;
			    padding: 10px;
			    height: 500px; 
			   
			    margin-top: 12%;
		
			    background: linear-gradient(to top, #ffffff 70%, #000099 50%);
			    box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.5);
			    text-align: center;
			    color: #000099;

			      -webkit-transition: all 200ms ease-in;
				    -webkit-transform: scale(1); 
				    -ms-transition: all 200ms ease-in;
				    -ms-transform: scale(1); 
				    -moz-transition: all 200ms ease-in;
				    -moz-transform: scale(1);
				    transition: all 200ms ease-in;
				    transform: scale(1)
			  	
			}
			.column2:hover {
		

 				box-shadow: 0px 0px 150px #000000;
    			z-index: 2;
 				-webkit-transition: all 400ms ease-in;
			    -webkit-transform: scale(1.5);
			    -ms-transition: all 400ms ease-in;
			    -ms-transform: scale(1.1);   
			    -moz-transition: all 400ms ease-in;
			    -moz-transform: scale(1.1);
			    transition: all 400ms ease-in;
			    transform: scale(1.1);


			}
			.p3 {
					color: white;
					text-align:left !important;
					margin-top:120px;
					color:#000099 ;
			}

			.p2 {
					color: white;
					margin-top:50px;
					margin-top:20px;

			}

			/* Clear floats after the columns */
			.row:after {
			    content: "";
			    display: table;
			    clear: both;

			}

			.buttonS2{

					border-radius: 25px;
					text-align: center;
					border: 2px solid blue;
					box-shadow: 1px 2px 10px rgba(0, 0, 0, 0.5);
					background-color: #000099;
					padding: 16px 32px;
					font-size: 16px;
						-webkit-transition-duration: 0.4s; /* Safari */
							transition-duration: 0.4s;
							color: white;

}

			/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
			@media screen and (max-width: 600px) {
			    .column {
			        width: 100%;
			    }
			}
			@media screen and (max-width: 600px) {
			    .column2 {
			        width: 100%;
			    }
			}
 

	</style>