<?php $__env->startSection('title', 'Feed'); ?>
<?php $__env->startSection('home'); ?>
<style>
	.custom-file.gray-upload .custom-file-input:lang(en)~.custom-file-label::after
	{
		content: "Browse Image / Video";
	}
</style>

<div class="col-md-9 right-content">
  	<div class="box multi_step_form">
      	<form>
          	<div class="clearfix row">
              	<div class="col-md-12 ">
					<div class="profile-feeds ">
						<div class="feeds-outer" id="myElement">
							<ul class="profile-feed-inner">
								<?php $__currentLoopData = $feed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feed_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php
									$since_start = new DateTime($feed_details->created_at);
									$start_date = $since_start->diff(new DateTime(now()));
									$notification_time = "";
									if($start_date->s!='0')
									{
										$notification_time = $start_date->s.' seconds ago';
									}
									if($start_date->i!='0')
									{
										$notification_time = $start_date->i.' minutes ago';
									}
									if($start_date->h!='0')
									{
										$notification_time = $start_date->h.' hours ago';
									}
									if($start_date->d!='0')
									{
										$notification_time = $start_date->d.' days ago';
									}
									if($start_date->m!='0')
									{
										$notification_time = $start_date->m.' months ago';
									}
									if($start_date->y!='0')
									{
										$notification_time = $start_date->y.' years ago';
									}
								?>
								<li class="media-feed" id="<?php echo e($feed_details->id); ?>">
									<div class="row justify-content-center">
										<div class="col-lg-8 col-md-10">
											<div class="feed-content">
												<div class="feed-author" style="float: right;">
												</div>
												<div class="feed-author">
													<div class="author-img">
                            <?php
                               $profile_image = NULL;
                                $profile_image_arr = DB::table('profile_images')->where('status','5')->where('escortId',$feed_details->escortId)->get();
                                if(count($profile_image_arr) > 0)
                                {
                                    $profile_image = $profile_image_arr[0]->image;
                                }
                               ?>
                                <?php if($profile_image==NULL): ?>
                                    <img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="img-fluid" style="height: 56px;width: 56px;"> 
                                <?php else: ?>  
                                    <img src="<?php echo e(asset('public/uploads/'.$profile_image)); ?>" class="img-fluid" style="height: 56px;width: 56px;"/><?php endif; ?>
													</div>
													
													<div class="author-detail">
														<h5><?php echo e($feed_details->title); ?></h5>
														<p><?php echo e($notification_time); ?></p>
													</div>
												</div>
											</div>
											<div class="media-feed-area">
												
												<?php if($feed_details->image==NULL): ?>
												<?php else: ?> 
													<?php
														$ext = pathinfo( asset('public/uploads/'.$feed_details->image), PATHINFO_EXTENSION);
													?>
													<?php if($ext == 'mp4' || $ext == 'webm'): ?>
														<video width="500" height="350" controls>
															<source src="<?php echo e(asset('public/uploads/'.$feed_details->image)); ?>" type="video/mp4">
														</video>
													<?php else: ?>
														<img src="<?php echo e(asset('public/uploads/'.$feed_details->image)); ?>" class="w-100" style="height: auto !important;width: 100% !important;margin-bottom: 2%;">
														
													<?php endif; ?>
												<?php endif; ?>
											</div>
										</div>
										<div class="col-lg-8 col-md-10">
											<div class="feed-content">
												<div class="feed-text">
													<p><?php echo $feed_details->description; ?></p>
												</div>
												<div class="feed-action">
													<ul>
														<li>
															<div class="clearfix">
																<div class="left">
																	<p><span id="likecount<?php echo e($feed_details->id); ?>"><?php echo isset($like_data[$feed_details->id]) ? count($like_data[$feed_details->id]) : '0'; ?></span> Likes</p>
																</div>
															</div>
														</li>
														<li>

															<div style="width: auto;" class="right">
																<p><span id="commentcount<?php echo e($feed_details->id); ?>"><?php echo isset($comment_data[$feed_details->id]) ? count($comment_data[$feed_details->id]) : '0'; ?></span> Comment</p>
															</div>
														</li>
													</ul>
													<ul>
														<li>
															<div class="clearfix">
																<div class="left">
																	<a id="like<?php echo e($feed_details->id); ?>" class="feed-content-action like-action" onclick="likeUnlike(<?php echo e($feed_details->id); ?>)"> 
																	<?php
																		if(isset($like_data[$feed_details->id]) && in_array(Auth::user()->id,$like_data[$feed_details->id]))
																		{
																			echo "Liked!";
																		}
																		else {
																			echo "Like";
																		}
																	?>
																	</a>
																</div>
															</div>
														</li>
														<li>
															<div style="width: auto;" class="right">
																<a  onclick="doComment(<?php echo e($feed_details->id); ?>)" class="feed-content-action comment-action">Comment</a>
															</div>
														</li>
													</ul>
													<form>
														<div class="form-group">
															<div class="comment-feed-img">
																<!-- <img src="http://design.hire-webdeveloper.com/honey/escort-admin/images/feed-comment.jpg" class="img-fluid">  -->
																		<?php
																			$user_profile_image = Auth::user()->photo;
																		?>
																    <?php if($user_profile_image==NULL): ?>
																				<img src="<?php echo e(asset('public/blankphoto.png')); ?>" class="img-fluid" style="height: 45px;width: 45px;"> 
																		<?php else: ?>  
																				<img src="<?php echo e(asset('public/uploads/'.$user_profile_image)); ?>" class="img-fluid" style="height: 45px;width: 45px;"/>
																		<?php endif; ?>
															</div>
															<div class="comment-box">
																<input type="text" id="comment<?php echo e($feed_details->id); ?>" data-id="<?php echo e($feed_details->id); ?>" class="form-control comment-box" placeholder="Write a Comment">
															</div>
															<div class="do-comment">
                                                                    <a onclick="doComment( <?php echo e($feed_details->id); ?> )" class="red-small do-comment">&#10003;</a>
                                                                </div>
														</div>

															
														<div id="<?php echo e($feed_details->id); ?>">
															<?php
														if(isset($comment_text[$feed_details->id]) && count($comment_text[$feed_details->id]) > 0)
														foreach ($comment_text[$feed_details->id] as $key => $comment) 
														{
														?>
															<div class="form-group comment-row">
																<div class="comment-feed-img">
																	<?php if($comment_photo[$feed_details->id][$key]==NULL): ?><img src="<?php echo e(asset('public/blankphoto.png')); ?>" style="height: 45px;width: 45px;" class="img-fluid"><?php else: ?> <img src="<?php echo e(asset('public/uploads/'.$comment_photo[$feed_details->id][$key])); ?>" style="height: 45px;width: 45px;" class="img-fluid"><?php endif; ?>
																</div>
																<div class="comment-box" style="color: white;min-width: 9%;border-radius: 10px;float: left;height: auto;padding-left: 15px;">
																	<b style="color: gray;"><?php echo e($comment_name[$feed_details->id][$key]); ?></b></br>
																	<?php echo e($comment); ?>

																</div>
																<div class="delete-comment">
																	<?php if(isset($comment_data[$feed_details->id]) && Auth::user()->id==$comment_data[$feed_details->id][$key]): ?>
																		<a href="<?php echo e(route('delete-comment',$comment_id[$feed_details->id][$key])); ?>" class="red-small">&times;</a>
																	<?php endif; ?>
																</div>
															</div>
														<?php
														}
														else
														{
															?>

																<div class="form-group comment-row">
                                                                    </div>
															<?php
														}
													?>
														</div>
												</div>
											</div>
										</div>
									</div>
								</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					</div>
				</div>
			</div>

  </form>
                          </div>
                          </div>
<script>
	$(document).ready(function () {
		$("#page_header_heading").html('Feed');
	});

	function likeUnlike(feedId) 
	{
		like_status = $("#like"+feedId).html();
		like_status = like_status.trim();
		if(like_status == 'Like')
		{
			$("#like"+feedId).html('Liked!');
			var old_likes = $("#likecount"+feedId).html();
			new_likes = parseInt(old_likes) + parseInt(1);
			$("#likecount"+feedId).html(new_likes);
		}
		else
		{
			$("#like"+feedId).html('Like');
			var old_likes = $("#likecount"+feedId).html();
			new_likes = parseInt(old_likes) - parseInt(1);
			$("#likecount"+feedId).html(new_likes);
		}
		$.ajax({
			type: "post",
			url: "<?php echo e(route('escort.like-unlike')); ?>",
			data: {feedId:feedId,"_token": "<?php echo e(csrf_token()); ?>"},
			dataType: "json",
			success: function (response) {
				console.log(response);
			}
		});
	}

	function doComment(feedId) 
	{
		comment = $("#comment"+feedId).val();
		if(comment != '')
		{
			$.ajax({
				type: "post",
				url: "<?php echo e(route('escort.do-comment')); ?>",
				data: {feedId:feedId,comment:comment,"_token": "<?php echo e(csrf_token()); ?>"},
				dataType: "json",
				success: function (response) {
					$("#"+feedId+" .comment-row:last").after('<div class="form-group"><div class="comment-feed-img"><img src="'+response.image+'" style="height: 45px;width: 45px;" class="img-fluid"></div><div class="comment-box" style="color: white;min-width: 9%;border-radius: 10px;float: left;height: auto;padding-left: 15px;"><b style="color: gray;"><?php echo e(Auth::user()->name); ?></b><br>'+response.comment+'</div></div>')
					$("#comment"+feedId).val('');
					var old_comments = $("#commentcount"+feedId).html();
					new_comments = parseInt(old_comments) + parseInt(1);
					$("#commentcount"+feedId).html(new_comments);
				}
			});
		}
	}
	$(".comment-box").keyup(function (e) 
	{ 
		var code = (e.keyCode ? e.keyCode : e.which);
		if(code == 13) { //Enter keycode
			doComment($(this).attr('data-id'));
		}
	});
	
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('client.master.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/honeydevealakmal/public_html/resources/views/client/feed.blade.php ENDPATH**/ ?>