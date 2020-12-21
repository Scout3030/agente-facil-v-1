
<template>
	
<!-- Withdraw Money Form
============================================= -->
	<div class="bg-light shadow-sm rounded p-3 p-sm-4 mb-4">
		<div class="text-center bg-primary p-3 rounded mb-3">
			<h3 class="text-10 text-white font-weight-400">S/{{amount + comission}}</h3>
			<!-- <p class="text-white">Para realizar tu transferencia</p> -->
			<a href="javascript:void(0)" class="btn btn-outline-light btn-sm shadow-none text-uppercase rounded-pill text-1">Transferencia interbancaria</a>
		</div>
		<form id="form-send-money" method="post" ref="form" @submit.prevent="sendCode" novalidate action="/operation/store">
			<input type="hidden" name="_token" :value="csrf">
			<input type="hidden" name="operation_type_id" value="1">
			<input type="hidden" name="amount" :value="amount">
			<input type="hidden" name="from" :value="fromAccount.id">
			<input v-if="isMine == true" type="hidden" name="to" :value="toAccount.id">
			<input v-if="isMine == false" type="hidden" name="account_number" :value="accountNumber">
			<input v-if="isMine == false" type="hidden" name="name" :value="ownerName">
			<input v-if="isMine == false" type="hidden" name="bank_id" :value="to.id">
			<div class="alert alert-info rounded shadow-sm">
				<div class="row">
                  <p class="col-sm-5 opacity-7 text-sm-right mb-0">Banco de origen:</p>
                  <p class="col-sm-7">{{from.name}}</p>
                  <p class="col-sm-5 opacity-7 text-sm-right">Cuenta de origen:</p>
                  <p class="col-sm-7">{{fromAccount.number}}</p>
                </div>
                <div class="row">
                  <p class="col-sm-5 opacity-7 text-sm-right">Banco de destino:</p>
                  <p class="col-sm-7">{{to.name}}</p>
                  <p class="col-sm-5 opacity-7 text-sm-right">Cuenta de destino :</p>
                  <p v-if="isMine == true"  class="col-sm-7">{{toAccount.number}}</p>
                  <p v-else class="col-sm-7">{{accountNumber}} (terceros)</p>
                </div>
                <div class="row">
                  <p class="col-sm-5 opacity-7 text-sm-right">Monto:</p>
                  <p class="col-sm-7">S/{{amount}}</p>
                </div>
                <div class="row">
                  <p class="col-sm-5 opacity-7 text-sm-right">Servicio:</p>
                  <p class="col-sm-7">S/{{comission}}</p>
                </div>
            </div>
			
			<button class="btn btn-primary btn-block">Continuar</button>
			<div class="pt-1">
				<p>Se te redireccionará a WhatsApp para terminar la operación</p>
			</div>
		</form>
	</div>
<!-- Withdraw Money Form end -->

</template>

<script>
	import {mapState} from 'vuex'
	export default{
		data(){
			return {
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
				code: null
			}
		},
		computed: {
			...mapState('transfer', ['isMine', 'amount', 'comission', 'fromAccount', 'toAccount', 'from', 'to', 'ownerName', 'accountNumber']),
		},
		methods: {
			sendCode(){

				// console.log('submit!')
			 //    this.$v.$touch()
			 //    if (this.$v.$invalid) {
			 //        this.submitStatus = 'ERROR'
			 //        console.log('invalido')
			 //    } else {
			        this.$refs.form.submit()
			        localStorage.clear();
			    // }
			}
		}
	}
</script>