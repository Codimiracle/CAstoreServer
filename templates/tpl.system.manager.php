<?php
deline_show_html_head();
deline_show_header();

$headers = $parameters["headers"];
$fields = $parameters["fields"];
$list = $parameters["list"];
$options = $parameters["options"];
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-3">
			<?php deline_show_template($options)?>
		</div>
		<div class="col-md-9">
			<table class="table">
				<thead>
				<tr>
				<?php foreach ($headers as $header) { ?>
				<th><?= $header ?></th>
				<?php } ?>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($list as $item) { ?>
				<tr>
					<?php for ($i = 0; $i < count($fields); $i++) { ?>
					<td><?= $item[$fields[$i]] ?></td>
					<?php }?>
				</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php
deline_show_footer();
deline_show_html_foot();