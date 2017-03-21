<?php
/**
* Supply a user id and an access token
* Jelled explains how to obtain a user id and access token in the link provided
* @link http://jelled.com/instagram/access-token
*/
$userid = "285901981";
$accessToken = "285901981.1677ed0.6b6fec8afb964e5ca3305791c32ce255";
// Get our data
function fetchData($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}
// Pull and parse data.
$result = fetchData("https://api.instagram.com/v1/users/{$userid}/media/recent/?access_token={$accessToken}");
$result = json_decode($result);
?>

<?php $limit = 8; // Amount of images to show ?>
<?php $i = 0; ?>

<?php foreach ($result->data as $post): ?>
	<?php if ($i < $limit ): ?>
		<?php if($i < 4): ?>
		<div class="entry active" data-index="<?=$i+1;?>">
		<?php else: ?>
		<div class="entry" data-index="<?=$i+1;?>">
		<?php endif; ?>
			<div class="inner-wrap">
				<div class="bg cover top" style="background-image: url(<?=$post->images->standard_resolution->url; ?>);"></div>
				<div class="content">
					<div class="content-wrap">
						<?php if(strlen($post->caption->text) > 125): ?>
							<p><?=substr($post->caption->text, 0, 122);?>...</p>
						<?php else: ?>
							<p><?=$post->caption->text;?></p>
						<?php endif; ?>
						<div class="bottom-wrap">
							<hr>
							<div class="bottom flex center">
								<div class="date"><?=date('M j, Y',$post->created_time);?></div>
								<div class="like-comment">
									<p class="likes"><i class="fa fa-heart" aria-hidden="true"></i> <?=$post->likes->count;?></p>
									<p class="comments"><i class="fa fa-comment" aria-hidden="true"></i> <?=$post->comments->count;?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $i ++; ?>
	<?php endif; ?>
<?php endforeach; ?>