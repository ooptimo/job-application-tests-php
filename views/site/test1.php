<?php

/** @var yii\web\View $this */

$this->title = 'Test 1 — ooptimo';
?>
<div class="site-test1">
    <div class="body-content">
        <div class="row mt-5">
            <div class="col-md-12">
                <h2>Test 1 — Consume API (filtrando los datos por backend, mediante framework Yii2)</h2>
	            <p>The goal is to load data from an external API and display it on screen.</p>
		    <p>We will use the "Fake API" <a href="https://jsonplaceholder.typicode.com/" target="_blank">JSONPlaceholder</a> to load data.<br>Use this endpoint: <code>https://jsonplaceholder.typicode.com/posts</code>, and display a list on this same page with the data retrieved.</p>
	            
	            <h5>Help</h5>
	            <ul>
		            <li>We are using the Yii v2 MVC framework: <a href="https://www.yiiframework.com/doc/guide/2.0/en" target="_blank">Guide</a>.</li>
		            <li>The external API is JSONPlaceholder: <a href="https://jsonplaceholder.typicode.com/guide/" target="_blank">Guide</a>.</li>
		            <li>Relevant files are located in <code>/controllers</code>, <code>/models</code>, and <code>/views</code>.</li>
		            <li>For styles, you can edit the <code>/web/css/site.css</code> file directly.</li>
	            </ul>
            </div>
        </div>
    </div>

	<hr>
	
	<div class="posts-list">
		<div class="row mt-4">
			<h2>Posts</h2>
            <div id="user-list" class="list-group"></div>
		</div>
	</div>
</div>

<script>
    const apiUrl = 'https://jsonplaceholder.typicode.com/posts';

    async function fetchAndDisplayUsers() {
        try {
            const response = await fetch(apiUrl);
            if (!response.ok) {
                throw new Error(`Error fetching data: ${response.status}`);
            }
            const users = await response.json();
            const userList = document.getElementById('user-list');

            users.forEach(user => {
                const userItem = document.createElement('div');
                const template = `<div style="margin:1em" class="card border border-primary">
                    <div class="card-body">
                    <h4 class="card-title">Id: ${user.id}</h4>
                    <p class="card-text">userId: ${user.userId} <br/> title: ${user.title} <br/> body: ${user.body}</p>
                    </div>
                </div>`;

                userItem.innerHTML = template;
                userList.appendChild(userItem);
            });
        } catch (error) {
            console.error('Error al obtener usuarios:', error);
        }
    }

    window.onload = function(e){
        fetchAndDisplayUsers();
    }
</script>