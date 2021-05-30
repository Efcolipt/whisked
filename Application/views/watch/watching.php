<div class="collection_view">
	<div class="collection_top_side_view">
		<div class="collection_top_side_view_img">
			<img src="<?=$info["poster"];?>"  alt="<?=$info["rus"];?>" >
		</div>
		<div class="collection_top_side_view_txt">
			<div class="collection_top_side_view_txt_headline">
				<h1><?=$info['rus'];?></h1>
				<div>
					<span><?=$info['age'];?> +</span>
					<span class="collection_top_side_view_quality" data-=""><?=$quality;?></span>
				</div>
			</div>
			<div class="collection_top_side_view_txt_about">
				<div class="collection_top_side_view_txt_info ">
					<p>Рейтинг IMDB: <span class="text_mont"><?=$info['rating']['rating_imdb'];?></span></p>
				</div>

				<div class="collection_top_side_view_txt_info ">
					<p>Дата премьеры: <span class="text_mont"><?=$info['premiere'];?></span></p>
				</div>

				<div class="collection_top_side_view_txt_info ">
					<p>Перевод: <span class="text_mont"><?=$translation;?></span></p>
				</div>

				<div class="collection_top_side_view_txt_info ">
					<p>Актеры: <span class="text_mont"><?=$info['actors'];?></span></p>
				</div>
				<div class="collection_top_side_view_txt_genres">
					<p>Жанр: <span class="text_mont"><?=$info['genre'];?></span></p>
				</div>

				<div class="collection_top_side_view_txt_companies">
					<p>Страны съёмок: <span class="text_mont"><?=$info['country'];?></span></p>
				</div>
				<div class="collection_top_side_view_txt_lang ">
					<p>Языки: <span class="text_mont">Русский, Английский</span></p>
				</div>
				<div class="collection_top_side_view_txt_description ">
					<p>Описание: <span class="text_mont"><?=$info['description'];?></span></p>
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

			 <iframe src="<?=$link;?>" frameborder="0" scrolling="no" allowfullscreen="" referrerpolicy="origin" width="100%" height="800"></iframe>
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
