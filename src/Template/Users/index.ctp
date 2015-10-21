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