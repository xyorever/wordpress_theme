<?php 
// product redirection
if(isset($_GET['related-product'])&&$_GET['related-product']=="omega"){  
	wp_redirect("https://store.onion.io/products/omega-dock"); 
}

if(isset($_GET['related-product'])&&$_GET['related-product']=="expansion"){  
	wp_redirect("https://store.onion.io/collections/onion-omega-expansions/products/the-dock"); 
}

 ?>