<?php
/**
 * Default Header Template
 */
?>
<div id="expanded-header">
	<div class="container px-0 tp-header ">
		<div class="row text-center p-0 m-0 ">
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 top-left-widget d-flex align-items-center text-start mb-2 mb-md-0">
				<?php
				if ( is_active_sidebar( 'top_left_widget_area' ) ) {
					dynamic_sidebar( 'top_left_widget_area' );
				}
				?>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-9 col-xs-9 col-9 my-2 my-lg-0 d-flex d-lg-block d-md-block align-items-start align-items-lg-center">
				<?php
				if ( function_exists( 'get_custom_logo' ) ) {
					echo wp_kses_post( get_custom_logo() );
				}
				?>
				<nav class="col navigation">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'top-menu',
								'menu_class'     => 'navigation',
							)
						);
						?>
				</nav>	
			</div>
			<div class="col-3 mobile-nav-btn wrapper d-none">
				<div class="icon nav-icon" onclick="toggle_visibility('overlay');">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ps-0 pe-0 search-default top-right-widget d-flex align-items-center text-end mt-2 mt-md-0 justify-content-end">
				<div class="m-search">	
					<i class="fa fa-search"></i>
						<?php
						if ( is_active_sidebar( 'top_right_widget_area' ) ) {
							dynamic_sidebar( 'top_right_widget_area' );
						}
						?>
						
				</div>		
			</div>
		</div>

		<div class="row text-center p-0 m-0  s-fixex center-header">
			<div class=" col-lg-1 col-md-3 col-sm-12 col-xs-12 top-left-widget d-flex align-items-center text-start mb-2 mb-md-0">
			</div>
			<div class="col-lg-10 col-md-5 col-sm-9 col-xs-9 col-9 my-2 my-lg-0 d-flex d-lg-block align-items-start align-items-lg-center desktop-menu">
				<nav class="col navigation">
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'top-menu',
								'menu_class'     => 'navigation',
							)
						);
						?>
				</nav>	
			</div>
			<div class="col-lg-1 col-1 mobile-nav-btn wrapper">
			<div class="icon nav-icon" onclick="toggle_visibility('overlay');">
						<span></span>
						<span></span>
						<span></span>
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
						<div class="row">	
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
					<div class="row ">	
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
											'menu_class' => 'navigation-mobile-overlay',
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
</div>
