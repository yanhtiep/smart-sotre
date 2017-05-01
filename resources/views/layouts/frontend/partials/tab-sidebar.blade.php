<div class="tab-wrapper">
    <div class="wrapper">
    	<div class="tab-content">
    		
    	</div>
    	<div class="tab-button">
    		<ul>
    			<li>
    				<i class="fa fa-music" aria-hidden="true"></i>
    			</li>
    			<li>
    				<i class="fa fa-send" aria-hidden="true"></i>
    			</li>
    			<li>
    				<i class="fa fa-bullhorn" aria-hidden="true"></i>
    			</li>
    		</ul>
    	</div>
    </div>
</div>
<script type="text/javascript">
	$('.tab-button ul li').click(function(){
		if(!$('.tab-wrapper').hasClass('reset-left')){
			$('.tab-wrapper').addClass('reset-left');
		}else{
			$('.tab-wrapper').removeClass('reset-left');
		}
	});
</script>