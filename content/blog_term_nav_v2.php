<div class="blog_category_v2">

	<div class="blog_category__cat_wrap">

		<?php
		  $args = array(
		    'taxonomy'   => 'topic',
		    'hide_empty' => false,
		  );
		  $terms = get_terms( $args );
		  // current
		  $cur_cat_obj   = get_queried_object();
		  $cur_term_id   = $cur_cat_obj->term_id;
		  $par_term_id   = $cur_cat_obj->parent;
		  $child_term_id = 0;
		  if ( $par_term_id != 0 ){
		  	$child_term_id = $par_term_id;
		  }	else {
		  	$child_term_id = $cur_term_id;
		  }
		  // child_terms
		  $child_terms  = array();
		?>
		<!-- parent terms -->
		<ul class="lv_1">
		  <?php foreach ($terms as $term) :
		  	if ($term->parent != 0){
		  		$child_terms[$term->parent][] = $term;
		  		continue;
		  	}
		    $term_ID = $term->term_id;
		    $name    = $term->name;
		  ?>
		  <li class="<?php if ( $cur_term_id == $term_ID || $par_term_id == $term_ID) echo 'active' ?>">
		    <a href="<?php echo get_term_link( $term_ID ); ?>">
		      <?php echo $name; ?>
		    </a>
		  </li>
		  <?php endforeach;  ?>
		</ul>
		<!-- child terms -->
		<ul class="lv_2">
		  <?php
		  if ( $child_terms[$child_term_id] ) :
		  foreach ($child_terms[$child_term_id] as $child_term) :
		    $child_term_ID = $child_term->term_id;
		    $child_name    = $child_term->name;
		  ?>
		  	<li class="<?php if ( $cur_term_id == $child_term_ID ) echo 'active' ?>">
			    <a href="<?php echo get_term_link( $child_term_ID ); ?>">
			      <?php echo $child_name; ?>
			    </a>
			  </li>
		  <?php 
		  	endforeach;
		  	endif;
		  ?>
		</ul>

	</div>

	<div class="blog_category__search_wrap">
		<form method="get" action="<?php echo home_url(); ?>" >
			<input type="text" name="s" placeholder="Поиск" class="blog_category__search__input" autocomplete="off">
			<button type="submit" class="blog_category__search__submit"><i class="fa fa-search" aria-hidden="true"></i></button>
		</form>
	</div>

</div>