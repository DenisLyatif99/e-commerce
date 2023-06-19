<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>Абонати</h1>
	</div>
	<div class="content-header-right">
		<a href="subscriber-remove.php" class="btn btn-primary btn-sm">Премахване на чакащи абонати</a>
		<a href="subscriber-csv.php" class="btn btn-primary btn-sm">Експортиране като CSV</a>
	</div>
</section>


<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-hover table-striped">
			<thead>
			    <tr>
			        <th>#</th>
			        <th>Имейл на абоната</th>
			        <th>Действие</th>
			    </tr>
			</thead>
            <tbody>
            	<?php
            	$i=0;
            	$statement = $pdo->prepare("SELECT * FROM tbl_subscriber WHERE subs_active=1");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
            	foreach ($result as $row) {
            		$i++;
            		?>
					<tr>
	                    <td><?php echo $i; ?></td>
	                    <td><?php echo $row['subs_email']; ?></td>
	                    <td><a href="#" class="btn btn-danger btn-xs" data-href="subscriber-delete.php?id=<?php echo $row['subs_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Изтрий</a></td>
	                </tr>
            		<?php
            	}
            	?>
            </tbody>
          </table>
        </div>
      </div>
  

</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Потвърждение за изтриване</h4>
            </div>
            <div class="modal-body">
                Сигурни ли сте че искате да изтриете този обект?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Отказ</button>
                <a class="btn btn-danger btn-ok">Изтрий</a>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>