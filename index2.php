<!doctype html>

<html lang="en">
<head>
<meta charset="utf-8">

  <title>Vue!</title>
  <meta name="description" content="The HTML5 Herald">
  <meta name="author" content="SitePoint">

  <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>

	<div id="app">
		<p>{{ greeting }}</p>
	</div>
	
	<div id="app-2">
		<p v-bind:title="message">Hello</p>
	</div>
	
	<div id="app-3">
		<p v-if="seen">Hello again!</p>
	</div>
	
	<!--
	<div id="app-4">
		
	</div>	
	-->
	
	<div id="app-5">
		<p>{{ message }}</p>
		<button v-on:click="reverseMessage">Click this</button>
	</div>
	
	<div id="app-6">
		<p>{{ message }}</p>
		<input v-model="message">
	</div>
	
	<div id="app-7">
		<ol>
			<!--
			  Now we provide each todo-item with the todo object
			  it's representing, so that its content can be dynamic.
			  We also need to provide each component with a "key",
			  which will be explained later.
			-->
			<todo-item
			  v-for="item in groceryList"
			  v-bind:todo="item"
			  v-bind:key="item.id"
			></todo-item>
		</ol>
	</div>
	
	<div id="app-8">
		<p>Using mustaches: {{ redText }}</p>
		<p v-html="redText"></p>
	</div>

	<!-- development version, includes helpful console warnings -->
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	<script>
		
		var app8 = new Vue({
			el: '#app-8',
			data: {
				redText: '<span style="color:red">This should be red text</span>'
			}			
		})
		
		Vue.component('todo-item', {
			props: ['todo'],
			template: '<li>{{ todo.text }}</li>'
		})

		var app7 = new Vue({
			el: '#app-7',
			data: {
				groceryList: [
					{ id: 0, text: 'Vegetables' },
					{ id: 1, text: 'Cheese' },
					{ id: 2, text: 'Whatever else humans are supposed to eat' }
				]
			}
		})

		var app6 = new Vue({
			el: '#app-6',
			data: {
				message: 'This will change'
			}
		})
		
		var app5 = new Vue({
			el: '#app-5',
			data: {
				message: 'This is a message which will be reversed'
			},
			methods: {
				reverseMessage: function() {
					this.message = this.message.split('').reverse().join('')
				}
			}
		})
		
		var app = new Vue({
			el: '#app',
			data: {
				greeting: 'Good evening!'
			}
		})
		
		var app2 = new Vue({
			el: '#app-2',
			data: {
				message: 'The message is displayed at ' + new Date().toLocaleString()
			}
		})
		
		var app3 = new Vue({
			el: '#app-3',
			data: {
				seen: false
			}			
		})
	</script>
</body>
</html>