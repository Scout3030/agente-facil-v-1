<template>
	<form ref="formOperations" method="post" action="/">
		<input type="hidden" name="_token" :value="csrf">
		<input type="hidden" name="operation" :value="operation">
		<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
			<li class="nav-item" @click="operation = 1">
				<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Transferencia interbancaria</a>
			</li>
			<li class="nav-item" @click="operation = 2">
				<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Pagos a otros bancos</a>
			</li>
		</ul>
		<div class="tab-content" id="pills-tabContent">
			<transfer :banks="banks"></transfer>
			<payment :banks="banks"></payment>
		</div>
		<button type="submit" id="button-form" class="btn btn-primary btn-block">Iniciar operación</button>
	</form>
</template>
<script>
	import transfer from './Transfer'
	import payment from './Payment'
	export default{
		data(){
			return {
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
				operation: 1
			}
		},
		props: ['banks'],
		components:{
			transfer,
			payment
		}
	}
</script>