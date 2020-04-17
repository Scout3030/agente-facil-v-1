export function setPaymentMethods(state, paymentMethods){
	state.paymentMethods = paymentMethods
}

export function setPaymentMethod(state, paymentMethod){
	state.paymentMethod = paymentMethod
}

export function categoriesError( state, payload){
	// state.error = truestate.errorMessage = payload
	console.log('Error prro')
	state.categories = []
}
