<div class="collection_view">
	<div class="collection_top_side_view">
		<div class="collection_top_side_view_img">
			<img src="https://image.tmdb.org/t/p/w500/<?=$vars['poster'];?>" alt="">
		</div>
		<div class="collection_top_side_view_txt">
			<div class="collection_top_side_view_txt_headline collection_top_side_view_txt_info">
				<p><?=$vars['title'];?><span>12+</span><span>HD</span></p>
			</div>

			<div class="collection_top_side_view_txt_about">
				<div class="collection_top_side_view_txt_info ">
					<p>Рейтинг: <span class="text_mont"><?=$vars['average'];?></span></p>
				</div>  

				<div class="collection_top_side_view_txt_info ">
					<p>Дата выхода: <span class="text_mont"><?=$vars['date'];?></span></p>
				</div>

				<div class="collection_top_side_view_txt_info ">
					<p>Кол-во сезонов: <span class="text_mont"><?=$vars['seasons'];?></span></p>
				</div>

				<div class="collection_top_side_view_txt_info ">
					<p>Кол-во эпизодов: <span class="text_mont"><?=$vars['episodes'];?></span></p>
				</div>

				<div class="collection_top_side_view_txt_info ">
					<p>Средний показатель серии: <span class="text_mont"><?=$vars['episodes_run'][0];?></span></p>
				</div>

				<div class="collection_top_side_view_txt_genres">
					<p>Жанр: </p>
				<?php for ($i = 0; $i < count($vars['genres']); $i++): ?>
					<p><?=$vars['genres'][$i]->name;?></p>,
				<?php endfor; ?>
				</div> 

				<div class="collection_top_side_view_txt_lang ">
					<p>Языки: Русский, Английский</p>
				</div>
				
				<div class="collection_top_side_view_txt_description ">
					<p>Описание: <?=$vars['desctiption']?></p>
				</div>
			</div>


		</div>
	</div>
	<div class="collection_centered_side_view">
		<?php if (!empty($vars['video'])) {
			
		 ?>
		<iframe src="<?=$vars['video']; ?>" width="100%" height="800" frameborder="0"></iframe>
		<?php } ?>
	</div>
</div>