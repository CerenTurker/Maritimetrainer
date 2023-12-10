<?php defined('__ROOT__') OR exit('No direct script access allowed'); ?>
<h1>Account</h1>
<?php foreach ($this->allAccounts as $account): ?>
	<h4><?php echo $account->owner_name ?></h4>
<?php endforeach; ?>