<?php if (!empty($vars['info'])):?>
<div class="list_collection">
	<?php foreach ($vars['info'] as $key):?>
    <div class="collection" data-id="<?=htmlspecialchars($key->kinopoisk_id);  ?>">
			<a class="link_collection" href="/watch/<?=htmlspecialchars($key->kinopoisk_id); ?>" >
			<div class="poster_collection">
				<img data-src="<?=htmlspecialchars($key->info->poster);?>" src="" alt=<?=htmlspecialchars($key->info->rus);?> >
				<div class="info_collection_on_poster">
					<div class="rait_collection">
						<p class="text_mont">Рейтинг IMDB <span><?=htmlspecialchars($key->info->rating->rating_imdb);  ?></span></p>
					</div>
					<div class="average_collection">
						<p><span><?=htmlspecialchars($key->quality);  ?></span></p>
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
<?php else: ?>
<p class="search_not_found">По вашему запросу ничего не найдено</p>
<?php endif;?>
