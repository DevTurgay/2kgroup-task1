<div class="jumbotron">
	<h1 class="display-4">Bets Data</h1>
	<?php if(!validateBetData($data)): ?>
		<p class="lead alert alert-danger" >Data is not available!</p>
	</div>
	<?php else: ?>
	<p class="lead alert alert-<?=$data['Header']['ErrorCode'] == 0 ? 'success' : 'danger'?>" >Merchant: <?=$data['Header']['MerchantID'] ?? null?></p>
	<hr class="my-4">
	<p>Total record: <?=$data['Param']['TotalRecord'] ?? 'Total record is not available'?></p>
</div>

<div class="jumbotron noBg">
	<p class="lead"><b>Bets:</b></p>
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">UserID</th>
				<th scope="col">ProductID</th>
				<th scope="col">BetType</th>
				<th scope="col">BetAmount</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sumAmount = 0;
				$count = 0;
				foreach ($data['Param']['BetInfo'] ?? [] as $key => $value):
					$sumAmount += $value['BetAmount'];
					$count++;
			?>
			<tr>
				<th scope="row"><?=$value['No']?></th>
				<td><?=$value['UserID']?></td>
				<td><?=$value['ProductID']?></td>
				<td><?=$value['BetType']?></td>
				<td><?=$value['BetAmount']?></td>
			</tr>
			<?php endforeach; ?>
			<?php if(!$count): ?>
				<tr><td class="t-center" colspan="5">No data found</td></tr>
			<?php endif; ?>
		</tbody>
		<tfoot>
			<tr class="bgGray">
				<th scope="row">#</th>
				<th colspan="3" class="t-right">Total Amount:</th>
				<th><?=$sumAmount?></th>
			</tr>
		</tfoot>
	</table>
</div>
<?php endif; ?>