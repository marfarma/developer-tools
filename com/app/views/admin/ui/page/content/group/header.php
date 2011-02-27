<?php if( $view['begin_form'] ) : ?>
  <form method="post" enctype="multipart/form-data" action="<?php print $view['action'] ?>" name="developer_tools">
  <?php wp_nonce_field('developer-tools'); // DO NOT REMOVE THIS LINE ?>
<?php endif; ?>
  <div class="postbox<?php 
    print $view['group_classes']; 
  	if( $view['group'] ){
  	 print ' '.$view['group'];
  	 if( $view['group'] != $view['active'] && $view['group'] != 'global' && $view['active'] != 'all' ){ print ' hidden'; }
  	} 
  ?>">
  	<div title="<?php _e('Click to toggle', 'developer-tools' ) ?>" class="handlediv"><br></div>
  	<h3 class="hndle"><span><?php print $view['group_title'] ?></span></h3>
  	<div class="inside">
