<template>
	<form id="form-send-money" method="post">
		<div class="form-group">
            <label for="youSend">Monto</label>
            <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">S/</span>
				</div>
				<input type="number" class="form-control" v-model="operationAmount" step=".10" min="10" @change="setOperationAmount">
            </div>
        </div>
		<div class="form-group">
			<label for="youSend">Convenio</label>
			<div class="input-group">
				<div class="input-group-append" style="width: 100%">
					<span class="input-group-text p-0" style="width: 100%">
						<select data-style="custom-select bg-transparent border-0" data-container="body" data-live-search="true" class="selectpicker form-control bg-transparent" required @change="setToBank" v-model="operationTo">
							<optgroup label="Bancos">

								<option data-icon="bank bank1 mr-1" selected="selected" value="0">Seleccionar banco de emisión</option>

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
		</div>
		<div class="form-group">
            <label for="youSend" v-if="selectedService">Dato requerido: {{selectedService.requirement}}</label>
            <label for="youSend" v-else>Dato requerido:</label>
            <div class="input-group">
				<input type="text" class="form-control" v-model="requiredCode" @change="setOperationCode">
            </div>
        </div>
		<div class="form-group">
			<label for="recipientGets">Transferir fondos desde</label>
			<div class="input-group">
				<div class="input-group-append" style="width: 100%">
					<span class="input-group-text p-0" style="width: 100%">
						<select data-style="custom-select bg-transparent border-0" data-container="body" data-live-search="true" class="selectpicker form-control bg-transparent" required @change="setFromBank" v-model="operationFrom">
							<optgroup label="Bancos">

								<option data-icon="bank bank1 mr-1" selected="selected" value="0">Seleccionar banco de emisión</option>

								<option v-for="item in banks" :data-icon="icon(item.icon)" :data-subtext="item.name | capitalize" :value="item">{{item.name | capitalize}}</option>

							</optgroup>
						</select>
					</span>
				</div>
			</div>
			<select class="custom-select" required="" v-if="accounts.length" v-model="operationFromAccount" @change="setOperationFromAccount">
				<option value="0" selected>Seleccione cuenta</option>
				<option v-for="item in accounts" :value="item">{{item.number}}</option>
			</select>
		</div>
		<hr>
		<p class="mb-1">Comisión servicio <span class="text-3 float-right"> S/{{parseFloat(comission)}}</span></p>
		<p class="font-weight-500">Total a transferir <span class="text-3 float-right">{{total}}</span></p>
		<button class="btn btn-primary btn-block">Realizar operación</button>
	</form>
</template>

<script>
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
				selectedService: null
			}
		},
		mounted(){
			this.operationFrom = this.from
			this.operationTo = this.to
			this.operationAmount = this.amount
			this.operationFromAccount = this.fromAccount
			this.operationToAccount = this.toAccount
			this.selectedService = this.operation
			this.requiredCode = this.code
			this.getBankAccounts(this.operationFrom.id).then(response => {
				this.accounts = response
			})
			this.getServices(this.operationTo.id).then(response => {
				this.services = response
			})
		},
		props: ['banks'],
		methods: {
			...mapMutations('payment', ['setFrom', 'setTo', 'setAmount', 'setFromAccount', 'setAmount', 'setComission', 'setOperation', 'setCode']),
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
			...mapState('payment', ['from', 'to', 'amount', 'comission', 'fromAccount', 'operation', 'code']),
			total(){
				return `S/${parseFloat(this.operationAmount) + parseFloat(this.comission)}`
			}
		},
	}
</script> 