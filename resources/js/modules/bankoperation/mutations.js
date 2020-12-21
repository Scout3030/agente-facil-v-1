export function setBankOperations(state, bankOperations){
	state.bankOperations = bankOperations
}

export function setPaymentMethod(state, paymentMethod){
	state.paymentMethod = paymentMethod
}

export function categoriesError( state, payload){
	// state.error = truestate.errorMessage = payload
	console.log('Error prro')
	state.categories = []
}
