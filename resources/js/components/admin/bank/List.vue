<template>
	<ul class="list-group list-group-flush">
        <li class="list-group-item" v-for="bank in banks">
            <div class="widget-content p-0">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left mr-3">
                        <i :class="icon(bank.icon)"></i>
                    </div>
                    <div class="widget-content-left">
                        <div class="widget-heading">{{bank.name}}</div>
                        <div v-if="bank.status == 1">
							<div class="badge badge-success">Activo</div>
                        </div>
                        <div v-if="bank.status == 2">
							<div class="badge badge-danger">Inactivo</div>
                        </div>
                    </div>
                    <div class="widget-content-right">
                    	<div role="group" class="btn-group-sm btn-group">
                            <button type="button" class="btn-shadow btn btn-alternate" @click="redirect(bank.id)">Editar</button>
                        </div>
                        <div role="group" class="btn-group-sm btn-group">
                            <button v-if="bank.status == 1" type="button" class="btn-shadow btn btn-danger" @click="changeStatus(bank.id)">Desactivar</button>
                            <button v-if="bank.status == 2" type="button" class="btn-shadow btn btn-success" @click="changeStatus(bank.id)">Activar</button>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
	export default{
		data(){
			return {
				banks: []
			}
		},
		mounted(){
			this.getBanks().then(response => {
				this.banks = response
			})
		},
		methods: {
			async changeStatus(bankId){
				const {data} = await Vue.axios({
					method: 'POST',
					url: '/dashboard/bank/status',
					data: {
						"_token": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
						bankId: bankId
					}
				})
				this.getBanks().then(response => {
					this.banks = response
				})
			},
			async getBanks(){
				const {data} = await Vue.axios({
					url: `/api/admin/bank`,
				})
				return data
			},
			redirect(bankId){
				console.log(bankId)
				window.location.replace(`bank/edit/${bankId}`)
			},
			icon(icon){
				return `bank ${icon} mr-1`
			}
		}
	}
</script>