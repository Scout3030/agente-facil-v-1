import Vue from 'vue'

export async function fetchBankOperations ({commit}, bankId){
	
	try {
		const {data} = await Vue.axios({
			url: `/api/bank-operations/${bankId}`
		})
		commit('bankOperation/setBankOperations', data, {root: true})
	} catch(e) {
		// context.commit('authError', e.message)
		commit('categoriesError', e.message)
	} finally {
		// context.commit('setloading', false, {root: true})
		console.log('Finally paymentMethods')
	}
}