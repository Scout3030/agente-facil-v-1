export function setPage(state, page){
	state.page = page
}

export function categoriesError( state, payload){
	// state.error = truestate.errorMessage = payload
	console.log('Error prro')
	state.categories = []
}
