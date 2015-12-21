<?php
$this->Html->addCrumb($user->name);

// Profile block

$this->start('profile'); ?>
	<img class="profile-user-img img-responsive img-circle" src="https://avatars3.githubusercontent.com/u/796840?v=3&s=140">
	<h3 class="profile-username text-center"><?= $user->name ?></h3>
	<p class="text-muted text-center"><?= $this->Text->autoLinkEmails($user->email) ?></p>
	<ul class="list-group list-group-unbordered">
		<li class="list-group-item">
			<b>Joined</b>
			<span class="pull-right"><?= $this->Time->timeAgoInWords($user->created) ?></span>
	 	</li>
	 	<li class="list-group-item">
	 		<b>Last Login</b>
	 		<span class="pull-right"><?= $this->Time->timeAgoInWords($user->lastLogin) ?></span>
	 	</li>
	</ul>
	<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
<? $this->end(); 

// Meetings list block

$this->start('meetings'); ?>
	<ul class="products-list product-list-in-box">
		<?php foreach ($user->meetings as $meeting): ?>
		<li class="item">
			<div class="product-img">
				<img src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/default-50x50.gif">
			</div>
			<div class="product-info">
				<a href="#" class="product-title">
					<?php
						$cust = [];
						foreach ($meeting->customers as $customer) {
							$cust[] = $customer->name;
						}
					echo $this->Text->toList($cust); 
					?>
				</a>	
					<small class="text-muted pull-right"><?= $meeting->created->timeAgoInWords() ?></small>
				
				<div class"product-description"><?= $meeting->description ?></div>
			</div>
		</li>
		<?php endforeach; ?>
	</ul>
<? $this->end(); ?>

<div class="row">
	<div class="col-md-3">
		<?= $this->Front->box(['content' => $this->cell('Test')]); ?>
		
		<?= $this->Front->box(['title' => 'About me', 'content' => '<strong><i class="fa fa-book margin-r-5"></i>Education</strong><p class="text-muted">Lorem ipsum</p>']); ?>
	</div>
	
	<div class="col-md-9">
		<?= $this->front->box(['title' => 'Recent meetings', 'content' => $this->fetch('meetings'), 'footerClass' => 'text-center', 'footer' => '<a href="#" class="text-uppercase">View all meetings</a>']); ?>
	</div>
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".modal">
  Launch demo modal
</button>

<? echo $this->Front->modal(['title' => 'Test', 'content' => 'Content']);