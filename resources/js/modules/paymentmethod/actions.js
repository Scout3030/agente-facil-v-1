import Vue from 'vue'

export async function fetchPaymentMethods ({commit}){
	
	try {
		const {data} = await Vue.axios({
			url: '/api/payment-method'
		})
		commit('paymentmethod/setPaymentMethods', data, {root: true})
	} catch(e) {
		// context.commit('authError', e.message)
		commit('categoriesError', e.message)
	} finally {
		// context.commit('setloading', false, {root: true})
		console.log('Finally paymentMethods')
	}
}