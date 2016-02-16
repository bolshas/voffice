<?php
echo $this->Html->script('/js/plugins/jquery.sparkline.min.js', ['block' => true]);
echo $this->Html->scriptBlock('$(".inlinesparkline").sparkline("html", {type: "bar", barColor: "#357ca5", height: "30px", barWidth: "5px"});', ['block' => true]);

ob_start(); ?>
<table class="table table-condensed table-hover table-user-list">
	<tbody>
		<tr>
			<td><img class="img-circle" src="http://lorempixel.com/128/128/people/1"></td>
			<td width="100%">Andrius Bolsaitis</td>
			<td><span class="badge bg-red pull-right">43</span></td>
		</tr>
		<tr>
			<td><img class="img-circle" src="http://lorempixel.com/128/128/people/1"></td>
			<td>Andrius Bolsaitis</td>
			<td><span class="badge bg-red pull-right">43</span></td>
		</tr>
		<tr>
			<td><img class="img-circle" src="http://lorempixel.com/128/128/people/1"></td>
			<td>Andrius Bolsaitis</td>
			<td><span class="badge bg-red pull-right">43</span></td>
		</tr>
	</tbody>
</table>

<?php $content = ob_get_clean(); ?>


<div class="row">
	<div class="col-md-4"><?= $this->Front->box(['padding' => false, 'title' => 'Meetings this month', 'content' => $content]); ?></div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Users</h3>
			</div>
			<div class="box-body no-padding">
				<table class="table table-striped">
					<tbody>
						<th>name</th>
						<th>email</th>
						<th>created</th>
						<th>modified</th>
						<th colspan="3"><b>actions</b></th>
						<?php
						foreach ($users as $user) {
							echo "<tr>";
							echo "<td>$user->name</td>";
							echo "<td>$user->email</td>";
							echo "<td>$user->created</td>";
							echo "<td>$user->modified</td>";
							echo "<td>" . $this->Html->link('view', ['action' => 'view', $user->id]) . "</td>";
							echo "<td>" . $this->Html->link('edit', ['action' => 'edit', $user->id]) . "</td>";
							echo "<td>" . $this->Html->link('delete', ['action' => 'delete', $user->id]) . "</td>";
							echo "</tr>";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<?php
echo $this->Html->link('Add user', ['controller' => 'Users', 'action' => 'add']);
echo "<br>";
echo $this->Paginator->numbers();
?>