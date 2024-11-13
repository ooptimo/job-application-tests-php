<?php

use yii\widgets\ListView;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var $dataProvider yii\data\ArrayDataProvider */


$this->title = 'Test 1 — ooptimo';
?>
<div class="site-test1">
	<div class="body-content">
		<div class="row mt-5">
			<div class="col-md-12">
				<h2>Test 1 — Consumir API</h2>
				<p>El objetivo es cargar datos de una API externa y mostrarlos en pantalla.</p>
				<p>Usaremos la "Fake API" <a href="https://jsonplaceholder.typicode.com/" target="_blank">JSONPlaceholder</a> para cargar datos.<br>Usa este endpoint: <code>https://jsonplaceholder.typicode.com/posts</code>, y muestra una lista en esta misma página con los datos obtenidos.</p>

				<h5>Ayuda</h5>
				<ul>
					<li>Estamos usando el framework MVC Yii v2: <a href="https://www.yiiframework.com/doc/guide/2.0/en" target="_blank">Guia</a>.</li>
					<li>La API externa es la de JSONPlaceholder: <a href="https://jsonplaceholder.typicode.com/guide/" target="_blank">Guia</a></li>
					<li>Los archivos relevantes estan en <code>/controllers</code>, <code>/models</code> y <code>/views</code>.</li>
					<li>Para los estilos puedes editar directamente el archivo <code>/web/css/site.css</code>.</li>
				</ul>
			</div>
		</div>
	</div>

	<hr>

	<div class="posts-list">
		<div class="row mt-4">
			<h2>Posts</h2>
		</div>

		<?php
		// Usamos listView para mostrar los datos y la paginación
		echo ListView::widget([
			'dataProvider' => $dataProvider,
			'itemView' => function ($model, $key, $index, $widget) {
				return $this->render('_post', ['post' => $model]);
			},
			'layout' => "{items}\n{pager}",
			'pager' => [
				'class' => \yii\widgets\LinkPager::class, // Clase del paginador
				'options' => ['class' => 'pagination justify-content-center mt-3'], // Clase CSS personalizada
				'linkOptions' => ['class' => 'page-link'], // Clase CSS para los enlaces
				'prevPageLabel' => 'Anterior', // Etiqueta para el enlace de página anterior
				'nextPageLabel' => 'Siguiente', // Etiqueta para el enlace de página siguiente
				'disabledPageCssClass' => 'd-none', // Clase CSS para las páginas deshabilitadas
				'activePageCssClass' => 'active', // Clase CSS para la página activa
			],
		]) ?>
	</div>
</div>