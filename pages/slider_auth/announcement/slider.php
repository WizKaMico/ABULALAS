<div id="myCarousel" class="carousel slide container-fluid" data-ride="carousel">
		<ol class="carousel-indicators">
			<?php
				require 'conn.php';
				
				$query = mysqli_query($conn, "SELECT * FROM `announcement` ORDER BY `aid` ASC") or die(mysqli_error());
				$count = mysqli_num_rows($query);
				if($count > 0){
					for($i=0; $i < $count; $i++){
			?>
						<li data-target="#myCarousel" data-slide-to="<?php echo $i?>" <?php if($i===0){echo "class='active'";}?>></li>
			<?php
					}
			?>
		</ol>
		<div style = "margin:auto;" class="carousel-inner" role="listbox">
			<?php
					$x = 0;
					while($fetch = mysqli_fetch_array($query)){
			?>
					<div class="item <?php if($x === 0){echo "active";}?>">
						<img src="../../../<?php echo $fetch['image_path']?>" style = "width:100%; height:400px;" />
						<h1 style="text-align:center;"><?php echo $fetch['title']?></h1>
						<h5 style="text-align:center;"><?php echo $fetch['body']?></h5>
					</div>
			<?php
					$x++;
					}
			?>
			
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>	
</div>
<br />

	<?php } ?>