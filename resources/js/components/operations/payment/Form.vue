<template>
	<form id="form-send-money" ref="form" method="post" action="/deposito" @submit.prevent="sendData">
		<input type="hidden" name="_token" :value="csrf">
		<input type="hidden" name="bankId" :value="from.id">
		<input type="hidden" name="operationType" :value="2">
		<div class="form-group">
            <label for="youSend">Monto</label>
            <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">S/</span>
				</div>
				<input type="number" class="form-control" v-model="operationAmount" step=".10" min="10" @change="setOperationAmount">
            </div>
            <div class="error" v-if="!$v.operationAmount.required && $v.operationAmount.$error"><p :class="{ 'text-danger': $v.operationAmount.$error }">El monto a pagar es requerido</p></div>
        </div>
		<div class="form-group">
			<label for="youSend">Convenio</label>
			<div class="input-group">
				<div class="input-group-append" style="width: 100%">
					<span class="input-group-text p-0" style="width: 100%">
						<select data-style="custom-select bg-transparent border-0" data-container="body" data-live-search="true" class="selectpicker form-control bg-transparent" required @change="setToBank" v-model="operationTo">
							<optgroup label="Bancos">

								<option data-icon="bank bank1 mr-1" selected="selected" value="0">Seleccionar banco asociado al convenio</option>

								<option v-for="item in banks" :data-icon="icon(item.icon)" :data-subtext="item.name | capitalize" :value="item">{{item.name | capitalize}}</option>

							</optgroup>
						</select>
					</span>
				</div>
			</div>
			<select class="custom-select" required="" v-model="selectedService" @change="setService">
				<option value="0" selected>Seleccione convenio</option>
				<option v-for="item in services" :value="item">{{item.name}}</option>
			</select>
			<div class="error" v-if="!$v.selectedService.id.required && $v.selectedService.id.$error"><p :class="{ 'text-danger': $v.selectedService.id.$error }">Selecciona el convenio del banco afiliado</p></div>
		</div>
		<div class="form-group">
            <label v-if="selectedService">Dato requerido: <span class="text-muted">{{selectedService.requirement}}</span></label>
            <label v-else>Código/Dato requerido para el pago:</label>
            <div class="input-group">
				<input type="text" class="form-control" v-model="requiredCode" @change="setOperationCode">
            </div>
            <div class="error" v-if="!$v.requiredCode.required && $v.requiredCode.$error"><p :class="{ 'text-danger': $v.requiredCode.$error }">El código es obligatorio</p></div>
        </div>
		<!--*=============================================
		=            Section comment block            =
		=============================================-->
		
        <div class="form-group">
        	<label>Nombre del beneficiario:</label>
            <div class="input-group">
				<input type="text" class="form-control" v-model="requiredName" @change="setOperationName">
            </div>
            <div class="error" v-if="!$v.requiredName.required && $v.requiredName.$error"><p :class="{ 'text-danger': $v.requiredName.$error }">El nombre es obligatorio</p></div>
        </div>

        <!--*=============================================
		=            Section comment block            =
		=============================================-->

		<div class="form-group">
			<label for="recipientGets">Transferir fondos desde</label>
			<div class="input-group">
				<div class="input-group-append" style="width: 100%">
					<span class="input-group-text p-0" style="width: 100%">
						<select data-style="custom-select bg-transparent border-0" data-container="body" data-live-search="true" class="selectpicker form-control bg-transparent" required @change="setFromBank" v-model="operationFrom">
							<optgroup label="Bancos">

								<option data-icon="bank bank1 mr-1" selected="selected" value="0">Seleccionar banco de emisión</option>

								<option v-for="item in banks" v-if="item.enable_deposit == 1" :data-icon="icon(item.icon)" :data-subtext="item.name | capitalize" :value="item">{{item.name | capitalize}}</option>

							</optgroup>
						</select>
					</span>
				</div>
			</div>
			<select class="custom-select" required="" v-if="accounts.length" v-model="operationFromAccount" @change="setOperationFromAccount">
				<option value="0" selected>Seleccione cuenta</option>
				<option v-for="item in accounts" :value="item">{{item.number}}</option>
			</select>
			<div class="error" v-if="!$v.operationFrom.id.required && $v.operationFrom.id.$error"><p :class="{ 'text-danger': $v.operationFrom.id.$error }">Selecciona un banco de origen</p></div>
			<div class="error" v-if="!$v.operationFromAccount.id.required && $v.operationFromAccount.id.$error && !$v.operationFrom.id.$error"><p :class="{ 'text-danger': $v.operationFromAccount.id.$error }">Selecciona una cuenta de origen</p></div>
		</div>
		<hr>
		<p class="mb-1">Comisión servicio <span class="text-3 float-right"> S/{{parseFloat(comission)}}</span></p>
		<p class="font-weight-500">Total a transferir <span class="text-3 float-right">{{total}}</span></p>
		<button class="btn btn-primary btn-block">Realizar operación</button>
	</form>
</template>

<script>
	import { required, numeric } from 'vuelidate/lib/validators'
	import { mapState, mapMutations } from 'vuex'
	export default{
		data(){
			return {
				operationAmount: null,
				operationTo: null,
				operationFrom : null,
				services: [],
				accounts: [],
				operationFromAccount: null,
				requiredCode: null,
				requiredName: null,
				selectedService: null,
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
			}
		},
		mounted(){
			this.operationFrom = this.from
			this.operationTo = this.to
			this.operationAmount = this.amount
			this.operationFromAccount = this.fromAccount
			this.selectedService = this.operation
			this.requiredCode = this.code
			this.getBankAccounts(this.operationFrom.id).then(response => {
				this.accounts = response
			})
			this.getServices(this.operationTo.id).then(response => {
				this.services = response
			})
			this.requiredName = this.name
		},
		props: ['banks'],
		methods: {
			...mapMutations('payment', ['setFrom', 'setTo', 'setAmount', 'setFromAccount', 'setAmount', 'setComission', 'setOperation', 'setCode', 'setName']),
			icon(icon){
				return `bank ${icon}`
			},
			setToBank(){
				this.setTo(this.operationTo)
				this.getServices(this.operationTo.id).then(response => {
					this.services = response
				})
			},
			setFromBank(){
				this.setFrom(this.operationFrom)
				this.getBankAccounts(this.operationFrom.id).then(response => {
					this.accounts = response
				})
				
			},
			setOperationAmount(){
				this.setAmount(this.operationAmount)
				if (this.operationAmount >= 10 && this.operationAmount <= 150) {
					this.setComission(1)
				}
				if (this.operationAmount >= 151 && this.operationAmount <= 500) {
					this.setComission(2)
				}
				if (this.operationAmount >= 501 && this.operationAmount <= 997) {
					this.setComission(2)
				}
			},
			setOperationFromAccount(){
				this.setFromAccount(this.operationFromAccount)
			},
			setService(){
				this.setOperation(this.selectedService)
			},
			setOperationCode(){
				this.setCode(this.requiredCode)
			},
			setOperationName(){
				this.setName(this.requiredName)
			},
			async getServices(bankId){
				const {data} = await Vue.axios({
					url: `/api/bank-operations/${bankId}`,
				})
				return data
			},
			async getBankAccounts(bankId){
				const {data} = await Vue.axios({
					method: 'POST',
					url: '/accounts',
					data: {
						"_token": $("meta[name='csrf-token']").attr("content"),
						bankId: bankId
					}
				})
				return data
			},
			sendData(){
				this.$v.$touch()
			    if (this.$v.$invalid) {
			        this.submitStatus = 'ERROR'
			        console.log('invalido')
			    } else {
		        	this.$refs.form.submit()
			    }
			}
		},
		filters: {
		  	capitalize: function (value) {
		    	if (!value) return ''
		    	value = value.toLowerCase()
		    	value = value.toString()
		    	value = value.charAt(0).toUpperCase() + value.slice(1)
		    	return value.replace(/\b[a-z]/g,c=>c.toUpperCase())

		  	}
		},
		computed: {
			...mapState('payment', ['from', 'to', 'amount', 'comission', 'fromAccount', 'operation', 'code', 'name']),
			total(){
				return `S/${parseFloat(this.operationAmount) + parseFloat(this.comission)}`
			}
		},
		validations: {
			operationFrom: {//
		      id: {
		      	required,
		      	numeric
		      }
		    },
			operationTo: {//
		      id: {
		      	required,
		      	numeric
		      }
		    },
			operationAmount: {//
		      required,
		    },
			operationFromAccount: {//
		      id: {
		      	required,
		      	numeric
		      }
		    },
			selectedService: {//
		      id: {
		      	required,
		      	numeric
		      }
		    },
			requiredCode: {//
		      required,
		    },
			requiredName: {//
		      required,
		    }
		},
	}
</script> 