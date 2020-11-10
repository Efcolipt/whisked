<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>
		<?=$title; ?>
	</title>

	<!-- Media -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE">

	<!-- Meta for search -->
	<meta name="robots" content="index, follow">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="copyright" content="">

	<!-- Open Graph Meta -->
	<meta property="og:title" content="<?=$title; ?>">
	<meta property="og:locale" content="ru_RU">
	<meta property="og:description" content="">
	<meta property="og:image" content="">
	<meta property="og:site_name" content="FastFilm">
	<meta property="og:url" content="">
	<meta property="og:type" content="website">

	<!-- Meta Google  -->
	<meta itemprop="name" content="<?=$title; ?>" />
	<meta itemprop="description" content="" />
	<meta itemprop="image" content="" />

	<!-- For media app -->
	<!-- <link rel="apple-touch-icon" sizes="57x57" href="#"> -->
	<!-- Css -->
	<link rel="stylesheet" href="/public/css/style.css">
	<!-- Favicon -->
	<link rel="shortcut icon" href="/public/images/favicon/favicon.png">
</head>
<body>
	<div class="wrapper">
		<div class="waitingSpin" >
			<div class="spinner"></div>
		</div>
		<header>
			<div class="container">
				<div class="inner_header">
					<div class="header_brand">
						<a href="/" class="header_navbar_link">Fast Film Beta</a>
					</div>
					<div class="header_icon_burger">
						<img src="/public/images/default/burger.png" alt="Bar for mobile">
					</div>
					<div class="header_menu_desktop">
						<ul class="list_header_menu_desktop">
							<li class="list_header_menu_desktop_item">
								<a href="/" class="list_header_menu_desktop_link">Главная</a>
							</li>
							<li class="list_header_menu_desktop_item">
								<a href="/movies" class="list_header_menu_desktop_link">Фильмы</a>
							</li>
							<li class="list_header_menu_desktop_item">
								<a href="/serials" class="list_header_menu_desktop_link">Сериалы</a>
							</li>
							<li class="list_header_menu_desktop_item">
								<a href="#" class="list_header_menu_desktop_link">О нас</a>
							</li>
                            <!-- 
	                        <li class="list_header_menu_desktop_item">
								<a href="#" class="list_menu_desktop_link">Мультфильмы</a>
							</li> -->
						</ul>
					</div>
					<div class="header_search">
						<form action="/search" method="post">
							<input type="text" placeholder="Найти ?" name="query" required>
							<button class="header_search_icon">
								<svg viewBox="0 0 18 18">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M13.9499 12.4702C15.9598 9.71455 15.6403 5.74064 13.048 3.14826C10.193 0.293337 5.66259 0.195039 2.92892 2.92871C0.195246 5.66238 0.293543 10.1928 3.14847 13.0478C5.74081 15.6401 9.71462 15.9596 12.4703 13.9498C12.5259 14.1145 12.6194 14.2692 12.7506 14.4004L15.4212 17.071C15.8768 17.5266 16.6155 17.5266 17.0711 17.071C17.5267 16.6154 17.5267 15.8767 17.0711 15.4211L14.4005 12.7505C14.2693 12.6193 14.1146 12.5259 13.9499 12.4702ZM11.7161 11.7166C13.6296 9.80299 13.5608 6.63167 11.5624 4.63322C9.56394 2.63478 6.39262 2.56597 4.47905 4.47954C2.56548 6.39311 2.63429 9.56442 4.63274 11.5629C6.63119 13.5613 9.8025 13.6301 11.7161 11.7166Z"></path>
								</svg>
							</button>
						</form>
					</div>
					<div class="header_account">
						<div class="header_account_avatar">
							<span>
								<svg  viewBox="0 0 29 29"  xmlns="http://www.w3.org/2000/svg">
									<path opacity="0.8" fill-rule="evenodd" clip-rule="evenodd" d="M14.5 27C21.4036 27 27 21.4036 27 14.5C27 7.59644 21.4036 2 14.5 2C7.59644 2 2 7.59644 2 14.5C2 21.4036 7.59644 27 14.5 27ZM29 14.5C29 22.5081 22.5081 29 14.5 29C6.49187 29 0 22.5081 0 14.5C0 6.49187 6.49187 0 14.5 0C22.5081 0 29 6.49187 29 14.5Z"/>
									<path opacity="0.8" fill-rule="evenodd" clip-rule="evenodd" d="M14.7105 8.77369C13.6263 8.77369 12.7473 9.65263 12.7473 10.7368C12.7473 11.8211 13.6263 12.7 14.7105 12.7C15.7947 12.7 16.6737 11.8211 16.6737 10.7368C16.6737 9.65263 15.7947 8.77369 14.7105 8.77369ZM11.1473 10.7368C11.1473 8.76897 12.7426 7.17369 14.7105 7.17369C16.6784 7.17369 18.2737 8.76897 18.2737 10.7368C18.2737 12.7047 16.6784 14.3 14.7105 14.3C12.7426 14.3 11.1473 12.7047 11.1473 10.7368Z"/>
									<path opacity="0.8" fill-rule="evenodd" clip-rule="evenodd" d="M7.9895 20.2105C7.9895 16.9953 11.1744 14.6737 14.7106 14.6737C18.2467 14.6737 21.4316 16.9953 21.4316 20.2105C21.4316 20.6524 21.0734 21.0105 20.6316 21.0105C20.1898 21.0105 19.8316 20.6524 19.8316 20.2105C19.8316 18.1936 17.7146 16.2737 14.7106 16.2737C11.7065 16.2737 9.5895 18.1936 9.5895 20.2105C9.5895 20.6524 9.23133 21.0105 8.7895 21.0105C8.34767 21.0105 7.9895 20.6524 7.9895 20.2105Z" />
								</svg>
							</span>

							<span>
								<svg  viewBox="0 0 12 6" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M6.63114 5.56039C6.65035 5.54461 6.66896 5.52775 6.6869 5.50981L10.7856 1.41114C11.0835 1.11318 11.0835 0.630096 10.7856 0.332137C10.4876 0.0341768 10.0045 0.0341768 9.70655 0.332137L5.99844 4.04025L2.29352 0.335331C1.99556 0.0373716 1.51248 0.0373726 1.21452 0.335332C0.916556 0.633292 0.916556 1.11638 1.21452 1.41434L5.46483 5.66465C5.76279 5.96261 6.24588 5.96261 6.54384 5.66465C6.57652 5.63196 6.60563 5.59705 6.63114 5.56039Z" />
								</svg>
							</span>
						</div>

						<div class="header_account_info">
							<!-- For Guest -->
							<ul class="list_header_account_info">
								<li class="list_header_account_info_item list_header_account_info_about">
									<a href="#" class="list_header_account_info_link">Гость</a>
								</li>
								<li class="list_header_account_link_to_item">
									<a href="#" class="list_header_account_info_link">Авторизоваться</a>
								</li>
								<li class="list_header_account_link_to_item">
									<a href="#" class="list_header_account_info_link">Зарегистрироваться</a>
								</li>
							</ul>
							<!-- For Auth user -->
							
							<!-- <ul class="list_header_account_info">
								<li class="list_header_account_info_item list_header_account_info_about">
									<a href="#" class="list_header_account_info_link">example@example.com</a>
								</li>
								<li class="list_header_account_link_to_item">
									<a href="#" class="list_header_account_info_link">Личный кабинет</a>
								</li>
								<li class="list_header_account_link_to_item">
									<a href="#" class="list_header_account_info_link">Настройки</a>
								</li>
								<li class="list_header_account_link_to_item  list_header_account_link_to_item_logout">
									<a href="#" class="list_header_account_info_link">
										<svg  viewBox="0 0 14 12"  xmlns="http://www.w3.org/2000/svg">
											<path  fill-rule="evenodd" clip-rule="evenodd" d="M9.01073 10.2172C9.01073 11.1454 8.27652 11.9016 7.37545 11.9016H1.63528C0.734207 11.9016 0 11.1454 0 10.2172V2.58598C0 1.65787 0.734207 0.901611 1.63528 0.901611H7.37545C8.27652 0.901611 9.01073 1.65787 9.01073 2.58598V3.99536C9.01073 4.37349 8.71037 4.68286 8.34327 4.68286C7.97616 4.68286 7.6758 4.37349 7.6758 3.99536V2.58598C7.6758 2.41411 7.54231 2.27661 7.37545 2.27661H1.63528C1.46841 2.27661 1.33492 2.41411 1.33492 2.58598V10.2172C1.33492 10.3891 1.46841 10.5266 1.63528 10.5266H7.37545C7.54231 10.5266 7.6758 10.3891 7.6758 10.2172V8.80786C7.6758 8.42973 7.97616 8.12036 8.34327 8.12036C8.71037 8.12036 9.01073 8.42973 9.01073 8.80786V10.2172ZM5.17283 5.69693H11.8141L10.4625 4.32193C10.1955 4.04692 10.1955 3.61723 10.4625 3.34224C10.7294 3.06723 11.1466 3.06723 11.4136 3.34224L13.8832 5.92036V6.0063C13.9499 6.10942 14 6.24692 14 6.40161C14 6.5563 13.9666 6.67661 13.8832 6.79692V6.88286L11.4136 9.42661C11.2801 9.56412 11.1132 9.63286 10.9464 9.63286C10.7795 9.63286 10.6126 9.56412 10.4791 9.42661C10.2122 9.15161 10.2122 8.72192 10.4791 8.44693L11.8141 7.07193H5.17283C4.80573 7.07193 4.50537 6.76254 4.50537 6.38443C4.50537 6.0063 4.80573 5.69693 5.17283 5.69693Z"/>
										</svg>
										<span> Выйти</span>
									</a>
								</li>
							</ul> 
						</div> -->


					</div>
				</div>
			</div>
		</header>
		<main>
			<div class="container">
				<?=$content; ?>
			</div>
		</main>
		<footer>
			<div class="container">
				<div class="inner_footer">
					<div class="footer_menu_desktop">
						<ul class="list_footer_menu_desktop">
							<li class="list_footer_menu_desktop_item"><a href="#" class="list_footer_menu_desktop_link">Контакты</a></li>
							<li class="list_footer_menu_desktop_item"><a href="#" class="list_footer_menu_desktop_link">Помощь</a></li>
							<li class="list_footer_menu_desktop_item"><a href="#" class="list_footer_menu_desktop_link">Правообладателям</a></li>
						</ul>
					</div>
					<div class="footer_info_site">
						<div class="footer_info_site_release">
							<p>Release <span  class="text_mont">v1.0</span></p>
						</div>
						<div class="footer_info_site_copyright">
							<p><span class="text_mont">© 2018-<?=date("Y");?></span> <span>Fast Film</span></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
	<script src="/public/js/main.js"></script>
</body>
</html>