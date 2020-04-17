<template>
<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
	<div class="form-group">
		<label for="youSend">Transfiere desde</label>
		<div class="input-group">
			<div class="input-group-append" style="width: 100%"> 
				<span class="input-group-text p-0" style="width: 100%">
					<select id="youSend" data-style="custom-select bg-transparent border-0" data-container="body" data-live-search="true" class="selectpicker form-control bg-transparent" required @change="setFromBank" v-model="operationFrom">
						<optgroup label="Bancos">

							<option data-icon="bank bank1 mr-1" selected="selected" value="0">Seleccionar banco de emisión</option>

							<option v-for="item in banks" :data-icon="icon(item.icon)" :data-subtext="item.name | capitalize" :value="item">{{item.name | capitalize}}</option>

						</optgroup>
					</select>
				</span>
			</div>
		</div>
	</div> 
	<div class="form-group">
		<label for="youRecibe">Hacia </label>
		<div class="input-group">
			<div class="input-group-append" style="width: 100%">
				<span class="input-group-text p-0" style="width: 100%">
					<select id="youRecibe" data-style="custom-select bg-transparent border-0" data-container="body" data-live-search="true" class="selectpicker form-control bg-transparent" required @change="setToBank" v-model="operationTo">
						<optgroup label="Bancos">
							<option data-icon="bank bank2 mr-1" selected="selected" value="0">Seleccionar banco de destino</option>

							<option v-for="item in banks" :data-icon="icon(item.icon)" :data-subtext="item.name | capitalize" :value="item">{{item.name | capitalize}}</option>
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
			<input type="number" step=".10" class="form-control" data-bv-field="amount" v-model="operationAmount" @change="setOperationAmount(operationAmount)" min="10">
		</div>
	</div>
	<p class="text-muted mb-1">Total fees  - <span class="font-weight-500">7.21 USD</span></p>
	<p class="text-muted">The current exchange rate is <span class="font-weight-500">1 USD = 1.42030 AUD</span></p>
</div>
</template>
<script>
	import {mapState, mapMutations, mapActions} from 'vuex' 
	export default{
		data(){
			return {
				operationFrom : null,
				operationTo: null,
				operationAmount : null
			}
		},
		props: ['banks'],
		mounted(){
			this.operationAmount = this.amount
			this.operationFrom = this.from
			this.operationTo = this.to
		},
		methods:{
			...mapMutations('transfer', ['setFrom', 'setTo', 'setAmount']),
			icon(icon){
				return `bank ${icon}`
			},
			setFromBank(){
				this.setFrom(this.operationFrom)
			},
			setToBank(){
				this.setTo(this.operationTo)
			},
			setOperationAmount(){
				this.setAmount(this.operationAmount)
			}
		},
		computed: {
			...mapState('transfer', ['from', 'to', 'amount'])
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