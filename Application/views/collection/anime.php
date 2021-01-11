<div class="list_collection">
	<?php for ($i = 0; $i < 32; $i++):?>
		<div class="collection" data-id="<?=htmlspecialchars($vars['info'][$i]->kinopoisk_id);  ?>">
			<a class="link_collection" href="/watch/<?=htmlspecialchars($vars['info'][$i]->kinopoisk_id); ?>" >
			<div class="poster_collection">
				<img data-src="<?=htmlspecialchars($vars['info'][$i]->info->poster);?>" src="" alt=<?=htmlspecialchars($vars['info'][$i]->info->rus);?> >
				<div class="info_collection_on_poster">
					<div class="rait_collection">
						<p class="text_mont">Рейтинг IMDB <span><?=htmlspecialchars($vars['info'][$i]->info->rating->rating_imdb);  ?></span></p>
					</div>
					<div class="average_collection">
						<p><span><?=htmlspecialchars($vars['info'][$i]->quality);  ?></span></p>
					</div>
				</div>
			</div>
			<div class="about_collection">
				<p class="headline_collection"><?=htmlspecialchars($vars['info'][$i]->info->rus);  ?></p>
				<p class="date_collection text_mont"><?=htmlspecialchars($vars['info'][$i]->info->year); ?></p>
			</div>
		</a>
	</div>
<?php endfor; ?>
<?php
	$page = $vars['pageCurrent'];
	$pageLast = 500;
?>
	<div class="navigation_collection">
			<?php if ($page <= 5): ?>
				<?php for($i = 1; $i < 12; $i++): ?>
					<?php if ($page+1 == $i+1): ?>
						<a href="/anime?page=<?=$page;?>" class="navigation_collection_active_page navigation_collection_page"><?=$page; ?></a>
					<?php continue; endif; ?>
					<a href="/anime?page=<?=$i;  ?>" class="navigation_collection_page"><?=$i;  ?></a>
				<?php endfor; ?>
			<?php endif; ?>
			<?php if ($page >= 6 && $page < 	$pageLast - 5): ?>
					<a href="/anime?page=<?=$page - 5;?>" class=" navigation_collection_page"><?=$page - 5; ?></a>
					<a href="/anime?page=<?=$page - 4;?>" class=" navigation_collection_page"><?=$page - 4; ?></a>
					<a href="/anime?page=<?=$page - 3;?>" class=" navigation_collection_page"><?=$page - 3; ?></a>
					<a href="/anime?page=<?=$page - 2;?>" class=" navigation_collection_page"><?=$page - 2	; ?></a>
					<a href="/anime?page=<?=$page - 1;?>" class=" navigation_collection_page"><?=$page - 1; ?></a>
				<?php for($i = $page; $i < $page + 6; $i++): ?>
					<?php if ($page == $i): ?>
						<a href="/anime?page=<?=$page;?>" class="navigation_collection_active_page navigation_collection_page"><?=$page; ?></a>
					<?php continue; endif; ?>
					<a href="/anime?page=<?=$i;  ?>" class="navigation_collection_page"><?=$i;  ?></a>
				<?php endfor; ?>
			<?php endif; ?>
			<?php if ($page >= 	$pageLast - 5): ?>
				<?php for($i = $page-5; $i < $page; $i++): ?>
					<?php if ($page+1 == $i+1): ?>
						<a href="/anime?page=<?=$page;?>" class="navigation_collection_active_page navigation_collection_page"><?=$page; ?></a>
					<?php continue; endif; ?>
					<a href="/anime?page=<?=$i;?>" class="navigation_collection_page"><?=$i;?></a>
				<?php endfor; ?>
			<?php endif; ?>
	</div>
</div>
