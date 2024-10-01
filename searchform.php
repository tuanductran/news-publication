<form action="/" method="get">
	<label for="search">Search</label>
	<input type="text" name="s" id="search" value="<?php echo esc_attr( the_search_query() ); ?>" required>
	<button type="submit">Search</button>
</form>
