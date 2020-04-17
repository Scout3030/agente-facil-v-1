const getImageUrl ={
	install: (Vue, options) => {
		Vue.prototype.$getImageUrl = (folder, attachment) => {
			return `/images/${folder}/${attachment}`
		}
	}
}

const getProductUrl ={
	install: (Vue, options) => {
		Vue.prototype.$getProductUrl = (slug) => {
			return `/producto/${slug}`
		}
	}
}

Vue.use(getImageUrl)
Vue.use(getProductUrl)