<?php if (!empty($vars['results'])) {?>
<div class="list_collection">
	<?php foreach ($vars['results'] as $key => $value ) {?>

		<div class="collection" data-id="<?=htmlspecialchars($value['id']);  ?>">
			<a class="link_collection" href="/watch/movie?q=<?=htmlspecialchars($value['id']); ?>" >
			<div class="poster_collection">
				<img src="https://image.tmdb.org/t/p/w500/<?=htmlspecialchars($value['poster_path']);  ?>" alt="poster_collection">
				<div class="info_collection_on_poster">
					<div class="rait_collection">
						<p class="text_mont">Рейтинг IMDB <span><?=htmlspecialchars($value['vote_average']);  ?></span></p>
					</div>
					<div class="average_collection">
						<p><span>HD</span></p>
					</div>
				</div>
			</div>
			<div class="about_collection">
				<p class="headline_collection"><?=htmlspecialchars($value['title']);  ?></p>
				<p class="date_collection text_mont"><?=htmlspecialchars(mb_strimwidth($value['date'],0,4)); ?></p>
			</div>
		</a>
	</div>
<?php } ?>
</div>
<?php } ?>
