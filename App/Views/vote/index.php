<html>
    <head>
        <title>Home</title>
        <?php include __DIR__ . "/include/head.php"; ?>

		<?php include __DIR__ . "/include/js.php"; ?>
    </head>
    <body oncontextmenu="return false">
	  <div class="KMTETI-top-blue"></div>
	  <div class="KMTETI-top-blue-light"></div>
	  <div class="KMTETI-top-green"></div>
	  <div class="navbar navbar-default navbar-pemilu" role="navigation">
	    <div class="container">
	      <div class="navbar-header">
	        <div class="navbar-text navbar-left">
	          <a href=""><b class="color-white"><?php echo $config->votingName; ?></b></a>
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="page-calon-all">
	      <div class="tab-content">
	        <div class="tab-pane active fade in">
	          <section class="section-calon-overview bg-pemilu" style="background-image: url(<?php echo $config->bgVote; ?>);">
	            <div class="container">
	            	<div class="row row-calon horizontal-center-row">
	            		<div class="col-md-12 horizontal-center-col">
	            			<div class="text-center color-white">
	            				<h1 class="calon-text-header"><?php echo $config->votingName; ?></h1>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="row row-calon horizontal-center-row">
	            		<div class="col-md-12 horizontal-center-col">
	            			<div class="text-center color-white">
	            				<h1>Klik untuk melihat visi dan misi calon</h1>
	            			</div>
	            		</div>
	            	</div>
	            	<div class="row row-calon horizontal-center-row">

						<?php $i = 0; ?>
						<?php foreach ($candidates as $candidate) { ?>
						<?php $i++; ?>
		              <div class="col-md-2 calon-col horizontal-center-col text-center center-block">
			                <a href="#tab<?php echo $i; ?>" data-toggle="tab"><img class="calon-img img-circle center-block" src="<?php echo $candidate->photo; ?>"></a>

			                <a href="#tab<?php echo $i; ?>" class="text-center" data-toggle="tab"><span class="text-center"><b class="calon-text text-center center-block"><?php echo $candidate->name; ?></b></span></a>
		              </div>
						<?php } ?>
		            </div>
	            </div>
	          </section>
	        </div>
			  <?php for ($i = 0; $i < count($candidates); $i++) { ?>
	        <div class="tab-pane fade in" id="tab<?php echo ($i + 1); ?>">
	          <section class="section-calon-overview bg-pemilu" style="background-image: url(<?php echo $config->bgVote; ?>);">
	            <div class="container">
	            	<div class="row row-calon horizontal-center-row">
	            		<div class="col-md-12 horizontal-center-col">
	            			<img class="calon-img img-circle center-block" src="<?php echo $candidates[$i]->photo ?>">
	            			<div class="col-md-12 horizontal-center-col">
	            			<div class="text-center color-white">
	            				<h1><?php echo $candidates[$i]->name; ?></h1>
	            				<a data-toggle="modal" data-target="#voteNow<?php echo ($i + 1); ?>" class="btn btn-vote-before"><b>Vote</b></a>
	            			</div>
	            		</div>
	            		</div>
	            	</div>
	            	<div class="row row-calon">
	            		<div class="col-md-6 col-md-offset-1">
	            			<span class="color-white">
	            				<h3>Visi</h3>
	            				<p><?php echo $candidates[$i]->vision; ?></p>
	            			</span>
	            		</div>
	            		<div class="col-md-4">
	            			<span class="color-white">
	            				<h3>Misi</h3>
	            				<div>
				                    <?php echo $candidates[$i]->mission; ?>
				                  </div>
	            			</span>
	            		</div>
	            	</div>
	            </div>
	          </section>
	        </div>
			<?php } ?>
	      </div>
	     </div>



	  <?php for ($i = 0; $i < count($candidates); $i++) { ?>
		  <div class="modal fade" id="voteNow<?php echo ($i + 1) ?>" tabindex="-1" role="dialog" aria-labelledby="voteNowLabel" aria-hidden="true">
			  <div class="container">
				  <div class="modal-dialog modal-dialog-pemilu">
					  <div class="modal-content">
						  <div class="modal-header modal-header-pemilu">
							  <button type="button" class="close color-white" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							  <h4 class="modal-title color-white" id="voteNowLabel">Konfirmasi</h4>
						  </div>
						  <div class="modal-body color-dark-grey">
							  Apakah Anda yakin memilih <b><?php echo $candidates[$i]->name; ?></b>?
						  </div>
						  <div class="modal-footer modal-footer-pemilu center-block">
							  <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
							  <form action="/vote" method="post">
								  <input type="hidden" name="candidateId" value="<?php echo $candidates[$i]->id; ?>">
							  	<input type="submit" class="btn btn-vote" value="Saya Yakin!">
							  </form>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
	  <?php } ?>

	<div class="modal fade" id="voteSuccess" tabindex="-1" role="dialog" aria-labelledby="voteSuccessLabel" aria-hidden="true" onclick="redirectLoginInstant()">
	  <div class="modal-dialog modal-dialog-pemilu">
	    <div class="modal-content">
	      <div class="modal-header modal-header-pemilu">
	        <button type="button" class="close color-white" data-dismiss="modal" onclick="redirectLoginInstant()"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title color-white" id="voteSuccessLabel">Vote Success</h4>
	      </div>
	      <div class="modal-body color-dark-grey">
	        Terimakasih telah berpartisipasi dalam <?php echo $config->votingName; ?>.
	      </div>
	    </div>
	  </div>
	</div>
</html>