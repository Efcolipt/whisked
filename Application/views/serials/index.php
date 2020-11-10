<?php $listSerials = $vars["listSerials"]->results;?>
<div class="list_collection">
<?php for($i = 0; $i < count($listSerials); $i++): ?>
	<div class="collection" data-id="<?=$listSerials[$i]->id; ?>">
		<a href="/watch/<?=$listSerials[$i]->id; ?>?serial=true" class="link_collection">
			<div class="poster_collection">
				<img src="https://image.tmdb.org/t/p/w500/<?=$listSerials[$i]->poster_path; ?>" alt="poster_collection">
				<div class="info_collection_on_poster">
					<div class="rait_collection">
						<p class="text_mont">Рейтинг IMDB <span><?=$listSerials[$i]->vote_average; ?></span></p>
					</div>
					<div class="average_collection">
						<p><span>HD</span></p>
					</div>
				</div>
			</div>
			<div class="about_collection">
				<p class="headline_collection"><?=$listSerials[$i]->name; ?></p>
				<p class="date_collection text_mont"><?=mb_strimwidth($listSerials[$i]->first_air_date,0,4); ?></p>
			</div>
		</a>
	</div>
<?php endfor; ?>

	<div class="navigation_collection">
		<?php 
			//  for ($i = 1; $i < $vars['pageAll']; $i++) {
			// 	 if ($i != $vars['pageCurrent']) {
			// 	 	echo '<a class="text_mont navigation_collection_page" href="/serials?page='.$i.'">'.$i.'</a> ';
			// 	 }
			// 	 else {
			// 	 	echo '<span class="text_mont navigation_collection_active_page">'.$i.'</span> ';
			// 	 }
			// }
		 ?>	
	</div> 

</div>