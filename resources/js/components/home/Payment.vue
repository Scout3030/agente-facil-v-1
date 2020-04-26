<template>
	<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
		<div class="form-group">
			<label for="payment">Realizar pago a</label>
			<div class="input-group">
				<div class="input-group-append" style="width: 100%"> 
					<span class="input-group-text p-0" style="width: 100%">
						<select id="payment" data-style="custom-select bg-transparent border-0" data-container="body" data-live-search="true" class="selectpicker form-control bg-transparent" required @change="setToBank" v-model="operationTo">
							<optgroup label="Banco">
								<option data-icon="bank bank1 mr-1" data-subtext="Seleccione banco" selected="selected" value="0">Banco</option>
								<option v-for="item in banks" :data-icon="icon(item.icon)" :data-subtext="item.name | capitalize" :value="item">{{item.name | capitalize}}</option>
							</optgroup>
						</select>
					</span>
				</div>


				<div class="input-group-append" style="width: 100%" v-if="bankOperations.length > 1"> 
					<span class="input-group-text p-0" style="width: 100%">
						<select id="services" data-style="custom-select bg-transparent border-0" data-container="body" data-live-search="true" class="form-control bg-transparent" required @change="setService" v-model="service">
							<optgroup label="Convenio">
								<option data-icon="bank bank1 mr-1" data-subtext="Seleccione convenio" selected value="0">Convenio</option>
								<option v-for="item in bankOperations" :data-icon="icon(item.icon)" :data-subtext="item.name | capitalize" :value="item">{{item.name | capitalize}}</option>
							</optgroup>
						</select>
					</span>
				</div>

			</div>
		</div>
		<div class="form-group">
			<label for="amount">El monto de</label>
			<div class="input-group">
				<div class="input-group-prepend"> <span class="input-group-text">S/</span> </div>
				<input type="number" step=".10" class="form-control" data-bv-field="amount" v-model="operationAmount" @change="setAmountOperation(operationAmount)" min="1">
			</div>
		</div>
		<div class="form-group">
			<label for="youSendFrom">Desde</label>
			<div class="input-group">
				<div class="input-group-append" style="width: 100%">
					<span class="input-group-text p-0" style="width: 100%">
						<select id="youSendFrom" data-style="custom-select bg-transparent border-0" data-container="body" data-live-search="true" class="selectpicker form-control bg-transparent" required @change="setFromBank" v-model="operationFrom">
							<optgroup label="Bancos">
								<option data-icon="bank bank2 mr-1" data-subtext="United States dollar" selected="selected" value="0">Seleccione banco de emisión de fondos</option>
								<option v-for="item in banks" :data-icon="icon(item.icon)" :data-subtext="item.name | capitalize" :value="item">{{item.name | capitalize}}</option>
							</optgroup>
						</select>
					</span> 
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	import {mapState, mapMutations, mapActions} from 'vuex' 
	export default{
		data(){
			return {
				operationFrom : null,
				operationTo: null,
				service : null,
				operationAmount : null,
			}
		},
		props: ['banks'],
		mounted(){
			this.operationAmount = this.amount
			this.operationFrom = this.from
			this.operationTo = this.to
			this.service = this.operation
			this.fetchBankOperations(this.operationTo.id)
		},
		methods:{
			...mapActions('bankOperation', ['fetchBankOperations']),
			...mapMutations('payment', ['setFrom', 'setAmount', 'setOperation', 'setTo']),
			icon(icon){
				return `bank ${icon}`
			},
			setToBank(){
				this.fetchBankOperations(this.operationTo.id)
				this.setTo(this.operationTo)
			},
			setFromBank(){
				this.setFrom(this.operationFrom)
			},
			setAmountOperation(){
				this.setAmount(this.operationAmount)
			},
			setService(){
				this.setOperation(this.service)
			}
		},
		computed: {
			...mapState('payment', ['from', 'to', 'operation', 'amount']),
			...mapState('bankOperation', ['bankOperations'])
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
	};
</script>