<style type="text/css">
.npub-info-container {
    background: #fff;
    padding: 115px 64px 30px 64px;
    width: calc(100% - 20px);
    box-sizing: border-box;
    margin-top: 20px;
    margin-bottom: 20px;
    display: flex;
}
.npub-info-container *{
	box-sizing: border-box;
}	
.npub-info-left {
    width: 40%;
}
.npub-info-right {
    width: 52.5%;
    margin-left: 7.5%;
}
h1.main-title {
    font-style: normal;
    font-weight: 700;
    font-size: 22px;
    line-height: 25px;
    color: #000000;
    display: flex;
    align-items: center;
    margin-top: 0;
    margin-bottom: 30px;
}
h1.main-title span {
    background: #3F3BE6;
    border-radius: 40px;
    color: #fff;
    margin-left: 28px;
    font-weight: 700;
    font-size: 16px;
    line-height: 18px;
    padding: 12px 28px;
}
h2.sub-title {
    margin-top: 0;
    margin-bottom: 20px;
    font-weight: 700;
    font-size: 16px;
    line-height: 28px;
    color: #000000;
}
.npub-info-container p {
    font-weight: 400;
    font-size: 16px;
    line-height: 28px;
    color: #000000;
    margin-top: 0;
    margin-bottom: 20px;
}
.npub-info-container p strong {
    font-weight: 700;
}
.npub-info-container img {
    display: block;
    max-width: 100%;
    height: auto;
}
.npub-info-container .mb10{
	margin-bottom: 10px;
}
.npub-info-container .mb20{
	margin-bottom: 20px;
}
.npub-info-container .mb25{
	margin-bottom: 25px;
}
.npub-info-container .mb30{
	margin-bottom: 30px;
}
.npub-info-container .mb35{
	margin-bottom: 35px;
}
.npub-info-container .mb40{
	margin-bottom: 40px;
}
.npub-info-container .mb45{
	margin-bottom: 45px;
}
.npub-info-container .mb50{
	margin-bottom: 50px;
}
.npub-acc:not(:last-child) {
    margin-bottom: 20px;
}
.npub-acc-head {
    font-weight: 700;
    font-size: 16px;
    line-height: 28px;
    color: #000000;
    background: #F0F0F0;
    border-radius: 40px;
    padding: 7px 10px 7px 30px;
    position: relative;
    display: flex;
    align-items: center;
    cursor: pointer;
}
.npub-acc-head:before {
    width: 0;
    height: 0;
    border-top: 8px solid transparent;
    border-bottom: 8px solid transparent;
    border-left: 8px solid #3F3BE6;
    content: "";
    margin-right: 15px;
	transition: all 0.5s;
}
.npub-acc.acc-active .npub-acc-head:before {
	transform: rotate(-90deg);
}
.npub-acc:not(.acc-active) .npub-acc-content {
    display: none;
}
.acc-col {
    display: flex;
    justify-content: space-between;
}
.acc-col .acc-col-left,
.acc-col .acc-col-right {
    width: calc(50% - 20px);
}
</style>


<div class="npub-info-container">
	<div class="npub-info-left">
		<h1 class="main-title mb35">News Publication Theme <span>Intro & Guide</span></h1>
		<p class="mb40">News Publication Theme is a light weight theme which uses <strong>nBlocks</strong> widgets as its primary building block.</p>
		<img class="mb40" src="<?php echo NPUB_THEME_URI ?>assets/img/admin/nBlocks.png" alt="">
		<h2 class="sub-title mb25">How to get started:</h2>
		<h2 class="sub-title mb25">Step 1 - Activate Demo Import plugin.</h2>
		<img class="mb40" src="<?php echo NPUB_THEME_URI ?>assets/img/admin/demo-import-plugin.png" width="486" height="125" alt="">
		<h2 class="sub-title mb25">Step 2 - Navigate to Appearance > Import Demo Data</h2>
		<img class="mb40" src="<?php echo NPUB_THEME_URI ?>assets/img/admin/import-demo-data.png" width="183" height="233" alt="">
		<h2 class="sub-title mb25">Step 3 - Select one of the demos to import. Done! Happy editing!</h2>
	</div>
	<div class="npub-info-right">
		<h2 class="sub-title mb20">How to customize</h2>
		<div class="npub-admin-acc-wrap">
			<div class="npub-acc acc-active">
				<div class="npub-acc-head">Editing pages, building & designing with nBlocks</div>
				<div class="npub-acc-content">
					<div class="acc-col">
						<div class="acc-col-left">
							<p class="mb20">Step 1.<br>Click on Pages.</p>
							<img class="mb45" src="<?php echo NPUB_THEME_URI ?>assets/img/admin/page.png" width="178" height="113" alt="">
						</div>
						<div class="acc-col-right">
							<p class="mb20">Step 2.<br>Add a new page or edit an existing one.</p>
							<img class="mb45" src="<?php echo NPUB_THEME_URI ?>assets/img/admin/existing.png" width="260" height="202" alt="">
						</div>
					</div>
					<div class="acc-col">
						<div class="acc-col-left">
							<p class="mb20">Step 3.<br>Tap the + button on your native WordPress editor (Gutenberg), and click on the “nBlocks” widget.<br><br>Note: This theme doesn’t require 3rd party editors. Make sure you’re editing your page with WordPress.</p>
							<img class="mb45" src="<?php echo NPUB_THEME_URI ?>assets/img/admin/nBlocks-widget.png" width="299" height="311" alt="">
						</div>
						<div class="acc-col-right">
							<p class="mb20">Step 4.<br>Select one of the article layouts.</p>
							<img class="mb45" src="<?php echo NPUB_THEME_URI ?>assets/img/admin/article.png" width="345" height="266" alt="">
						</div>
					</div>
					<div class="acc-col">
						<div class="acc-col-left">
							<p class="mb20">Step 5.<br>A preview of your latest posts will show up as a block in your editor.<br><br>Go to the block settings on the right panel to filter your latest posts based on categories, author, dates & more.<br><br>Apply the “Post Offset” function to offset the order of posts showing on the multiple blocks you’ll add to the page, to avoid duplicate posts.</p>
						</div>
						<div class="acc-col-right">
							<img class="mb45" src="<?php echo NPUB_THEME_URI ?>assets/img/admin/preview.png" width="330" height="504" alt="">
						</div>
					</div>
				</div>
			</div>
			<div class="npub-acc">
				<div class="npub-acc-head">Editing pages, building & designing with nBlocks</div>
				<div class="npub-acc-content">
					<div class="acc-col">
						<div class="acc-col-left">
							<p class="mb20">Step 1.<br>Click on Pages.</p>
							<img class="mb45" src="<?php echo NPUB_THEME_URI ?>assets/img/admin/page.png" width="178" height="113" alt="">
						</div>
						<div class="acc-col-right">
							<p class="mb20">Step 2.<br>Add a new page or edit an existing one.</p>
							<img class="mb45" src="<?php echo NPUB_THEME_URI ?>assets/img/admin/existing.png" width="260" height="202" alt="">
						</div>
					</div>
					<div class="acc-col">
						<div class="acc-col-left">
							<p class="mb20">Step 3.<br>Tap the + button on your native WordPress editor (Gutenberg), and click on the “nBlocks” widget.<br><br>Note: This theme doesn’t require 3rd party editors. Make sure you’re editing your page with WordPress.</p>
							<img class="mb45" src="<?php echo NPUB_THEME_URI ?>assets/img/admin/nBlocks-widget.png" width="299" height="311" alt="">
						</div>
						<div class="acc-col-right">
							<p class="mb20">Step 4.<br>Select one of the article layouts.</p>
							<img class="mb45" src="<?php echo NPUB_THEME_URI ?>assets/img/admin/article.png" width="345" height="266" alt="">
						</div>
					</div>
					<div class="acc-col">
						<div class="acc-col-left">
							<p class="mb20">Step 5.<br>A preview of your latest posts will show up as a block in your editor.<br><br>Go to the block settings on the right panel to filter your latest posts based on categories, author, dates & more.<br><br>Apply the “Post Offset” function to offset the order of posts showing on the multiple blocks you’ll add to the page, to avoid duplicate posts.</p>
						</div>
						<div class="acc-col-right">
							<img class="mb45" src="<?php echo NPUB_THEME_URI ?>assets/img/admin/preview.png" width="330" height="504" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(document).on("click", ".npub-acc-head", function (e) {
		    e.preventDefault();
		    jQuery(this).parents('.npub-acc').toggleClass('acc-active').siblings().removeClass('acc-active');
		});
    });
</script>