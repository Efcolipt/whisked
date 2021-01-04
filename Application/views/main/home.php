<div class="list_collection">
	<?php foreach ($vars['upcoming'] as $key):?>
		<div class="collection" data-id="<?=htmlspecialchars($key->kinopoisk_id);  ?>">
			<a class="link_collection" href="/watch/<?=htmlspecialchars($key->kinopoisk_id); ?>" >
			<div class="poster_collection">
				<img data-src="<?=htmlspecialchars($key->info->poster);?>" src="" alt=<?=htmlspecialchars($key->info->rus);?> >
				<div class="info_collection_on_poster">
					<div class="rait_collection">
						<p class="text_mont">Рейтинг IMDB <span><?=htmlspecialchars($key->info->rating->rating_imdb);  ?></span></p>
					</div>
					<div class="average_collection">
						<p><span>4K</span></p>
					</div>
				</div>
			</div>
			<div class="about_collection">
				<p class="headline_collection"><?=htmlspecialchars($key->info->rus);  ?></p>
				<p class="date_collection text_mont"><?=htmlspecialchars($key->info->year); ?></p>
			</div>
		</a>
	</div>
<?php endforeach; ?>
</div>
