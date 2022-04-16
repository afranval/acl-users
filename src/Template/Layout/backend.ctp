<!DOCTYPE html>
<html>
<?=$this->element('Backend/head')?>
<body class="">
	<?php if($this->checkLogged()): ?>
		<?=$this->element('Backend/navbar')?>		   
    <?php endif; ?>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<?= $this->Flash->render() ?>			
					<?= $this->fetch('content') ?>
				</div>
			</div>						
		</div>
	</section>
</body>
<?=$this->element('Backend/scripts')?>
</html>	