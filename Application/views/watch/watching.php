<div class="collection_view">
	<div class="collection_top_side_view">
		<div class="collection_top_side_view_img">
			<img data-src="<?=htmlspecialchars($vars['info']->info->poster);?>" src="" alt=<?=htmlspecialchars($vars['info']->info->rus);?> >
		</div>
		<div class="collection_top_side_view_txt">
			<div class="collection_top_side_view_txt_headline collection_top_side_view_txt_info">
				<p><?=htmlspecialchars($vars['info']->info->rus);?><span class="text_mont"><?=htmlspecialchars($vars['info']->info->age);?>+</span><span>HD</span></p>
			</div>
			<div class="collection_top_side_view_txt_about">
				<div class="collection_top_side_view_txt_info ">
					<p>Рейтинг IMDB: <span class="text_mont"><?=htmlspecialchars($vars['info']->info->rating->rating_imdb);?> </span></p>
				</div>

				<div class="collection_top_side_view_txt_info ">
					<p>Дата премьеры: <span class="text_mont"><?=htmlspecialchars($vars['info']->info->premiere);?></span></p>
				</div>

				<div class="collection_top_side_view_txt_info ">
					<p>Актеры: <span class="text_mont"><?=htmlspecialchars($vars['info']->info->actors);?></span></p>
				</div>
				<div class="collection_top_side_view_txt_genres">
					<p>Жанр: <?=htmlspecialchars($vars['info']->info->genre);?></p>
				</div>

				<div class="collection_top_side_view_txt_companies">
					<p>Страны съёмок: <?=htmlspecialchars($vars['info']->info->country);?></p>
				</div>
				<div class="collection_top_side_view_txt_lang ">
					<p>Языки: Русский, Английский</p>
				</div>
				<div class="collection_top_side_view_txt_description ">
					<p>Описание: <?=htmlspecialchars($vars['info']->info->description);?></p>
				</div>

			</div>


		</div>
	</div>
	<div class="collection_centered_side_view">
		<div class="collection_centered_side_view_tab_video">
			<div class="collection_centered_side_view_tab_video_helper_top">
				<div class="collection_centered_side_view_tab_video_helper_top_players">
					<a href="#">Плеер</a>
				</div>
				<div class="collection_centered_side_view_tab_video_helper_top_complaint">
					<span class="collection_centered_side_view_tab_video_helper_top_icon_complaint"><i class="fas fa-exclamation-triangle" aria-hidden="true"></i> Есть жалоба ?</span>
				</div>
			</div>

			 <iframe src="<?=htmlspecialchars($vars['info']->link);?>" frameborder="0" scrolling="no" allowfullscreen="" referrerpolicy="origin" width="100%" height="800"></iframe>
			 <!-- <p class="not_found_video">Фильм не найден</p> -->
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
