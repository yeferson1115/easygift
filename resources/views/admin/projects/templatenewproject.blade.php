<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet"> 
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap');

		@font-face {
		  	font-family: "Raleway", sans-serif;
			src: url('<?=url('css/raleway/raleway-regular.eot')?>'); /* IE9 Compat Modes */
		    src: url('<?=url('css/raleway/raleway-regular.eot')?>?#iefix') format('embedded-opentype'), /* IE6-IE8 */
		         url('<?=url('css/raleway/raleway-bold.woff')?>') format('woff'), /* Modern Browsers */
		         url('<?=url('css/raleway/Raleway-VariableFont_wght.ttf')?>')  format('truetype'); /* Safari, Android, iOS */
		}
		body{
			font-family: "Raleway", sans-serif;
			background-color: #EFEFEF;
			font-size: 15px;
			
			color: #5F5F5F;
		}

		table tr td, table tr td h3, table tr td h4, table tr td p, table tr td span{
			font-family: "Raleway", sans-serif;	
			font-size: 15px;
			
		}
		.titprod{
			font: normal normal bold 22px/18px Raleway;
			letter-spacing: 1px;
			color: #5F5F5F;
		}
		.txtdetalle, .txtdetalle span{
			color: #5F5F5F;
    		font: normal normal normal 14px/18px Raleway;
		}
		.tablealma{
			background-color: #ffffff;
	        -moz-border-radius: 45px;
	        overflow:hidden;
	        border: 0px;
	        font-family: "Raleway", sans-serif;
		}
		.tablealmainterna{
			padding: 10px 0;
			font-family: "Raleway", sans-serif;	
		}

		.button-3 {
			width: 50%;
		  	appearance: none;
		  	background-color: #2ea44f;
		  	border-radius: 25px;
		  	box-sizing: border-box;
		  	color: #fff;
		  	cursor: pointer;
		  	display: inline-block;
		  	font-family: "Raleway", sans-serif;
		  	font-weight: 700;
		  	line-height: 20px;
		 	padding: 15px 0;
		  	position: relative;
		  	text-align: center;
		  	text-decoration: none;
		  	user-select: none;
		  	-webkit-user-select: none;
		  	touch-action: manipulation;
		  	vertical-align: middle;
		  	white-space: nowrap;

		}

		.button-3:focus:not(:focus-visible):not(.focus-visible) {
		  box-shadow: none;
		  outline: none;
		}

		.button-3:hover {
		  background-color: #2c974b;
		}

		.imagenpro{
			max-height: 80px; 
			max-width:85px;
			border-radius: 15px;
	        -moz-border-radius: 15px;
		}
		.obser{
			color: #707070;
    		font-size: 16px;
		}
		.btn-4{
		width: 50%;
		appearance: none;
		border-radius: 25px;
		box-sizing: border-box;
		color: #1FD161;
		cursor: pointer;
		display: inline-block;
		font-family: "Raleway", sans-serif;
		font-weight: 700;
		line-height: 20px;
		padding: 15px 0;
		position: relative;
		text-align: center;
		text-decoration: none;
		user-select: none;
		-webkit-user-select: none;
		touch-action: manipulation;
		vertical-align: middle;
		white-space: nowrap;
		border: solid 2px #1FD161;
		}

	</style>
</head>

<body>
	<table width="100%">
		<tr>
			<td style="background-color:#EFEFEF;">
				<!-- INICIO PLANTILLA -->

				<center>
					<table width="90%" class="tablealma">
						<tr>
							<td style="color: white; text-align: center; vertical-align: middle; padding: 40px 0; ">
								<img src="{{ asset('images/logo/logo-kanbai-color.png') }}" width="25%"> 
							</td>
						</tr>
						<tr>
							<td style="text-align: center; vertical-align: middle; padding: 40px 0 20px 0;">
								<h3 style="font: normal normal 600 20px/24px Montserrat;letter-spacing: 0px;color: #707070;opacity: 1;font-size: 20px;">¡Hola {{ $project['customer'] }}!</h3>
							</td>
						</tr>
						<tr>
							<td>
								<center>
									<table style="width: 90%;">
										<tr>
											<td align="center" style="background-color:#ffffff; font-family: 'Raleway', sans-serif;">
												<p style="color: #707070;font-size: 16px; margin-bottom: 0px;"> Nos alegra darte la bienvenida a este nuevo proyecto! 🎉 Ya hemos registrado todos los detalles iniciales y estamos listos para comenzar a trabajar juntos en cada paso.<br>
													Para ver el avance de tu proyecto, puedes acceder a nuestra plataforma en cualquier momento <a  target="_blank" href="{{ url('mis-proyectos/'.$project['id']) }}">Click Aquí</a> usando tu correo y el numero del proyecto (Número de la orden).<br>
													Allí encontrarás toda la información relevante, fechas de seguimiento y actualizaciones en tiempo real. Además, tu ejecutivo(a) de cuenta, {{ $project['asesor'] }}, estará siempre disponible para responder tus preguntas y ofrecerte el acompañamiento que necesites.<br>
													Gracias por confiar en nosotros. ¡Estamos emocionados de colaborar en este nuevo camino!</p>
												<br>
												
											</td>
										</tr>
									</table>
								</center>
							</td>
						</tr>
						<tr><td colspan="2" style="height:30px;">&nbsp;</td></tr>
						
						<tr><td colspan="2" style="height:30px;">&nbsp;</td></tr>
						
						
						<tr><td colspan="2" style="height:30px;">&nbsp;</td></tr>
						<tr>
							<td style="text-align: center; vertical-align: middle; background-color:#ffffff;">							
								<a class="btn-4" target="_blank" href="https://api.whatsapp.com/send?phone={{ $project['phone_asesor'] }}&text=Hola, ...">Contactar asesor</a>							
							</td>
						</tr>
						<tr><td colspan="2" style="height:30px;">&nbsp;</td></tr>
						<tr><td colspan="2" style="height:30px;">&nbsp;</td></tr>
						<tr>
							<td style="background-color:#ffffff; text-align: center;">
								<center>
									<table width="90%" class="tablealmainterna" cellspacing="0" cellpadding="0">
										<tr>
											<td width="10%" style="background-color:#CDCBCB;"></td>
											<td width="70%" style="background-color:#CDCBCB; vertical-align: middle;"><h3>Número de Solicitud:</h3></td>
											<td width="20%"style="background-color:#CDCBCB; vertical-align: middle;"><h3>#{{ $project['id'] }}</h3></td>
										</tr>
									</table>
								</center>
							</td>
						</tr>
						<tr>
							<td style="background-color:#ffffff;">
								<center>
									<table width="90%" class="tablealmainterna">
										@foreach($project->productos as $items)
										<tr>
											<td width="30%" style="text-align: center; vertical-align: middle;">
                                                <img class="imagenpro" src="{{ asset('images/custom_request/'.$items->imagen.'') }}">
											</td>
											<td width="70%" style="vertical-align: top;">
												<span class="titprod">{{ $items['producto'] }}</span>
												<br>
												<span class="txtdetalle">
													Fecha de entrega: <span style="color: #1FD161;font: normal normal bold 14px/18px Raleway;">{{ $project['date_shopping'] }}</span>
													<br>
													Cantidad a cotizar: <span style="color:#1FD161">{{ $items['quantity'] }}</span>
													<br>
													Valor Unidad: <span style="color:#1FD161">${{number_format($items->price, 0, 0, '.')}}</span>
												</span>
											</td>
										</tr>
										@endforeach
										<tr><td colspan="2" style="height:30px;">&nbsp;</td></tr>
										<tr>
											<td colspan="2">
												<span class="obser"><b style="font-weight: bold;font-size: 16px;color: #707070;">Informacion de envio: </b> 
												{{ $project['information_shopping'] }}
											</td>
										</tr>
									</table>
								</center>
							</td>
						</tr>
						<tr><td style="height:80px;">&nbsp;</td></tr>
					</table>
				</center>

				<!-- FINAL PLANTILLA -->
				
			</td>
		</tr>
		
	</table>
	
</body>
</html>