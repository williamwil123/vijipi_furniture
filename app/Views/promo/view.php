<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1>View Promo</h1>
<div class="container">
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<img class="img-fluid" alt="image" src="<?= base_url('uploads/'.$promo->gambar) ?>" />
				</div>
			</div>
		</div>
		<div class="col-6">
			<h1 class="text-success"><?= $promo->nama ?></h1>
			<h4>Harga : <?= $promo->harga ?></h4>
            <h4>Harga Promo : <?= $promo->harga_promo ?></h4>
			<h4>Stok : <?= $promo->stok ?></h4>
		</div>
	</div>
</div>
<?= $this->endSection() ?>