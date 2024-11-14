<?php

/** @var yii\web\View $this */

use yii\helpers\Url;

$this->title = 'ooptimo';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row mt-5">
            <div class="col-md-12">
                <h1>ooptimo tests</h1>
	            <p>Solve the following exercises:</p>
	            
	            <ul>
                    <li><a href="<?=Url::to(['site/test1'])?>">Test 1 — Consume API (acceso directo mediante javascript)</a></li>
                    <li><a href="<?=Url::to(['site/test2'])?>">Test 2 — Consume API (filtrando los datos por backend)</a></li>
	            </ul>

	            <p>If you have any questions or issues, feel free to send an email with your queries to <a href="mailto:asunyer@ooptimo.com">asunyer@ooptimo.com</a>, and we will try to assist you as soon as possible.</p>
            </div>
        </div>
    </div>
</div>
