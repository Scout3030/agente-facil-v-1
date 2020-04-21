export function setFrom(state, bank){
	state.from = bank
}

export function setTo(state, bank){
	state.to = bank
}

export function setFromAccount(state, account){
	state.fromAccount = account
}

export function setToAccount(state, account){
	state.toAccount = account
}

export function setAmount(state, amount){
	state.amount = parseFloat(amount)
}

export function setComission(state, comission){
	state.comission = parseFloat(comission)
}

/* If the client is not the owner */
export function setCheck(state, check){
	state.check = check
}

export function setIsMine(state, isMine){
	state.isMine = isMine
}

export function setAccountNumber(state, accountNumber){
	state.accountNumber = accountNumber
}

export function setOwnerName(state, ownerName){
	state.ownerName = ownerName
}

export function categoriesError( state, payload){
	// state.error = truestate.errorMessage = payload
	console.log('Error prro')
	state.categories = []
}
