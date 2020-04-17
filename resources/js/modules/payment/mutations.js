export function setFrom(state, bank){
	state.from = bank
}

export function setTo(state, bank){
	state.to = bank
}

export function setAmount(state, amount){
	state.amount = parseFloat(amount)
}

export function setOperation(state, operation){
	state.operation = operation
}

export function setFromAccount(state, account){
	state.fromAccount = account
}

export function setComission(state, comission){
	state.comission = parseFloat(comission)
}

export function setCode(state, code){
	state.code = code
}

export function categoriesError( state, payload){
	// state.error = truestate.errorMessage = payload
	console.log('Error prro')
	state.categories = []
}
