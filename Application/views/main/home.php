<div class="wrapper_list_slider_collection">
	<div class="navigation_collection_slider">
		<div class="headline_info_slider_navigation">
			<h2>Новинки</h2>
		</div>
		<div class="arrows_navigation_collection_slider">
			<div class="arrow_navigation_slider_collection arrow_navigation_slider_collection_left">
				<i class="fas fa-angle-left"></i>
			</div>
			<div class="arrow_navigation_slider_collection arrow_navigation_slider_collection_right">
				<i class="fas fa-angle-right"></i>
			</div>
		</div>
	</div>
	<div class="list_collection_slider">
		<?php for ($i = 0; $i < 12; $i++):?>
			<div class="collection_slider" data-id="<?=htmlspecialchars($vars['upcoming'][$i]->kinopoisk_id);  ?>">
				<a class="link_collection_slider" href="/watch/<?=htmlspecialchars($vars['upcoming'][$i]->kinopoisk_id); ?>" >
				<div class="poster_collection_slider">
					<img data-src="<?=htmlspecialchars($vars['upcoming'][$i]->info->poster);?>" src="" alt=<?=htmlspecialchars($vars['upcoming'][$i]->info->rus);?> >
				</div>
				<p class="headline_collection_slider"><?=htmlspecialchars($vars['upcoming'][$i]->info->rus);  ?></p>
				<div class="about_collection_slider">
					<div class="rait_collection_slider">
						<p class="text_mont">Рейтинг IMDB <span><?=htmlspecialchars($vars['upcoming'][$i]->info->rating->rating_imdb);?></span></p>
					</div>
					<div class="average_collection_slider">
						<p><span>4K</span></p>
					</div>
					<p class="date_collection_slider text_mont"><?=htmlspecialchars($vars['upcoming'][$i]->info->year); ?></p>
				</div>
			</a>
		</div>
	<?php endfor; ?>
	</div>
</div>

<div class="wrapper_list_slider_collection">
	<div class="navigation_collection_slider">
		<div class="headline_info_slider_navigation">
			<h2>Фильмы</h2>
		</div>
		<div class="arrows_navigation_collection_slider">
			<div class="arrow_navigation_slider_collection arrow_navigation_slider_collection_left">
				<i class="fas fa-angle-left"></i>
			</div>
			<div class="arrow_navigation_slider_collection arrow_navigation_slider_collection_right">
				<i class="fas fa-angle-right"></i>
			</div>
		</div>
	</div>
	<div class="list_collection_slider">
		<?php for ($i = 0; $i < 12; $i++):?>
			<div class="collection_slider" data-id="<?=htmlspecialchars($vars['movies'][$i]->kinopoisk_id);  ?>">
				<a class="link_collection_slider" href="/watch/<?=htmlspecialchars($vars['movies'][$i]->kinopoisk_id); ?>" >
				<div class="poster_collection_slider">
					<img data-src="<?=htmlspecialchars($vars['movies'][$i]->info->poster);?>" src="" alt=<?=htmlspecialchars($vars['movies'][$i]->info->rus);?> >
				</div>
				<p class="headline_collection_slider"><?=htmlspecialchars($vars['movies'][$i]->info->rus);  ?></p>
				<div class="about_collection_slider">
					<div class="rait_collection_slider">
						<p class="text_mont">Рейтинг IMDB <span><?=htmlspecialchars($vars['movies'][$i]->info->rating->rating_imdb);?></span></p>
					</div>
					<div class="average_collection_slider">
						<p><span><?=htmlspecialchars($vars['movies'][$i]->info->quality);?></span></p>
					</div>
					<p class="date_collection_slider text_mont"><?=htmlspecialchars($vars['movies'][$i]->info->year); ?></p>
				</div>
			</a>
		</div>
	<?php endfor; ?>
	</div>
</div>

<div class="wrapper_list_slider_collection">
	<div class="navigation_collection_slider">
		<div class="headline_info_slider_navigation">
			<h2>Сериалы</h2>
		</div>
		<div class="arrows_navigation_collection_slider">
			<div class="arrow_navigation_slider_collection arrow_navigation_slider_collection_left">
				<i class="fas fa-angle-left"></i>
			</div>
			<div class="arrow_navigation_slider_collection arrow_navigation_slider_collection_right">
				<i class="fas fa-angle-right"></i>
			</div>
		</div>
	</div>
	<div class="list_collection_slider">
		<?php for ($i = 0; $i < 12; $i++):?>
			<div class="collection_slider" data-id="<?=htmlspecialchars($vars['serials'][$i]->kinopoisk_id);  ?>">
				<a class="link_collection_slider" href="/watch/<?=htmlspecialchars($vars['serials'][$i]->kinopoisk_id); ?>" >
				<div class="poster_collection_slider">
					<img data-src="<?=htmlspecialchars($vars['serials'][$i]->info->poster);?>" src="" alt=<?=htmlspecialchars($vars['serials'][$i]->info->rus);?> >
				</div>
				<p class="headline_collection_slider"><?=htmlspecialchars($vars['serials'][$i]->info->rus);  ?></p>
				<div class="about_collection_slider">
					<div class="rait_collection_slider">
						<p class="text_mont">Рейтинг IMDB <span><?=htmlspecialchars($vars['serials'][$i]->info->rating->rating_imdb);?></span></p>
					</div>
					<div class="average_collection_slider">
						<p><span><?=htmlspecialchars($vars['serials'][$i]->info->quality);?></span></p>
					</div>
					<p class="date_collection_slider text_mont"><?=htmlspecialchars($vars['serials'][$i]->info->year); ?></p>
				</div>
			</a>
		</div>
	<?php endfor; ?>
	</div>
</div>
