<?php if (!empty($vars['results'])) {
 ?>
<div class="list_collection">
	<?php foreach ($vars['results'] as $key => $value ) {?>

		<div class="collection" data-id="<?=$value['id'];  ?>">
			<a class="link_collection" href="/watch/<?=$value['media_type']."?q=".$value['id']; ?>" >
			<div class="poster_collection">
				<img src="https://image.tmdb.org/t/p/w500/<?=$value['poster_path'];  ?>" alt="poster_collection">
				<div class="info_collection_on_poster">
					<div class="rait_collection">
						<p class="text_mont">Рейтинг IMDB <span><?=$value['vote_average'];  ?></span></p>
					</div>
					<div class="average_collection">
						<p><span>HD</span></p>
					</div>
				</div>
			</div>
			<div class="about_collection">
				<p class="headline_collection"><?=$value['title'];  ?></p>
				<p class="date_collection text_mont"><?=mb_strimwidth($value['date'],0,4) ?></p>
			</div>
		</a>
	</div>
<?php } ?>
</div>
<?php } ?>