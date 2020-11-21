<div class="collection_view">
	<div class="collection_top_side_view">
		<div class="collection_top_side_view_img">
			<img src="https://image.tmdb.org/t/p/w500/<?=htmlspecialchars($vars['poster']);?>" alt="">
		</div>
		<div class="collection_top_side_view_txt">
			<div class="collection_top_side_view_txt_headline collection_top_side_view_txt_info">
				<p><?=$vars['title'];?><span class="text_mont">12+</span><span>HD</span></p>
			</div>
			<div class="collection_top_side_view_txt_about">
				<div class="collection_top_side_view_txt_info ">
					<p>Рейтинг IMDB: <span class="text_mont"><?=htmlspecialchars($vars['average']);?> </span></p>
				</div>  

				<div class="collection_top_side_view_txt_info ">
					<p>Дата выхода: <span class="text_mont"><?=htmlspecialchars($vars['date']);?></span></p>
				</div>

				<div class="collection_top_side_view_txt_info ">
					<p>Бюджет: <span class="text_mont"><?=htmlspecialchars(rand(200000,4000000));?></span>$</p>
				</div> 
				<div class="collection_top_side_view_txt_genres">
					<p>Жанр: </p>
				<?php for ($i = 0; $i < count($vars['genres']); $i++): ?>
					<p><?=htmlspecialchars($vars['genres'][$i]->name);?></p>,
				<?php endfor; ?>
				</div> 

				<div class="collection_top_side_view_txt_companies">
					<p>Страны съёмок: </p>
				<?php for ($i = 0; $i < count($vars['companies']); $i++): ?>
					<p><?=htmlspecialchars($vars['companies'][$i]->name);?></p>,
				<?php endfor; ?>
				</div> 
				<div class="collection_top_side_view_txt_lang ">
					<p>Языки: Русский, Английский</p>
				</div>
				<div class="collection_top_side_view_txt_description ">
					<p>Описание: <?=htmlspecialchars($vars['desctiption'])?></p>
				</div>
				
			</div>
			

		</div>
	</div>
	<div class="collection_centered_side_view">
		<div class="collection_centered_side_view_tab_video">
			<div class="collection_centered_side_view_tab_video_helper_top">
				<div class="collection_centered_side_view_tab_video_helper_top_players">
					<a href="#">Плеер 1</a>
				</div>
				<div class="collection_centered_side_view_tab_video_helper_top_complaint">
					<span class="collection_centered_side_view_tab_video_helper_top_icon_complaint"><i class="fas fa-exclamation-triangle" aria-hidden="true"></i> Есть жалоба ?</span>
				</div>
			</div>
			
			<?php if (!empty($vars['video'])) {
				
			 ?>
			<iframe allowfullscreen src="<?=htmlspecialchars($vars['video']); ?>" width="100%" height="800" frameborder="0"></iframe>
			<?php } ?>
			<div class="collection_centered_side_view_tab_video_helper_bottom">
				<div class="collection_centered_side_view_tab_video_helper_bottom_favorite" data-sfc="800">
					<a class="collection_centered_side_view_tab_video_helper_bottom_favorite_item">В избранное <i class="far fa-heart" aria-hidden="true"></i></a>
				</div>
				<div class="collection_centered_side_view_tab_video_helper_bottom_social">
					<a class="collection_centered_side_view_tab_video_helper_bottom_social_item" href="#"><i class="fab fa-vk" aria-hidden="true"></i></a>
					<a class="collection_centered_side_view_tab_video_helper_bottom_social_item" href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
					<a class="collection_centered_side_view_tab_video_helper_bottom_social_item" href="#"><i class="fab fa-odnoklassniki" aria-hidden="true"></i></a>
					<a class="collection_centered_side_view_tab_video_helper_bottom_social_item" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
					<a class="collection_centered_side_view_tab_video_helper_bottom_social_item" href="#"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>