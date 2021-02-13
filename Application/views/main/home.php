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
			<div class="collection_slider" data-id="<?=$upcoming[$i]['kinopoisk_id'];  ?>">
				<a class="link_collection_slider" href="/watch/<?=$upcoming[$i]['kinopoisk_id']; ?>" >
				<div class="poster_collection_slider">
					<img data-src="<?=$upcoming[$i]['info']['poster'];?>" src="" alt=<?=$upcoming[$i]['info']['rus'];?> >
				</div>
				<p class="headline_collection_slider"><?=$upcoming[$i]['info']['rus'];  ?></p>
				<div class="about_collection_slider">
					<div class="rait_collection_slider">
						<p class="text_mont">Рейтинг IMDB <span><?=$upcoming[$i]['info']['rating']['rating_imdb'];?></span></p>
					</div>
					<div class="average_collection_slider">
						<p><span>4K</span></p>
					</div>
					<p class="date_collection_slider text_mont"><?=$upcoming[$i]['info']['year']; ?></p>
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
			<div class="collection_slider" data-id="<?=$serials[$i]['kinopoisk_id'];  ?>">
				<a class="link_collection_slider" href="/watch/<?=$serials[$i]['kinopoisk_id']; ?>" >
				<div class="poster_collection_slider">
					<img data-src="<?=$serials[$i]['info']['poster'];?>" src="" alt=<?=$serials[$i]['info']['rus'];?> >
				</div>
				<p class="headline_collection_slider"><?=$serials[$i]['info']['rus'];  ?></p>
				<div class="about_collection_slider">
					<div class="rait_collection_slider">
						<p class="text_mont">Рейтинг IMDB <span><?=$serials[$i]['info']['rating']['rating_imdb'];?></span></p>
					</div>
					<div class="average_collection_slider">
						<p><span><?=$serials[$i]['info']['quality'];?></span></p>
					</div>
					<p class="date_collection_slider text_mont"><?=$serials[$i]['info']['year']; ?></p>
				</div>
			</a>
		</div>
	<?php endfor; ?>
	</div>
</div>

<div class="wrapper_list_slider_collection">
	<div class="navigation_collection_slider">
		<div class="headline_info_slider_navigation">
			<h2>Аниме</h2>
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
			<div class="collection_slider" data-id="<?=$anime[$i]['kinopoisk_id'];  ?>">
				<a class="link_collection_slider" href="/watch/<?=$anime[$i]['kinopoisk_id']; ?>" >
				<div class="poster_collection_slider">
					<img data-src="<?=$anime[$i]['info']['poster'];?>" src="" alt=<?=$anime[$i]['info']['rus'];?> >
				</div>
				<p class="headline_collection_slider"><?=$anime[$i]['info']['rus'];  ?></p>
				<div class="about_collection_slider">
					<div class="rait_collection_slider">
						<p class="text_mont">Рейтинг IMDB <span><?=$anime[$i]['info']['rating']['rating_imdb'];?></span></p>
					</div>
					<div class="average_collection_slider">
						<p><span><?=$anime[$i]['info']['quality'];?></span></p>
					</div>
					<p class="date_collection_slider text_mont"><?=$anime[$i]['info']['year']; ?></p>
				</div>
			</a>
		</div>
	<?php endfor; ?>
	</div>
</div>
