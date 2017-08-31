<?php $__env->startSection('content'); ?>
<!--
<?php if(Session::has('message')): ?>
    <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
<?php endif; ?>
-->

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <div id="container">
      <h2>Uber-Shortener</h2>
		<?php echo Form::open(array('url'=>'/','method'=>'post')); ?>

		<?php echo Form::text('link',Request::old('link'),array('placeholder'=>'Insert your URL here and press enter!')); ?>

		<?php echo Form::close(); ?>

		<br>
		
		  <table style="margin:50px 0 0 0;" class="table table-bordered">
    <thead>
      <tr>
		  
		  <td>URL</td>
		  <td>IP ADDRESS</td>
		  <td>CITY</td>
		  <td>STATE</td>
		  <td>COUNTRY CODE</td>
		  <td>COUNTRY</td>
		  <td>CURRENCY CODE</td>
		  <td>CURRENCY SYMBOL</td>
		  <td>LATITUDE</td>
		  <td>LONGITUDE</td>
		  <td>UBER</td>
      </tr>
    </thead>
			  
    <tbody>
		 <?php $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  <?php
		$url = $value->url;
		$host = parse_url($url, PHP_URL_HOST);
		$ip = gethostbyname($host);
		$data = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
	  
	  ?>
		<tr>
		
			<td><a href="<?php echo e($value->url); ?>"><?php echo e($value->url); ?></a><br>
			
			<form action="<?php echo e(@url('home').'/'.$value->id); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('DELETE')); ?>

                <button class="btn btn-danger">Detete</button>
            </form>
			</td>
			<td><?= $data['geoplugin_request'] ?></td>
			<td><?= $data['geoplugin_city'] ?></td>
			<td><?= $data['geoplugin_region'] ?></td>
			<td><?= $data['geoplugin_countryCode'] ?></td>
			<td><?= $data['geoplugin_countryName'] ?></td>
			<td><?= $data['geoplugin_currencyCode'] ?></td>
			<td><?= $data['geoplugin_currencySymbol'] ?></td>
			<td><?= $data['geoplugin_latitude'] ?></td>
			<td><?= $data['geoplugin_longitude'] ?></td>
        	<td><?php echo e($value->hash); ?></td>
		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>

		<ul class="pagination pagination-lg">
<li><?php echo e($urls->links()); ?></li>
		</ul>
		 <div>
		<?php if(Session::has('link')): ?>
			<h3 class="success"><br>
			<?php echo e(Html::link(Session::get('link'),'Click here for your shortened URL')); ?></h3>
		<?php endif; ?>
		
     	<?php if(Session::has('errors')): ?>
			<h3 class="error"><br><?php echo e($errors->first('link')); ?></h3>
		<?php endif; ?>	
			
				</div>
		</div>
                </div>

<?php if(session('status')): ?>
        <div class="alert alert-success">
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>