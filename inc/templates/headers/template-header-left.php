<?php
/**
 * Left Header Template
 */
?>
<div id="expanded-header" class="left-header ">
	<div class="container">
		<div class="row text-center align-items-center center-header">
			<div class="col-xl-2 col-lg-2 col-md-5 col-sm-6 col-xs-6 col-6 d-flex align-items-center text-start tp-header">
			<?php
				if ( function_exists( 'get_custom_logo' ) ) {
					echo wp_kses_post( get_custom_logo() );
				}
				?>		
			</div>
			<div class="col-xl-8 col-lg-8 col-md-6 col-sm-4 col-xs-4 col-4  d-flex d-lg-block align-items-center">
				<div class="row text-center">
						<nav class="col navigation-condensed  px-0">
							<div class="container-fluid p-0">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'top-menu',
										'menu_class'     => 'navigation-condensed',
									)
								);
								?>
							</div>
						</nav>
				</div>   	
			</div>
			<div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 col-2  d-lg-flex flex-row-reverse visiable_mobile">
				<div class="mobile-nav-btn-expanded wrapper">
						<div class="icon nav-icon" onclick="toggle_visibility('overlay');">
						<span></span>
						<span></span>
						<span></span>
						</div>
				</div>
			</div>

		</div>
	</div>
	<div class="mega_menu_wrapper">
		<div class="nav-top-wrapper">
			<div class="nav-top">  
				<div id="indicator"></div>
				<div class="container">
					<div class="default-menu">
						<div class="row ">	
							<div class="col-10 col-md-11 col-lg-12 col-xl-12">
								<div class="top-left-widget  mb-2 mb-md-0 mobile-view">
									<?php
									if ( function_exists( 'get_custom_logo' ) ) {
										echo wp_kses_post( get_custom_logo() );
									}
									?>
								</div>
								<div class="ticker-wrapper-h">
									<ul class="news-ticker-h npub-link">
										<?php
										if ( function_exists( 'npub_latest_posts' ) ) {
											npub_latest_posts();
										}
										?>
									</ul>
								</div>
							</div>
							<div class="col-2 col-md-1 col-lg-1 col-xl-1 mobile-nav-btn wrapper d-none">
								<div class="icon nav-icon" onclick="toggle_visibility('overlay');">
									<span></span>
									<span></span>
									<span></span>
								</div>
							</div>
						</div>
					</div>

					<div class="stacky-menu"> 				
						<div class="row">	
							<div class="col-10 col-md-11 col-xl-11 col-lg-11">
								<div class="top-left-widget  mb-2 mb-md-0 mobile-view">
									<?php
									if ( function_exists( 'get_custom_logo' ) ) {
										echo wp_kses_post( get_custom_logo() );
									}
									?>
								</div>
								<div class="ticker-wrapper-h">
									<ul class="news-ticker-h npub-link">
										<?php
										if ( function_exists( 'npub_latest_posts' ) ) {
											npub_latest_posts();
										}
										?>
									</ul>
								</div>
							</div>
							<div class="col-2 col-md-1 col-lg-1 col-xl-1 mobile-nav-btn wrapper">
								<div class="icon nav-icon" onclick="toggle_visibility('overlay');">
									<span></span>
									<span></span>
									<span></span>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="overlay">
			<div class="container">
				<div class="row">
					<div class="col-md-12 search-s">
						<div class="py-3 px-0 mb-3 search-mobile">	
							<i class="fa fa-search" aria-hidden="true"></i>
							<?php
							if ( is_active_sidebar( 'top_right_widget_area' ) ) {
								dynamic_sidebar( 'top_right_widget_area' );
							}
							?>
						</div>
					</div>	
					<div class="col-md-12 col-xl-3 col-lg-3 main_navigation">  
						<div class="overlay-content left-side-overlay">
							<div class="py-0 px-0 social_icon">
								<?php
								if ( is_active_sidebar( 'top_left_widget_area' ) ) {
									dynamic_sidebar( 'top_left_widget_area' );
								}
								?>
							</div>
							<div class="py-0 px-0">
								<?php
									wp_nav_menu(
										array(
											'theme_location' => 'top-menu',
											'menu_class'     => 'navigation-mobile-overlay',
										)
									);
									?>
							</div>
						</div>
					</div>
					<div class="col-md-1 col-xl-1 col-lg-1"></div>
					<div class="col-md-8 col-xl-8 col-lg-8">
						<div class="row">
							<?php
							if ( is_active_sidebar( 'overlay_widget_area' ) ) {
								dynamic_sidebar( 'overlay_widget_area' );
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
