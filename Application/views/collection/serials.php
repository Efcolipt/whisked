<div class="list_collection">
	<?php for ($i = 0; $i < 8; $i++):?>
		<div class="collection" data-id="<?=$info['kinopoisk_id'];  ?>">
			<a class="link_collection" href="/watch/<?=$info[$i]['kinopoisk_id']; ?>" >
			<div class="poster_collection">
				<img data-src="<?=$info[$i]['info']['poster'];?>" alt=<?=$info[$i]['info']['rus'];?> >
				<div class="info_collection_on_poster">
					<div class="rait_collection">
						<p class="text_mont">Рейтинг IMDB <span><?=$info[$i]['info']['rating']['rating_imdb'];  ?></span></p>
					</div>
					<div class="average_collection">
						<p><span><?=$info[$i]['quality'];  ?></span></p>
					</div>
				</div>
			</div>
			<div class="about_collection">
				<p class="headline_collection"><?=$info[$i]['info']['rus'];  ?></p>
				<p class="date_collection text_mont"><?=$info[$i]['info']['year']; ?></p>
			</div>
		</a>
	</div>
<?php endfor; ?>
	<div class="navigation_collection">
			<?php if ($page <= 5): ?>
				<?php for($i = 1; $i < 12; $i++): ?>
					<?php if ($page+1 == $i+1): ?>
						<a href="/serials?page=<?=$page;?>" class="navigation_collection_active_page navigation_collection_page"><?=$page; ?></a>
					<?php continue; endif; ?>
					<a href="/serials?page=<?=$i;  ?>" class="navigation_collection_page"><?=$i;  ?></a>
				<?php endfor; ?>
			<?php endif; ?>
			<?php if ($page >= 6 && $page < 	$pageLast - 5): ?>
					<a href="/serials?page=<?=$page - 5;?>" class=" navigation_collection_page"><?=$page - 5; ?></a>
					<a href="/serials?page=<?=$page - 4;?>" class=" navigation_collection_page"><?=$page - 4; ?></a>
					<a href="/serials?page=<?=$page - 3;?>" class=" navigation_collection_page"><?=$page - 3; ?></a>
					<a href="/serials?page=<?=$page - 2;?>" class=" navigation_collection_page"><?=$page - 2	; ?></a>
					<a href="/serials?page=<?=$page - 1;?>" class=" navigation_collection_page"><?=$page - 1; ?></a>
				<?php for($i = $page; $i < $page + 6; $i++): ?>
					<?php if ($page == $i): ?>
						<a href="/serials?page=<?=$page;?>" class="navigation_collection_active_page navigation_collection_page"><?=$page; ?></a>
					<?php continue; endif; ?>
					<a href="/serials?page=<?=$i;  ?>" class="navigation_collection_page"><?=$i;  ?></a>
				<?php endfor; ?>
			<?php endif; ?>
			<?php if ($page >= 	$pageLast - 5): ?>
				<?php for($i = $page-5; $i < $page; $i++): ?>
					<?php if ($page+1 == $i+1): ?>
						<a href="/serials?page=<?=$page;?>" class="navigation_collection_active_page navigation_collection_page"><?=$page; ?></a>
					<?php continue; endif; ?>
					<a href="/serials?page=<?=$i;?>" class="navigation_collection_page"><?=$i;?></a>
				<?php endfor; ?>
			<?php endif; ?>
	</div>
</div>
