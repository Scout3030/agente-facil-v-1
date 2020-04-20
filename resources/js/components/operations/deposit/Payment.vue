
<template>
	
<!-- Withdraw Money Form
============================================= -->
	<div class="bg-light shadow-sm rounded p-3 p-sm-4 mb-4">
		<div class="text-center bg-primary p-4 rounded mb-4">
			<h3 class="text-10 text-white font-weight-400">S/{{amount + comission}}</h3>
			<p class="text-white">Para realizar tu operación</p>
			<!-- <a href="" class="btn btn-outline-light btn-sm shadow-none text-uppercase rounded-pill text-1">Withdraw Full Amount</a> -->
		</div>
		<form id="form-send-money" method="post" ref="form" @submit.prevent="sendCode" novalidate action="/operation/store">
			<input type="hidden" name="_token" :value="csrf">
			<input type="hidden" name="operation_type_id" value="2">
			<input type="hidden" name="amount" :value="amount + comission">
			<input type="hidden" name="from" :value="fromAccount.id">
			<input type="hidden" name="bank_operation_id" :value="operation.id">
			<input type="hidden" name="code" :value="code">
			<div class="form-group">
				<label for="withdrawto">A cuenta</label>
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
			</div>
			<div class="form-group">
				<label for="youSend">N° de operación</label>
				<div class="input-group">
					<div class="input-group-prepend"> 
						<span class="input-group-text">N°</span> </div>
					<input type="text" class="form-control" :class="{ 'is-invalid': $v.depositCode.$error, 'is-valid': !$v.depositCode.$error }" name="deposit_code" v-model.trim="$v.depositCode.$model" placeholder="Ingrese número de operación">
				</div>
				<div class="error" v-if="!$v.depositCode.required || !$v.depositCode.numeric || !$v.depositCode.minLength"><p :class="{ 'text-danger': $v.depositCode.$error }">Ingrese un número de operación válido, {{$v.depositCode.$params.minLength.min}} dígitos al menos</p></div>
			</div>
			<button class="btn btn-primary btn-block">Confirmar depósito</button>
		</form>
	</div>
<!-- Withdraw Money Form end -->

</template>

<script>
import { required, numeric, minLength } from 'vuelidate/lib/validators'
	import {mapState} from 'vuex'
	export default{
		data(){
			return {
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
				depositCode: null
			}
		},
		props: ['account'],
		computed: {
			...mapState('payment', ['amount', 'comission', 'fromAccount', 'to', 'code', 'operation']),
			icon(){
				return `bank ${this.account.bank.icon}`
			}
		},
		methods: {
			sendCode(){
				this.$v.$touch()
			    if (this.$v.$invalid) {
			        this.submitStatus = 'ERROR'
			    } else {
			        this.$refs.form.submit()
			    }
			}
		},
		validations: {
		    depositCode : {
		      	required,
		      	numeric,
		      	minLength: minLength(4)
		    },
		}
	}
</script>