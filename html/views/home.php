<?php defined('__ROOT__') OR exit('No direct script access allowed'); ?>

<div class="jumbotron">
	<div class="container">
	  <h1 class="display-3"><?php echo __SITE_NAME__; ?></h1>
	  <h1>Account</h1>
	  <?php var_dump($this->allAccounts); ?>
<?php foreach ($this->allAccounts as $account): ?>
	<h4><?php echo $account->owner_name ?></h4>
	
<?php endforeach; ?>
	</div>
</div>
