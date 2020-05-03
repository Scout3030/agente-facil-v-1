
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
                  <p class="col-sm-5 opacity-7 text-sm-right">Banco de destino:</p>
                  <p class="col-sm-7">{{to.name}}</p>
                  <p class="col-sm-5 opacity-7 text-sm-right">Cuenta de destino :</p>
                  <p v-if="isMine == true"  class="col-sm-7">{{toAccount.number}}</p>
                  <p v-else class="col-sm-7">{{accountNumber}} (terceros)</p>
                </div>
                <div class="row">
                  <p class="col-sm-5 opacity-7 text-sm-right mb-0">Banco de origen:</p>
                  <p class="col-sm-7">{{from.name}}</p>
                  <p class="col-sm-5 opacity-7 text-sm-right">Cuenta de origen:</p>
                  <p class="col-sm-7">{{fromAccount.number}}</p>
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
			<div class="form-group">
				<label for="withdrawto">Realiza el depósito de los fondos para realizar tu operación a la cuenta:</label>
				<div class="input-group">
					<div class="input-group-append"> 
						<span class="input-group-text p-0">
							<select data-style="custom-select bg-transparent border-0" data-container="body" data-live-search="true" class="selectpicker form-control bg-transparent" required="" disabled>
								<optgroup label="Popular Currency">
								<option :data-icon="icon" :data-subtext="account.bank.name" value="">{{account.bank.name}}</option>
								</optgroup>
							</select>
						</span>
					</div>
					<input type="text" class="form-control" :value="account.number"  disabled>
				</div>
				<input type="text" class="form-control" :value="account.name" disabled>
			</div>
			<div class="form-group">
				<label for="youSend">N° de operación</label>
				<div class="input-group">
					<div class="input-group-prepend"> 
						<span class="input-group-text">N°</span> </div>
					<input type="text" class="form-control" :class="{ 'is-invalid': $v.code.$error, 'is-valid': !$v.code.$error }" name="deposit_code" v-model.trim="$v.code.$model" placeholder="Ingrese número de operación" autocomplete="off">
				</div>
				<div class="error" v-if="$v.code.$error"><p :class="{ 'text-danger': $v.code.$error }">Ingrese un número de operación válido</p></div>
			</div>
			
			<button class="btn btn-primary btn-block">Confirmar depósito</button>
		</form>
	</div>
<!-- Withdraw Money Form end -->

</template>

<script>
	import { required, numeric } from 'vuelidate/lib/validators'
	import {mapState} from 'vuex'
	export default{
		data(){
			return {
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
				code: null
			}
		},
		props: ['account'],
		computed: {
			...mapState('transfer', ['isMine', 'amount', 'comission', 'fromAccount', 'toAccount', 'from', 'to', 'ownerName', 'accountNumber']),
			icon(){
				return `bank ${this.account.bank.icon}`
			}
		},
		methods: {
			sendCode(){

				console.log('submit!')
			    this.$v.$touch()
			    if (this.$v.$invalid) {
			        this.submitStatus = 'ERROR'
			        console.log('invalido')
			    } else {

			        this.$refs.form.submit()

			    }
			}
		},
		validations: {
		    code : {
		      	required,
		      	numeric
		    },
		}
	}
</script>