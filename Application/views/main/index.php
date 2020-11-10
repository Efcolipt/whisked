<?php $upcomingMovies = $vars["upcomingMovies"]->results;$topMovies = $vars["topMovies"]->results;?>
<div class="list_collection">
<?php for($i=0;$i < count($topMovies); $i++): ?>
	<div class="collection" data-id="<?=$topMovies[$i]->id; ?>">
		<a href="/watch/<?=$topMovies[$i]->id; ?>?movie=true" class="link_collection">
			<div class="poster_collection">
				<img src="https://image.tmdb.org/t/p/w500/<?=$topMovies[$i]->poster_path; ?>" alt="poster_collection">
				<div class="info_collection_on_poster">
					<div class="rait_collection">
						<p class="text_mont">Рейтинг IMDB <span><?=$topMovies[$i]->vote_average; ?></span></p>
					</div>
					<div class="average_collection">
						<p><span>HD</span></p>
					</div>
				</div>
			</div>
			<div class="about_collection">
				<p class="headline_collection"><?=$topMovies[$i]->title; ?></p>
				<p class="date_collection text_mont"><?=mb_strimwidth($topMovies[$i]->release_date,0,4); ?></p>
			</div>
		</a>
	</div>
<?php endfor; ?>
</div>
<hr style="border:1px solid #343434;">
<div class="list_collection">
<?php for($i=0;$i < count($upcomingMovies); $i++): ?>
	<div class="collection" data-id="<?=$upcomingMovies[$i]->id; ?>">
		<a href="/watch/<?=$upcomingMovies[$i]->id; ?>?movie=true" class="link_collection">
			<div class="poster_collection">
				<img src="https://image.tmdb.org/t/p/w500/<?=$upcomingMovies[$i]->poster_path; ?>" alt="poster_collection">
				<div class="info_collection_on_poster">
					<div class="rait_collection">
						<p class="text_mont">Рейтинг IMDB <span><?=$upcomingMovies[$i]->vote_average; ?></span></p>
					</div>
					<div class="average_collection">
						<p><span>HD</span></p>
					</div>
				</div>
			</div>
			<div class="about_collection">
				<p class="headline_collection"><?=$upcomingMovies[$i]->title; ?></p>
				<p class="date_collection text_mont"><?=mb_strimwidth($upcomingMovies[$i]->release_date,0,4); ?></p>
			</div>
		</a>
	</div>
<?php endfor; ?>
</div>