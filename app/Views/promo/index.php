<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1>Promo</h1>
<table class="table">
	<thead>
		<th>No</th>
		<th>Barang</th>
		<th>Gambar</th>
		<th>Harga</th>
        <th>Harga Promo</th>
		<th>Stok</th>
		<th>Aksi</th>
	</thead>
	<tbody>
		<?php foreach($promos as $index=>$promo): ?>
			<tr>
				<td><?= ($index+1) ?></td>
				<td><?= $promo->nama ?></td>
				<td>
					<img class="img-fluid" width="200px" alt="gambar" src="<?= base_url('uploads/'.$promo->gambar) ?>" />
				</td>
				<td><?= $promo->harga ?></td>
                <td><?= $promo->harga_promo ?></td>
				<td><?= $promo->stok ?></td>
				<td>
					<a href="<?= site_url('promo/view/'.$promo->id) ?>" class="btn btn-primary">View</a>
					<a href="<?= site_url('promo/update/'.$promo->id) ?>" class="btn btn-success">Update</a>
					<a href="<?= site_url('promo/delete/'.$promo->id) ?>" class="btn btn-danger">Delete</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<?= $this->endSection() ?>