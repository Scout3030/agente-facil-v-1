<template>
	<ul class="list-group list-group-flush">
        <li class="list-group-item" v-for="account in accounts">
            <div class="widget-content p-0">
                <div class="widget-content-wrapper">
                    <div class="widget-content-left mr-3 d-flex">
                        <i :class="icon(account.bank.icon)"></i>
                        <div class="widget-heading">{{account.bank.name}}</div>
                    </div>
                    <div class="widget-content-right">

                        <button class="mb-2 mr-2 btn btn-alternate">n° {{account.number}}<span class="badge badge-light">{{account.name}}</span></button>

                        <div role="group" class="btn-group-sm btn-group">
                            <button type="button" class="btn-shadow btn btn-danger" @click="editAccount(account.id)">Editar</button>
                            <button type="button" class="btn-shadow btn btn-success" @click="deleteAccount(account.id)">Eliminar</button>
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
				accounts: []
			}
		},
		mounted(){
			this.getAccounts().then(response => {
				this.accounts = response
			})
		},
		methods: {
			async getAccounts(){
				const {data} = await Vue.axios({
					url: `/dashboard/account/accounts`,
				})
				return data
			},
			editAccount(accountId){
				window.location.replace(`account/edit/${accountId}`)
			},
			deleteAccount(accountId){
				this.deleteAccountFromDB(accountId)

				this.getAccounts().then(response => {
					this.accounts = response
				})
			},
			async deleteAccountFromDB(accountId){
				const {data} = await Vue.axios({
					method: 'DELETE',
					url: `/dashboard/account/${accountId}`,
					data: {
						"_token": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
					}
				})
				return data
			},
			icon(icon){
				return `bank ${icon} mr-1`
			}
		}
	}
</script>