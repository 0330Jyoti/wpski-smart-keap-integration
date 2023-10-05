<?php

	

	$wpszi_smart_Keap 				= get_option( 'wpszi_smart_Keap' );

	$wpszi_smart_Keap_settings 		= get_option( 'wpszi_smart_Keap_settings' );



	$client_id 						=  isset($wpszi_smart_Keap_settings['client_id']) ? $wpszi_smart_Keap_settings['client_id'] : "";

	$client_secret 					= isset($wpszi_smart_Keap_settings['client_secret']) ? $wpszi_smart_Keap_settings['client_secret'] : "";

	$wpszi_smart_Keap_data_center 	= isset($wpszi_smart_Keap_settings['data_center']) ? $wpszi_smart_Keap_settings['data_center'] : "";



	$wpszi_smart_Keap_data_center 	= ( $wpszi_smart_Keap_data_center ? $wpszi_smart_Keap_data_center : 'https://accounts.Keap.com' );

?>



<div class="wrap">                

	

	<h1><?php echo esc_html__( 'Keap CRM Settings and Authorization' ); ?></h1>

	<hr>



	<form method="post">

		<?php 

			$tab = isset( $_REQUEST['tab'] ) ? $_REQUEST['tab'] : 'general';

		?>



		<nav class="nav-tab-wrapper woo-nav-tab-wrapper">

			<a href="<?php echo admin_url('admin.php?page=wpski-smart-keap-integration&tab=general'); ?>" class="nav-tab <?php if($tab == 'general'){ echo 'nav-tab-active';} ?>"><?php echo esc_html__( 'General', 'wpski-smart-keap' ); ?></a>

			<a href="<?php echo admin_url('admin.php?page=wpski-smart-keap-integration&tab=synch_settings'); ?>" class="nav-tab <?php if($tab == 'synch_settings'){ echo 'nav-tab-active';} ?>"><?php echo esc_html__( 'Synch Settings', 'wpski-smart-keap' ); ?></a>

		</nav>

		

		<input type="hidden" name="tab" value="<?php echo esc_html($tab); ?>">



		<?php if( isset($tab) && 'general' == $tab ){ ?>

			

			<table class="form-table general_settings">

				<tbody>

					<tr>

						<th scope="row"><label><?php echo esc_html__( 'Data Center', 'wpszi-smart-Keap' ); ?></label></th>

						<td>

							<fieldset>

								<label>

									<input 

										type="radio" 

										name="wpszi_smart_Keap_settings[data_center]" 

										value="https://accounts.Keap.com"

										<?php echo esc_html( $wpszi_smart_Keap_data_center == 'https://accounts.Keap.com' ? ' checked="checked"' : '' ); ?> />

										United States (US)

								</label><br>



								<label>

									<input 

										type="radio" 

										name="wpszi_smart_Keap_settings[data_center]" 

										value="https://accounts.Keap.eu"

										<?php echo esc_html( $wpszi_smart_Keap_data_center == 'https://accounts.Keap.eu' ? ' checked="checked"' : '' ); ?> />

										Europe (EU)

								</label><br>



								<label>

									<input 

										type="radio" 

										name="wpszi_smart_Keap_settings[data_center]" 

										value="https://accounts.Keap.com.cn"

										<?php echo esc_html( $wpszi_smart_Keap_data_center == 'https://accounts.Keap.com.cn' ? ' checked="checked"' : '' ); ?> />

										China (CN)

								</label>

							</fieldset>

						</td>

					</tr>



					<tr>

						<th scope="row">

							<label><?php echo esc_html__( 'Client ID', 'wpszi-smart-Keap' ); ?></label>

						</th>

						<td>

							<input class="regular-text" type="text" name="wpszi_smart_Keap_settings[client_id]" value="<?php echo esc_attr($client_id); ?>" required />

						</td>

					</tr>



					<tr>

						<th scope="row">

							<label><?php echo esc_html__( 'Client Secret', 'wpszi-smart-Keap' ); ?></label>

						</th>

						<td>

							<input class="regular-text" type="text" name="wpszi_smart_Keap_settings[client_secret]" value="<?php echo esc_attr($client_secret); ?>" required />

						</td>

					</tr>



					<tr>

						<th scope="row">

							<label><?php echo esc_attr( 'Redirect URI', 'wpski-smart-keap' ); ?></label>

						</th>

						<td>

							<input class="regular-text" type="text" value="<?php echo esc_url(WPSKI_REDIRECT_URI); ?>" readonly />

						</td>

					</tr>



					<tr>

						<th scope="row">

							<label><?php echo esc_html__( 'Access Token', 'wpszi-smart-Keap' ); ?></label>

						</th>

						<td>

							

							<?php 

								if(isset($wpszi_smart_Keap->access_token)){

									echo esc_html($wpszi_smart_Keap->access_token);

								}

							?>

						</td>

					</tr>



					<tr>

						<th scope="row">

							<label><?php echo esc_html__( 'Refresh Token', 'wpszi-smart-Keap' ); ?></label>

						</th>

						<td>

							<?php 

								if(isset($wpszi_smart_Keap->refresh_token)){

									echo esc_html($wpszi_smart_Keap->refresh_token);

								}

							?>

						</td>

					</tr>

					

				</tbody>

			</table>



			<div class="inline">

				<p>

					<input type='submit' class='button-primary' name="submit" value="<?php echo esc_html__( 'Save & Authorize', 'wpszi-smart-Keap' ); ?>" />

				</p>



				<?php 

					if(isset($wpszi_smart_Keap->refresh_token)){

						echo '<p class="success">'.esc_html__('Authorized', 'wpszi-smart-Keap').'</p>';

					}

				?>

			</div>



		<?php }else if( isset($tab) && 'synch_settings' == $tab ){ ?>

			<?php 

				$smart_Keap_obj   = new WPSZI_Smart_Keap();

		        $wp_modules 	= $smart_Keap_obj->get_wp_modules();

		        $getListModules = $smart_Keap_obj->get_Keap_modules();

			?>

			<table class="form-table synch_settings">

				<tbody>

					<?php

						if($getListModules['modules']){

					        foreach ($getListModules['modules'] as $key => $singleModule) {

					            if( $singleModule['deletable'] &&  $singleModule['creatable'] ){

					            	foreach ($wp_modules as $wp_module_key => $wp_module_name) {

					            		?>

						            		<tr>

												<th scope="row"><label><?php echo esc_html__( "Enable {$wp_module_key} to Keap {$singleModule['api_name']} Sync", 'wpszi-smart-Keap' ); ?></label></th>

												<td>

													<fieldset>

														<label>

															<input 

																type="checkbox" 

																name="wpszi_smart_Keap_settings[synch][<?php echo $wp_module_key.'_'.$singleModule['api_name']; ?>]" 

																<?php @checked( $wpszi_smart_Keap_settings['synch']["{$wp_module_key}_{$singleModule['api_name']}"], 1 ); ?>

																value="1" />

																Enable

														</label>

													</fieldset>

												</td>

											</tr>

						            	<?php	

					            	}

					            }

					        }

					    }

					?>    

    				

				</tbody>

			</table>

			<p><input type='submit' class='button-primary' name="submit" value="<?php echo esc_html__( 'Save', 'wpszi-smart-Keap' ); ?>" /></p>

		

		<?php }?>	

		

	</form>

</div>