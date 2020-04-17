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
			<label for="youSend">Desde</label>
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
			<select class="custom-select" required="" v-if="accounts1.length" v-model="operationFromAccount" @change="setOperationFromAccount">
				<option value="0" selected>Seleccione cuenta</option>
				<option v-for="item in accounts1" :value="item">{{item.number}}</option>
			</select>
		</div>
		<div class="form-group">
			<label for="recipientGets">Hacia</label>
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
			<select class="custom-select" required="" v-if="accounts2.length" v-model="operationToAccount" @change="setOperationToAccount">
				<option value="0" selected>Seleccione cuenta</option>
				<option v-for="item in accounts2" :value="item">{{item.number}}</option>
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
				operationFrom : null,
				operationTo: null,
				operationAmount : null,
				accounts1: [],
				accounts2: [],
				operationFromAccount: null,
				operationToAccount: null,

			}
		},
		mounted(){
			this.operationFrom = this.from
			this.operationTo = this.to
			this.operationAmount = this.amount
			this.operationFromAccount = this.fromAccount
			this.operationToAccount = this.toAccount
			this.getBankAccounts(this.operationFrom.id).then(response => {
				this.accounts1 = response
			})
			this.getBankAccounts(this.operationTo.id).then(response => {
				this.accounts2 = response
			})
		},
		props: ['banks'],
		computed: {
			...mapState('transfer', ['from', 'to', 'amount', 'comission', 'fromAccount', 'toAccount']),
			total(){
				return `S/${parseFloat(this.operationAmount) + parseFloat(this.comission)}`
			}
		},
		methods: {
			...mapMutations('transfer', ['setFrom', 'setTo', 'setAmount', 'setComission', 'setFromAccount', 'setToAccount']),
			icon(icon){
				return `bank ${icon}`
			},
			setFromBank(){
				this.setFrom(this.operationFrom)
				this.getBankAccounts(this.operationFrom.id).then(response => {
					this.accounts1 = response
				})
				
			},
			setToBank(){
				this.setTo(this.operationTo)
				this.getBankAccounts(this.operationTo.id).then(response => {
					this.accounts2 = response
				})
			},
			setOperationAmount(){
				this.setAmount(this.operationAmount)
				if (this.operationAmount >= 10 && this.operationAmount <= 150) {
					this.setComission(1)
				}
				if (this.operationAmount >= 151 && this.operationAmount <= 997) {
					this.setComission(2)
				}
			},
			setOperationFromAccount(){
				this.setFromAccount(this.operationFromAccount)
			},
			setOperationToAccount(){
				this.setToAccount(this.operationToAccount)
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
		}
	}
</script>