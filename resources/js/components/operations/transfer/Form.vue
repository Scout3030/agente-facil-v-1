<template>
	<form id="form-send-money" ref="form" method="post" action="/deposito" @submit.prevent="sendData">
		<input type="hidden" name="_token" :value="csrf">
		<input type="hidden" name="bankId" :value="from.id">
		<input type="hidden" name="operationType" :value="1">
		<div class="form-group">
            <label for="youSend">Monto</label>
            <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">S/</span>
				</div>
				<input type="number" class="form-control" v-model="operationAmount" step=".10" min="10" @change="setOperationAmount">
            </div>
            <div class="error" v-if="!$v.operationAmount.required">El monto a transferir es requerido</div>
        </div>
		<div class="form-group">
			<label for="youSend">Desde</label>
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
			<select class="custom-select" v-model="operationFromAccount" @change="setOperationFromAccount" v-if="accounts1.length">
				<option value="0" selected>Seleccione cuenta</option>
				<!-- <option value="1">Desde agente</option> -->
				<option v-for="item in accounts1" :value="item">{{item.number}}</option>
			</select>
			<div class="error" v-if="!$v.operationFrom.id.required && $v.operationFrom.id.$error"><p :class="{ 'text-danger': $v.operationFrom.id.$error }">Selecciona un banco de origen</p></div>
			<div class="error" v-if="!$v.operationFromAccount.id.required && $v.operationFromAccount.id.$error && !$v.operationFrom.id.$error"><p :class="{ 'text-danger': $v.operationFromAccount.id.$error }">Selecciona una cuenta de origen</p></div>
		</div>
		<div class="form-group">
			<label for="recipientGets">Hacia</label>

            <div class="mb-3 text-right">
            	<i v-if="mine" class="fa fa-stop-circle" style="cursor: pointer;" @click="setIsMine(false); mine = false"></i>
                <i v-else class="fa fa-stop-circle" style="cursor: pointer; color: #00E2CC;" @click="setIsMine(true); mine = true"></i>
                <label class="" for="check">La cuenta de destino no es mia</label>
            </div>

			<div class="input-group">
				<div class="input-group-append" style="width: 100%">
					<span class="input-group-text p-0" style="width: 100%">
						<select data-style="custom-select bg-transparent border-0" data-container="body" data-live-search="true" class="selectpicker form-control bg-transparent" required @change="setToBank" v-model="operationTo">
							<optgroup label="Bancos">

								<option data-icon="bank bank1 mr-1" selected="selected" value="0">Seleccionar banco de destino</option>

								<option v-for="item in banks" v-if="item.enable_transfer == 1" :data-icon="icon(item.icon)" :data-subtext="item.name | capitalize" :value="item">{{item.name | capitalize}}</option>

							</optgroup>
						</select>
					</span>
				</div>
			</div>
			<select class="custom-select" required="" v-if="accounts2.length && isMine == true" v-model="operationToAccount" @change="setOperationToAccount">
				<option value="0" selected>Seleccione cuenta</option>
				<option v-for="item in accounts2" :value="item">{{item.number}}</option>
			</select>
			<div class="error" v-if="!$v.operationTo.id.required && $v.operationTo.id.$error"><p :class="{ 'text-danger': $v.operationTo.id.$error }">Selecciona un banco de destino</p></div>
			<div class="error" v-if="!$v.operationToAccount.id.requiredIf && $v.operationToAccount.id.$error && !$v.operationTo.id.$error"><p :class="{ 'text-danger': $v.operationToAccount.id.$error }">Selecciona una cuenta de destino</p></div>
		</div>
		<div class="form-group" v-if="mine == false">
            <label for="youSend">Cuenta de destino</label>
            <div class="input-group">
				<div class="input-group-prepend">
					<span class="input-group-text">N° </span>
				</div>
				<input type="text" class="form-control" v-model="toAccountNumber" @change="setAccountNumber(toAccountNumber)">
            </div>
            <div class="error" v-if="!$v.toAccountNumber.required && $v.toAccountNumber.$error"><p :class="{ 'text-danger': $v.toAccountNumber.$error }">Este campo es obligatorio</p></div>
        </div>
        <div class="form-group" v-if="mine == false">
            <label for="youSend">Titular de cuenta de destino</label>
            <div class="input-group">
				<input type="text" class="form-control" v-model="toAccountOwner" @change="setOwnerName(toAccountOwner)">
            </div>
            <div class="error" v-if="!$v.toAccountOwner.required && $v.toAccountOwner.$error"><p :class="{ 'text-danger': $v.toAccountOwner.$error }">Este campo es obligatorio</p></div>
        </div>
		<hr>
		<p class="mb-1">Comisión servicio <span class="text-3 float-right"> S/{{parseFloat(comission)}}</span></p>
		<p class="font-weight-500">Total a transferir <span class="text-3 float-right">{{total}}</span></p>
		<button class="btn btn-primary btn-block">Realizar operación</button>
		<div v-if="!differentAccount" :class="{ 'text-danger': !differentAccount }">Las cuentas de origen y de destino no pueden ser las mismas</div>
	</form>
</template>

<script>
	import { required, numeric, requiredIf } from 'vuelidate/lib/validators'
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
				csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
				differentAccount: true,
				mine : true,
				toAccountOwner: null,
				toAccountNumber: null
			}
		},
		mounted(){
			this.operationFrom = this.from
			this.operationTo = this.to
			this.operationAmount = this.amount
			this.operationFromAccount = this.fromAccount
			this.operationToAccount = this.toAccount
			this.toAccountNumber = this.accountNumber
			this.toAccountOwner = this.ownerName
			this.mine = this.isMine
			this.getBankAccounts(this.operationFrom.id).then(response => {
				this.accounts1 = response
			})
			this.getBankAccounts(this.operationTo.id).then(response => {
				this.accounts2 = response
			})
		},
		props: ['banks'],
		computed: {
			...mapState('transfer', ['from', 'to', 'amount', 'comission', 'fromAccount', 'toAccount', 'isMine', 'ownerName', 'accountNumber']),
			total(){
				return `S/${parseFloat(this.operationAmount) + parseFloat(this.comission)}`
			}
		},
		methods: {
			...mapMutations('transfer', ['setFrom', 'setTo', 'setAmount', 'setComission', 'setFromAccount', 'setToAccount', 'setIsMine', 'setAccountNumber', 'setOwnerName']),
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
				if (this.operationAmount >= 10 && this.operationAmount <= 200) {
					this.setComission(1)
				}
				if (this.operationAmount > 200 && this.operationAmount <= 997) {
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
			},
			sendData(){
			    this.$v.$touch()
			    if (this.$v.$invalid) {
			        this.submitStatus = 'ERROR'
			        console.log('invalido')
			    } else {
			        
			        if (this.isMine == false) {
			        	this.$refs.form.submit()
			        }else{

			        	if (this.operationFromAccount.id != this.operationToAccount.id) {
			        		this.differentAccount = true
			        		this.$refs.form.submit()
				        }else {
				        	this.differentAccount = false
				        }
			        }
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
		validations: {
		    operationFrom : {
		      id: {
		      	required,
		      	numeric
		      }
		    },
			operationTo: {
		      id: {
		      	required,
		      	numeric
		      }
		    },
			operationAmount : {
		      required,
		      numeric
		    },
			operationFromAccount: {
		      id: {
		      	required,
		      	numeric
		      }
		    },
			operationToAccount: {
		      id: {
		      	numeric,
		      },
		      requiredIf: requiredIf((vueInstance) => {
		      		console.log("vueInstance", vueInstance);
			        return vueInstance.mine == true;
			    })
		    },
		    toAccountNumber: {
		    	requiredIf: requiredIf((vueInstance) => {
		    		// console.log("vueInstance", vueInstance);
			        return vueInstance.mine == false
			    })
		    },
		    toAccountOwner: {
		    	requiredIf: requiredIf((vueInstance) => {
		    		// console.log("vueInstance", vueInstance);
			        return vueInstance.mine == false
			    })
		    }
		},
	}
</script>